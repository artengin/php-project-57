{{  html()->label(__('task.name'), 'name') }}
{{  html()->input('text', 'name')->class('rounded border-gray-300 w-1/3 mt-3') }}

@if ($errors->has('name'))
    <p class="text-rose-600">{{ $errors->first('name') }}</p>
@endif

{{  html()->label(__('task.description'), 'description') }}
{{  html()->textarea('description')->class('rounded border-gray-300 w-1/3 mt-3') }}

{{ html()->label(__('task.status'), 'status_id') }}
{{ html()->select('status_id', 
    ['' => ''] + $statuses->pluck('name', 'id')->toArray())
    ->class('rounded border-gray-300 w-1/3 mt-3') }}

@if ($errors->has('status_id'))
    <p class="text-rose-600">{{ $errors->first('status_id') }}</p>
@endif

{{ html()->label(__('task.executor'), 'assigned_to_id') }}
{{ html()->select('assigned_to_id', 
    ['' => ''] + $assignees->pluck('name', 'id')->toArray())
    ->class('rounded border-gray-300 w-1/3 mt-3') }}


{{ html()->label(__('task.labels'), 'labels[]') }}
{{ html()->select('labels[]', $labels->pluck('name', 'id')->toArray())
    ->class('rounded border-gray-300 w-1/3 mt-3')->multiple() }}