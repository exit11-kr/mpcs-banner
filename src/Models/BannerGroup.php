<?php

namespace Mpcs\Banner\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mpcs\Core\Traits\ModelTrait;

class BannerGroup extends Model
{
    use SoftDeletes, ModelTrait;

    protected $table = 'banner_groups';
    protected $guarded = ['id'];
    public $appends = ['type_str'];
    // $sortable 정의시 정렬기능을 제공할 필드는 필수 기입
    public $sortable = ['id', 'order', 'is_visible'];
    public $defaultSortable = [
        'id' => 'asc',
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'updated_at' => 'datetime:Y-m-d H:i',
        'deleted_at' => 'datetime:Y-m-d H:i',
    ];

    protected static $m_params = [
        'default_load_relations' => ['banners'],
    ];

    public static $typeStrings = [
        1 => 'popup',
        2 => 'header',
        3 => 'promotion',
        4 => 'banner',
        5 => 'sponsor',
    ];

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
     * items
     * 웹 공개용 데이터
     *
     * @return void
     */
    public function items()
    {
        return $this->hasMany(Banner::class, 'banner_group_id')->released()->orderBy('order', 'asc');
    }

    /**
     * banners
     *
     * @return void
     */
    public function banners()
    {
        return $this->hasMany(Banner::class, 'banner_group_id')->orderBy('order', 'asc');
    }


    /**
     * getAllowTypes
     *
     * @return void
     */
    public static function getAllowTypes()
    {
        return collect(static::$typeStrings);
    }

    /**
     * getTypeStrAttribute
     *
     * @return void
     */
    public function getTypeStrAttribute()
    {
        return static::$typeStrings[$this->attributes['type']];
    }
}
