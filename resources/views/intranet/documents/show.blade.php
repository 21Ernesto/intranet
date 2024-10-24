<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-5">
                    {{ $document->title }}
                </h2>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-800">Descripción</label>
                    <p class="mt-1 text-gray-900">{!! $document->description !!}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-800">Documento</label>
                    <a href="{{ Storage::url($document->file_path) }}" target="_blank" class="text-blue-500 hover:underline">Ver Documento</a>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-800">Fecha de Publicación</label>
                    <p class="mt-1 text-gray-900">{{ $document->uploaded_at }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-800">Subido por</label>
                    <p class="mt-1 text-gray-900">{{ $document->user->first_name }}, {{ $document->user->last_name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-extrabold text-gray-800">Nivel</label>
                    <p class="mt-1 text-gray-900">{{ $document->level->name }}</p>
                </div>
                <div class="flex justify-end mt-6">
                    <a href="{{ route('documents.edit', $document) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition">Editar</a>
                    <form action="{{ route('documents.destroy', $document) }}" method="POST" class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition" onclick="return confirm('¿Estás seguro de que deseas eliminar este documento?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
