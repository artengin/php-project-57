<x-app-layout >
    <x-slot:title>{{ __('Task manager')}}</x-slot:title>

    <div class="mr-auto place-self-center lg:col-span-7">
        <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">
            {{ __('Hello from Hexlet!') }}       
        </h1>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
            {{ __('It is simple task manager!') }}        
        </p>
        <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <a href="https://hexlet.io" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow" target="_blank">
                {{ __('Click me') }}           
            </a>
        </div>
    </div>
</x-app-layout>
