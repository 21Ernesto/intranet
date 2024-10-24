<x-app-layout>
    <div class="flex justify-between items-center mb-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Evento') }}
        </h2>
    </div>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data"
        class="mx-auto bg-white p-6 rounded-md shadow-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">

            @error('title')
                <span class="text-xs text-red-800">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Contenido</label>
            <textarea name="description" id="description" rows="4" value="{{ old('description') }}"
                class="form-textarea mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"></textarea>
                @error('description')
                <span class="text-xs text-red-800">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Fecha de Publicación</label>
                <input type="datetime-local" name="date" id="date" value="{{ old('date') }}"
                    class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    @error('date')
                    <span class="text-xs text-red-800">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="category_id" id="category_id"
                class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                        <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                    @endforeach
                </select>
                @error('level_id')
                    <span class="text-xs text-red-800">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Ubicación</label>
            <input type="text" name="location" id="location" value="{{ old('location') }}"
                class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">

            @error('location')
                <span class="text-xs text-red-800">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-4">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </div>
    </form>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.log(error);
            });
    </script>
</x-app-layout>
