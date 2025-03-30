<x-app-layout >
    <x-slot:title>{{ __('Task manager')}}</x-slot:title>

    <div class="mr-auto place-self-center lg:col-span-7">
        <div class="grid col-span-full">
            <div>
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-4xl">
                    {{ __('label.index') }}       
                </h1> 
                @auth
                    {{ html()->a(route('labels.create'), __('label.create'))->class('bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow') }}
                @endauth
            </div>
            
           

            <table class="table mt-5">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th scope="col" class="py-2">{{ __('label.id') }}</th>
                    <th scope="col" class="py-2">{{ __('label.name') }}</th>
                    <th scope="col" class="py-2">{{ __('label.description') }}</th>
                    <th scope="col" class="py-2">{{ __('label.created_at') }}</th>
                    @auth
                        <th scope="col" class="py-2">{{ __('label.actions') }}</th>
                    @endauth
                </tr>
                </thead>
                <tbody>

                @foreach($labels as $label)

                    <tr class="border-b border-dashed border-black text-left">
                        <td class="py-2">{{ $label->id }}</td>
                        <td class="py-2">{{ $label->name }}</td>
                        <td class="py-2">{{ $label->description }}</td>
                        <td class="py-2">{{ $label->created_at->format('d.m.Y') }}</td>
                        @auth

                            <td class="py-2">
                                {{ html()->a(route('labels.destroy', $label), __('label.destroy'))
                                    ->class('btn btn-sm btn-danger text-red-600 hover:text-red-900')
                                    ->attributes([
                                        'data-method' => 'delete',
                                        'data-confirm' => __('Are you sure?'),
                                        'rel' => 'nofollow'
                                    ]) }}
                                {{ html()->a(route('labels.edit', $label), __('label.edit'))->class('btn btn-sm btn-outline-primary text-blue-600 hover:text-blue-900') }}
                            </td>

                        @endauth
                    </tr>

                @endforeach

                </tbody>
            </table>

            {{ $labels->links() }}
        </div>
    </div>

</x-app-layout>
