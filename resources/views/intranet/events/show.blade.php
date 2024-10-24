<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-5">
                    {{ $event->title }}
                </h2>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-700">Descripción</label>
                    <p class="mt-1 text-gray-900">{!! $event->description !!}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-700">Fecha del Evento</label>
                    <p class="mt-1 text-gray-900">{{ \Carbon\Carbon::parse($event->date)->format('d/m/Y H:i') }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-700">Ubicación</label>
                    <p class="mt-1 text-gray-900">{{ $event->location }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-700">Categoría</label>
                    <p class="mt-1 text-gray-900">{{ $event->category->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-700">Organizado por</label>
                    <p class="mt-1 text-gray-900">{{ $event->user->first_name }}, {{ $event->user->last_name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-700">Nivel</label>
                    <p class="mt-1 text-gray-900">{{ $event->level->name }}</p>
                </div>
                <div class="flex justify-end mt-6">
                    <a href="{{ route('events.edit', $event) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition">Editar</a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition" onclick="return confirm('¿Estás seguro de que deseas eliminar este evento?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
