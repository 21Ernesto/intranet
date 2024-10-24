<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-5">
                    {{ $news->title }}
                </h2>
                <div class="mb-4">
                    <label class="block font-extrabold text-sm text-gray-800">Contenido</label>
                    <p class="mt-1 text-gray-900">{!! $news->content !!}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-extrabold text-sm text-gray-800">Imagen</label>
                    <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="mt-1 rounded-md shadow-md w-full h-auto">
                </div>
                <div class="mb-4">
                    <label class="block font-extrabold text-sm text-gray-800">Fecha de Publicación</label>
                    <p class="mt-1 text-gray-900">{{ \Carbon\Carbon::parse($news->published_at)->format('d/m/Y H:i') }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-extrabold text-sm text-gray-800">Categoría</label>
                    <p class="mt-1 text-gray-900">{{ $news->category->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-extrabold text-sm text-gray-800">Publicado por</label>
                    <p class="mt-1 text-gray-900">{{ $news->user->first_name }}, {{ $news->user->last_name }}</p>
                </div>
                <div class="mb-4">
                    <label class="block font-extrabold text-sm text-gray-800">Nivel</label>
                    <p class="mt-1 text-gray-900">{{ $news->level->name }}</p>
                </div>
                <div class="flex justify-end mt-6">
                    <a href="{{ route('news.edit', $news) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-yellow-600 transition">Editar</a>
                    <form action="{{ route('news.destroy', $news) }}" method="POST" class="ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition" onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
