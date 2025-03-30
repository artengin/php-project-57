<?php

namespace App\Http\Requests\TaskStatus;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'name.unique' => __('task_status.validation.name.unique'),
        ];
    }
}
