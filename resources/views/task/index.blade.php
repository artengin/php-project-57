<x-app-layout >
    <x-slot:title>{{ __('Task manager')}}</x-slot:title>

    <div class="mr-auto place-self-center lg:col-span-7">
        <div class="grid col-span-full">
            <div>
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-4xl">
                    {{ __('task.index') }}      
                </h1> 

                <div class="mb-4">
                {{ html()->form('GET', route('tasks.index'))->open() }}

                    {{ html()->select('filter[status_id]', 
                        $statuses,
                        Arr::get($filter, 'status_id'))
                        ->class('rounded border-gray-300 my-3')
                        ->placeholder(__('task.status'))
                    }}
                    
                    {{ html()->select('filter[created_by_id]',
                        $users, 
                        Arr::get($filter, 'created_by_id'))
                        ->class('rounded border-gray-300 my-3')
                        ->placeholder(__('task.created_by_id'))
                    }}
                    
                    {{ html()->select('filter[assigned_to_id]', 
                        $users, 
                        Arr::get($filter, 'assigned_to_id'))
                        ->class('rounded border-gray-300 my-3')
                        ->placeholder(__('task.assigned_to_id'))
                    }}

                    {{ html()->submit(__('task.accept_filter'))
                        ->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow my-3') }}

                {{ html()->closeModelForm() }}
            </div>

                @auth
                    {{ html()->a(route('tasks.create'), __('task.create'))->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow') }}
                @endauth
            </div>
            
           

            <table class="table mt-5">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th scope="col" class="py-2">{{ __('task.id') }}</th>
                    <th scope="col" class="py-2">{{ __('task.status') }}</th>
                    <th scope="col" class="py-2">{{ __('task.name') }}</th>
                    <th scope="col" class="py-2">{{ __('task.created_by_id') }}</th>
                    <th scope="col" class="py-2">{{ __('task.assigned_to_id') }}</th>
                    <th scope="col" class="py-2">{{ __('task.created_at') }}</th>
                    @auth
                        <th scope="col" class="py-2">{{ __('task.actions') }}</th>
                    @endauth
                </tr>
                </thead>
                <tbody>

                @foreach($tasks as $task)

                    <tr class="border-b border-dashed border-black text-left">
                        <td class="py-2">{{ $task->id }}</td>
                        <td class="py-2">{{ $task->status->name }}</td>
                        <td class="py-2">
                            <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:text-blue-900">
                                {{ $task->name }}
                            </a>
                        </td>
                        <td class="py-2">{{ $task->createdBy->name }}</td>
                        <td class="py-2">{{ $task->assignedTo?->name }}</td>
                        <td class="py-2">{{ $task->created_at->format('d.m.Y') }}</td>
                        @auth

                            <td class="py-2">
                                @can('delete', $task)
                                    {{ html()->a(route('tasks.destroy', $task), __('task.destroy'))
                                        ->class('btn btn-sm btn-danger text-red-600 hover:text-red-900')
                                        ->attributes([
                                            'data-method' => 'delete',
                                            'data-confirm' => __('Are you sure?'),
                                            'rel' => 'nofollow'
                                        ]) }}
                                @endcan
                                {{ html()->a(route('tasks.edit', $task), __('task.edit'))->class('btn btn-sm btn-outline-primary text-blue-600 hover:text-blue-900') }}
                            </td>

                        @endauth
                    </tr>

                @endforeach

                </tbody>
            </table>

            {{ $tasks->links() }}
        </div>
    </div>

</x-app-layout>
