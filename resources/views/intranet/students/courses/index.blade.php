<x-students>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Cursos</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse ($courses as $course)
                <div class="bg-white shadow-md rounded mb-4">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mt-2">{{ $course->code }}</h2>
                        <p class="text-sm text-gray-500 mt-2">{{ $course->name }}</p>
                        <p class="text-sm text-gray-500 mt-2"><span class="font-bold text-black">Por: </span>{{ $course->user->last_name }}, {{ $course->user->first_name }}</p>
                        <a href="{{ route('cursos.show', $course->id) }}"
                            class="text-blue-500 hover:underline mt-2 inline-block font-semibold">Leer más</a>
                    </div>
                </div>
            @empty
                <p>No hay cursos disponibles para tu nivel.</p>
            @endforelse
        </div>
    </div>
</x-students>