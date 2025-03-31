<x-app-layout >
    <x-slot:title>{{ __('Task manager')}}</x-slot:title>

    <div class="mr-auto place-self-center lg:col-span-7">
        <div>
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-4xl">
                {{ __('task.task_create') }}       
            </h1> 
        </div>
        {{ html()->modelForm($task, 'PATCH', route('tasks.update', $task))->open() }}
            <div class="flex flex-col items-start">
                @include('task.form')
                {{ html()->submit(__('Update'))->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow mt-3') }}
            </div>
        {{ html()->closeModelForm() }}
    </div>
</x-app-layout>
