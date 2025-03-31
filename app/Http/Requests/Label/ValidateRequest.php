<?php

namespace App\Http\Requests\Label;

class ValidateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:labels,name',
            'description' => 'nullable|string',
        ];
    }
}
