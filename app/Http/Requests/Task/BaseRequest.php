<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'name.unique' => __('task.validation.name.unique'),
        ];
    }
}
