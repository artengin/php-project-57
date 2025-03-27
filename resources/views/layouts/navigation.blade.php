<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <span class="self-center text-xl font-semibold whitespace-nowrap">
                        {{ __('Task manager') }}
                    </span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    Задачи
                </x-nav-link>
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    Статусы
                </x-nav-link>
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    Метки
                </x-nav-link>
            </div>
            <div>
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow">
                                {{ __('Log out') }}
                            </button>
                        </form>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow">
                            {{ __('Log in') }}
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-4 border border-gray-400 rounded shadow">
                                    {{ __('Registration') }}
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </div>
</nav>