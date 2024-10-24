<x-app-layout>
    <div class="flex justify-between items-center mb-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar documento') }}
        </h2>
    </div>
    <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data"
        class="mx-auto bg-white p-6 rounded-md shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $document->title) }}"
                class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">

            @error('title')
                <span class="text-xs text-red-800">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Contenido</label>
            <textarea name="description" id="description" rows="4"
                class="form-textarea mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ old('description', $document->description) }}</textarea>
                @error('description')
                <span class="text-xs text-red-800">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="mb-4">
                <label for="file_path" class="block text-sm font-medium text-gray-700">Documento</label>
                <input type="file" name="file_path" id="file_path"
                    class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">

                @error('file_path')
                    <span class="text-xs text-red-800">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="uploaded_at" class="block text-sm font-medium text-gray-700">Fecha de Publicación</label>
                <input type="datetime-local" name="uploaded_at" id="uploaded_at" value="{{ old('uploaded_at', $document->uploaded_at) }}"
                    class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    @error('uploaded_at')
                    <span class="text-xs text-red-800">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="level_id" class="block text-sm font-medium text-gray-700">Nivel</label>
                <select name="level_id" id="level_id" class="form-select mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}" {{ $document->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                    @endforeach
                </select>
                @error('level_id')
                    <span class="text-xs text-red-800">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md">Actualizar</button>
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
