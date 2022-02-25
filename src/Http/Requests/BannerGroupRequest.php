<?php

namespace Exit11\Banner\Http\Requests;

use Illuminate\Validation\Rule;
use Mpcs\Core\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class BannerGroupRequest extends FormRequest
{
    use RequestTrait;

    public function rules()
    {
        $rules = $this->getRequestRules();
        if ($rules != null) {
            return $rules;
        }
        $id = $this->banner_group->id ?? "";
        $rules = [
            'POST' => [
                'name' => 'required|max:100',
                'code' => 'required|alpha_dash|max:50|unique:banner_groups',
                'description' => 'max:512',
            ],
            'PUT' => [
                'name' => 'sometimes|required|max:100',
                'code' => 'sometimes|alpha_dash|required|max:50|unique:banner_groups,code,' . $id,
                'description' => 'max:512',
            ],
        ];

        return $rules[$this->method()] ?? [];
    }
}
