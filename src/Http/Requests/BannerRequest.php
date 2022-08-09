<?php

namespace Mpcs\Banner\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mpcs\Core\Traits\RequestTrait;

class BannerRequest extends FormRequest
{
    use RequestTrait;

    public function rules($params = null)
    {
        $info = $this->getRequestInfo($params);
        if ($info->rules) {
            return $info->rules;
        }

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

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'period_to' => trans('mpcs-banner::word.attr.period_to'),
            'period_from' => trans('mpcs-banner::word.attr.period_from'),
            'title' => trans('mpcs-banner::word.attr.title'),
        ];
    }
}
