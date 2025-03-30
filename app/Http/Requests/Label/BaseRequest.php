<?php

namespace App\Http\Requests\Label;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'name.unique' => __('label.validation.name.unique'),
        ];
    }
}
