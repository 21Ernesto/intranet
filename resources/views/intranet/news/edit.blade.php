<x-app-layout>
    <div class="flex justify-between items-center mb-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Noticia') }}
        </h2>
    </div>
    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-md shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title"
                class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                value="{{ $news->title }}">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Contenido</label>
            <textarea name="content" id="content" rows="4"
                class="form-textarea mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ $news->content }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" name="image" id="image"
                class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            @if ($news->image)
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Imagen actual:</p>
                    <img src="{{ asset('storage/' . $news->image) }}" alt="Imagen de la noticia"
                        class="mt-2 h-24 w-auto rounded-md">
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="mb-4">
                <label for="published_at" class="block text-sm font-medium text-gray-700">Fecha de Publicación</label>
                <input type="datetime-local" name="published_at" id="published_at"
                    class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                    value="{{ $news->published_at ? Carbon\Carbon::parse($news->published_at)->format('Y-m-d\TH:i') : '' }}">
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="category_id" id="category_id"
                    class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $news->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="level_id" class="block text-sm font-medium text-gray-700">Nivel</label>
                <select name="level_id" id="level_id" class="form-select mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}" {{ $news->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                    @endforeach
                </select>
                @error('level_id')
                    <span class="text-xs text-red-800">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Actualizar
        </button>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.log(error);
            });
    </script>
</x-app-layout>
