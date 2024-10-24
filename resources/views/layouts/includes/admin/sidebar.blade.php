@php
    $links = [
        [
            'header' => 'Menu',
        ],
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
            'roles' => ['Coordinador'],
        ],

        [
            'name' => 'Roles',
            'icon' => 'fa-solid fa-scale-balanced',
            'route' => route('roles.index'),
            'active' => request()->routeIs('roles.*'),
            'roles' => ['Coordinador'],
        ],

        [
            'name' => 'Niveles',
            'icon' => 'fa-solid fa-layer-group',
            'route' => route('levels.index'),
            'active' => request()->routeIs('levels.*'),
            'roles' => ['Coordinador'],
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'route' => route('users.index'),
            'active' => request()->routeIs('users.*'),
            'roles' => ['Coordinador'],
        ],
        [
            'name' => 'Categorías',
            'icon' => 'fa-solid fa-icons',
            'route' => route('categories.index'),
            'active' => request()->routeIs('categories.*'),
            'roles' => ['Docente', 'Coordinador'],
        ],
        [
            'name' => 'Noticias',
            'icon' => 'fa-solid fa-newspaper',
            'route' => route('news.index'),
            'active' => request()->routeIs('news.*'),
            'roles' => ['Docente', 'Coordinador'],
        ],
        [
            'name' => 'Eventos',
            'icon' => 'fa-solid fa-calendar-days',
            'route' => route('events.index'),
            'active' => request()->routeIs('events.*'),
            'roles' => ['Docente', 'Coordinador'],
        ],
        [
            'name' => 'Documentos',
            'icon' => 'fa-solid fa-file-invoice',
            'route' => route('documents.index'),
            'active' => request()->routeIs('documents.*'),
            'roles' => ['Docente', 'Coordinador'],
        ],
        [
            'name' => 'Cursos',
            'icon' => 'fa-solid fa-person-chalkboard',
            'route' => route('courses.index'),
            'active' => request()->routeIs('courses.*'),
            'roles' => ['Docente', 'Coordinador'],
        ],
        [
            'name' => 'Justificaciones',
            'icon' => 'fa-solid fa-list-check',
            'route' => route('justifications.index'),
            'active' => request()->routeIs('justifications.*'),
            'roles' => ['Docente', 'Coordinador'],
        ],
        [
            'name' => 'Foro',
            'icon' => 'fa-solid fa-comments',
            'route' => route('post.create'),
            'active' => request()->routeIs('post.create'),
            'roles' => ['Docente', 'Coordinador'],
        ],
    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 min-h-screen pt-20 transition-transform bg-white sm:translate-x-0"
    :class="{
        'transform-none': open,
        '-translate-x-full': !open
    }" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    @isset($link['header'])
                        <div class="px-3 py-2 text-xs font-semibold text-green-300 uppercase">
                            {{ $link['header'] }}
                        </div>
                    @else
                        @if (isset($link['submenu']))
                            <div x-data="{
                                open: {{ $link['active'] ? 'true' : 'false' }}
                            }">
                                <button
                                    class="flex items-center w-full p-2 text-green-800 rounded-lg hover:bg-green-100 group {{ $link['active'] ? 'bg-green-200' : '' }}"
                                    x-on:click="open= !open">
                                    <span class="inline-flex items-center justify-center w-6 h-6">
                                        <i class="{{ $link['icon'] }} text-green-600 text-xl"></i>
                                    </span>
                                    <span class="flex-1 text-left ms-3">
                                        {{ $link['name'] }}
                                    </span>

                                    <i class="fa-solid fa-angle-down"
                                        :class="{
                                            'fa-angle-down': !open,
                                            'fa-angle-up': open
                                        }"></i>

                                </button>

                                <ul x-cloak x-show="open">
                                    @foreach ($link['submenu'] as $item)
                                        <li class="pl-4">
                                            <a href=""
                                                class="flex items-center w-full p-2 text-green-800 rounded-lg hover:bg-green-100 group {{ $item['active'] ? 'bg-green-200' : '' }}">
                                                <span class="inline-flex items-center justify-center w-6 h-6">
                                                    <i class="{{ $item['icon'] }} text-green-600 text-xl"></i>
                                                </span>
                                                <span class="flex-1 text-left ms-3">
                                                    {{ $item['name'] }}
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            @if (in_array(auth()->user()->role->key, $link['roles']))
                                <a href="{{ $link['route'] }}"
                                    class="flex items-center p-2 text-green-800 rounded-lg hover:bg-green-100 group {{ $link['active'] ? 'bg-green-200' : '' }}">
                                    <span class="inline-flex items-center justify-center w-6 h-6">
                                        <i class="{{ $link['icon'] }} text-green-600 text-xl"></i>
                                    </span>
                                    <span class="ms-3">
                                        {{ $link['name'] }}
                                    </span>
                                </a>
                            @endif
                        @endif
                    @endisset
                </li>
            @endforeach
        </ul>
    </div>
</aside>
