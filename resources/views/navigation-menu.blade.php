@php
    $links = [
        [
            'name' => 'Noticias',
            'route' => route('noticias.index'),
            'active' => request()->routeIs('noticias.*'),
            'roles' => ['Estudiante', 'Docente', 'Coordinador'],
        ],
        [
            'name' => 'Eventos',
            'route' => route('eventos.index'),
            'active' => request()->routeIs('eventos.*'),
            'roles' => ['Estudiante', 'Docente', 'Coordinador'],
        ],
        [
            'name' => 'Documentos',
            'route' => route('documentos.index'),
            'active' => request()->routeIs('documentos.*'),
            'roles' => ['Estudiante', 'Docente', 'Coordinador'],
        ],
        [
            'name' => 'Cursos',
            'route' => route('cursos.index'),
            'active' => request()->routeIs('cursos.*'),
            'roles' => ['Estudiante', 'Docente', 'Coordinador'],
        ],
        [
            'name' => 'Justificaciones',
            'route' => route('justificacion.index'),
            'active' => request()->routeIs('justificacion.*'),
            'roles' => ['Estudiante', 'Docente', 'Coordinador'],
        ],
        [
            'name' => 'Foro',
            'route' => route('post.index'),
            'active' => request()->routeIs('post.*'),
            'roles' => ['Estudiante', 'Docente', 'Coordinador'],
        ],
    ];
@endphp

<nav x-data="{ open: false }" class="bg-pantone7604C font-bold shadow">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="/">
                        <x-application-mark class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @foreach ($links as $item)
                        @auth
                            @if (in_array(auth()->user()->role->key, $item['roles']))
                                <x-nav-link href="{{ $item['route'] }}" :active="$item['active']">
                                    {{ $item['name'] }}
                                </x-nav-link>
                            @endif
                        @endauth
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="relative ms-3">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm transition border-2 rounded-full focus:outline-none focus:border-gray-300">
                                        <img class="object-cover w-8 h-8 rounded-full"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md  hover:text-gray-700 focus:outline-none focus:bg-gray-50 -700 active:bg-gray-50">
                                            {{ Auth::user()->last_name }},
                                            {{ Auth::user()->first_name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-responsive-nav-link class="text-sm" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                    {{ __('Perfil') }}
                                </x-responsive-nav-link>

                                @if (in_array(Auth::user()->role->key, ['Coordinador', 'Docente']))
                                    <x-responsive-nav-link class="text-sm" href="{{ route('dashboard') }}"
                                        :active="request()->routeIs('dashboard')">
                                        {{ __('Administración') }}
                                    </x-responsive-nav-link>
                                @endif

                                <div class="border-t border-gray-200 -:border-gray-600"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="text-black">
                                    <i class="text-3xl fa-regular fa-circle-user"></i>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('login') }}">
                                    {{ __('Iniciar sesión') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md -:text-gray-500 hover:text-gray-500 -:hover:text-gray-400 hover:bg-gray-100 -:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 -:focus:bg-gray-900 focus:text-gray-500 -:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($links as $item)
                @auth
                    @if (in_array(auth()->user()->role->key, $item['roles']))
                        <x-responsive-nav-link href="{{ $item['route'] }}" :active="$item['active']">
                            {{ $item['name'] }}
                        </x-responsive-nav-link>
                    @endif
                @endauth
            @endforeach
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200 -:border-gray-600">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 me-3">
                            <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->last_name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="text-base font-medium text-black">{{ Auth::user()->last_name }}</div>
                        <div class="text-sm font-medium text-black">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link class="text-sm" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if (in_array(Auth::user()->role->key, ['Coordinador', 'Docente']))
                        <x-responsive-nav-link class="text-sm" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Administración') }}
                        </x-responsive-nav-link>
                    @endif
                </div>

                <div class="border-t border-gray-200 -:border-gray-600"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        @else
            <x-responsive-nav-link href="{{ route('login') }}">
                Iniciar sesión
            </x-responsive-nav-link>
        @endauth

    </div>
</nav>
