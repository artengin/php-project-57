<?php

namespace App\Http\Requests\Label;

class UpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:labels,name,' . $this->label->id,
            'description' => 'nullable|string',
        ];
    }
}
