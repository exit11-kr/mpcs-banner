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
            'width' => $this->width,
            'height' => $this->height,
            'is_visible' => $this->is_visible,
            'banners' => $this->whenLoaded('banners', function () {
                return new BannerCollection($this->banners);
            }),
        ];
    }
}
