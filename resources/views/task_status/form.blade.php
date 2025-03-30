{{  html()->label(__('task_status.name'), 'name') }}
{{  html()->input('text', 'name')->class('rounded border-gray-300 w-1/3 mt-3') }}

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-rose-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif