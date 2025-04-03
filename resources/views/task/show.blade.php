<x-app-layout >
    <x-slot:title>{{ __('Task manager')}}</x-slot:title>

    <div class="mr-auto place-self-center lg:col-span-7">
        <div class="grid col-span-full">
            <div>
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-4xl">
                {{ __('task.task_view') }}: {{ $task->name  }} <a href="{{ route('tasks.edit', $task) }}">⚙</a>      
                </h1> 
                <p class="my-1">{{ __('task.name') }}: {{ $task->name  }}</p>
                <p class="my-1">{{ __('task.status') }}: {{ $task->status->name }}</p>
                <p class="my-1">{{ __('task.description') }}: {{ $task->description  }}</p>
            </div>
            @if ($task->labels->isNotEmpty())
                <p>{{ __('task.labels') }}:
                <div class="flex my-1">
                    @foreach($task->labels as $label)
                        <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>  
                            {{ $label->name }}
                        </div>
                    @endforeach
                </div>
            @endif

            
        </div>
    </div>

</x-app-layout>
