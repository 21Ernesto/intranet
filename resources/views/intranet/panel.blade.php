<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg px-3 py-2">
                    <h1 class="font-extrabold text-2xl mb-2 text-green-800">Roles</h1>
                    <div class="flex justify-between items-center">
                        <i class="fa-solid fa-scale-balanced text-5xl text-green-200"></i>
                        <p class="text-4xl font-bold text-green-800">{{ $rolesCount }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg px-3 py-2">
                    <h1 class="font-extrabold text-2xl mb-2 text-green-800">Niveles</h1>
                    <div class="flex justify-between items-center">
                        <i class="fa-solid fa-layer-group text-5xl text-green-200"></i>
                        <p class="text-4xl font-bold text-green-800">{{ $nivelesCount }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg px-3 py-2">
                    <h1 class="font-extrabold text-2xl mb-2 text-green-800">Usuarios</h1>
                    <div class="flex justify-between items-center">
                        <i class="fa-solid fa-users text-5xl text-green-200"></i>
                        <p class="text-4xl font-bold text-green-800">{{ $usersCount }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg px-3 py-2">
                    <h1 class="font-extrabold text-2xl mb-2 text-green-800">Categorías</h1>
                    <div class="flex justify-between items-center">
                        <i class="fa-solid fa-icons text-5xl text-green-200"></i>
                        <p class="text-4xl font-bold text-green-800">{{ $categoriesCount }}</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg px-3 py-2">
                    <h1 class="font-extrabold text-2xl mb-2 text-green-800">Noticias</h1>
                    <div class="flex justify-between items-center">
                        <i class="fa-solid fa-newspaper text-5xl text-green-200"></i>
                        <p class="text-4xl font-bold text-green-800">{{ $newsCount }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg px-3 py-2">
                    <h1 class="font-extrabold text-2xl mb-2 text-green-800">Eventos</h1>
                    <div class="flex justify-between items-center">
                        <i class="fa-solid fa-calendar-days text-5xl text-green-200"></i>
                        <p class="text-4xl font-bold text-green-800">{{ $eventsCount }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg px-3 py-2">
                    <h1 class="font-extrabold text-2xl mb-2 text-green-800">Documentos</h1>
                    <div class="flex justify-between items-center">
                        <i class="fa-solid fa-file-invoice text-5xl text-green-200"></i>
                        <p class="text-4xl font-bold text-green-800">{{ $documentsCount }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg rounded-lg px-3 py-2">
                    <h1 class="font-extrabold text-2xl mb-2 text-green-800">Cursos</h1>
                    <div class="flex justify-between items-center">
                        <i class="fa-solid fa-person-chalkboard text-5xl text-green-200"></i>
                        <p class="text-4xl font-bold text-green-800">{{ $coursesCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
