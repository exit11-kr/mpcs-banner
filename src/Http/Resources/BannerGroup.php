<?php

namespace Mpcs\Banner\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Mpcs\Core\Traits\ResourceTrait;

class BannerGroup extends JsonResource
{
    use ResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'type' => $this->type,
            'type_str' => $this->type_str,
            'pc_width' => $this->pc_width,
            'pc_height' => $this->pc_height,
            'mobile_width' => $this->mobile_width,
            'mobile_height' => $this->mobile_height,
            'is_visible' => $this->is_visible,
            'banners' => $this->whenLoaded('banners', function () {
                return new BannerCollection($this->banners);
            }),
        ];
    }
}
