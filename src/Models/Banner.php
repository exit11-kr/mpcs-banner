<?php

namespace Exit11\Banner\Models;

use Exit11\Banner\Facades\Banner as Facade;
use Illuminate\Database\Eloquent\Model;
use Mpcs\Core\Traits\ModelTrait;
use MpcsUi\Bootstrap5\Traits\Orderable;
use MpcsUi\Bootstrap5\Traits\OrderableTrait;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Banner extends Model implements Orderable
{
    use ModelTrait, OrderableTrait;

    protected $table = 'banners';
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'period_from', 'period_to'];
    protected $guarded = ['id'];
    protected static $m_params = [
        'default_load_relations' => ['user'],
        'column_maps' => [
            // date : {컬럼명}
            'from' => 'created_at',
            'to' => 'created_at',
        ]
    ];
    // $sortable 정의시 정렬기능을 제공할 필드는 필수 기입
    public $sortable = ['order'];

    public $orderable = [
        'order_column_name' => 'order',
        'group_column_name' => 'banner_group_id',
        'sort_when_creating' => true,
    ];

    protected $casts = [
        'target' => 'boolean',
        'is_visible' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
        'deleted_at' => 'datetime:Y-m-d H:i',
        'period_from' => 'datetime:Y-m-d H:i',
        'period_to' => 'datetime:Y-m-d H:i',
        'status_released' => 'boolean',
    ];

    private $uploadDisk;
    private $imageRootDir;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->uploadDisk = Storage::disk('upload');
        $this->imageRootDir = 'popups';
    }


    /**
     * boot
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::setMemberParams(self::$m_params);
    }

    /**
     * bannerGroup
     *
     * @return void
     */
    public function bannerGroup()
    {
        return $this->belongsTo('BannerGroup', 'banner_group_id');
    }

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('Mpcs\Core\Models\User', 'user_id');
    }

    /**
     * scopeReleased
     *
     * @param  mixed $query
     * @return void
     */
    public function scopeReleased($query)
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        return $query->where('period_from', '<=', $now)->where('period_to', '>=', $now)->isVisible();
    }

    /**
     * getStatusReleasedAttribute
     *
     * @return void
     */
    public function getStatusReleasedAttribute()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $periodStart = $this->attributes['period_from'];
        $periodEnd = $this->attributes['period_to'];
        $isVisible = $this->attributes['is_visible'];
        $result = false;
        if ($periodStart <= $now && $periodEnd >= $now && $isVisible) {
            $result = true;
        }

        return $result;
    }

    /**
     * getTargetAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function getTargetAttribute($value)
    {
        return $value ? '_blank' : '_self';
    }

    /**
     * setTargetAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function setTargetAttribute($value)
    {
        $this->attributes['target'] = ($value == '_self') ? 0 : 1;
    }


    /**
     * getUploadDiskAttribute
     *
     * @return void
     */
    public function getUploadDiskAttribute()
    {
        return $this->uploadDisk;
    }

    /**
     * getRootDirAttribute
     *
     * @return void
     */
    public function getImageRootDirAttribute()
    {
        return $this->imageRootDir;
    }

    /**
     * getFileUrlAttribute
     *
     * @return void
     */
    public function getImageFileUrlAttribute()
    {
        if ($this->image) {
            return $this->upload_disk->url($this->image_root_dir . '/' . $this->image);
        }
        return Facade::noImage();
    }
}
