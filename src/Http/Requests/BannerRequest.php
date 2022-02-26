<?php

namespace Exit11\Banner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mpcs\Core\Traits\RequestTrait;

class BannerRequest extends FormRequest
{
    use RequestTrait;

    public function rules()
    {
        $rules = $this->getRequestRules();
        if ($rules != null) {
            return $rules;
        }

        $id = $this->banner->id ?? "";
        $rules = [
            'POST' => [
                'banner_group_id' => 'required|integer',
                'title' => 'required|max:100',
                'period_from' => 'required',
                'period_to' => 'required',
            ],
            'PUT' => [
                'title' => 'sometimes|required|max:100',
                'period_from' => 'sometimes|required',
                'period_to' => 'sometimes|required',
            ],
        ];

        return $rules[$this->method()] ?? [];
    }
}
