<?php

namespace App\Http\Requests\Task;

class UpdateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|unique:tasks,name,' . $this->task->id,
            'description' => 'nullable|string',
            'status_id' => 'exists:task_statuses,id',
            'assigned_to_id' => 'nullable|exists:users,id',
            'labels' => 'array',
            'labels.*' => 'exists:labels,id',
        ];
    }
}
