<?php

namespace App\Http\Requests\TaskStatus;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:task_statuses,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('task_status.validation.name.unique'),
        ];
    }
}
