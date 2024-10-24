<x-app-layout>
    <div class="flex justify-between items-center mb-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cargar curso') }}
        </h2>
    </div>
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data"
        class="mx-auto bg-white p-6 rounded-md shadow-md">
        @csrf
        <div class="mb-4">
            <label for="code" class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" name="code" id="code" value="{{ old('code') }}"
                class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">

            @error('code')
                <span class="text-xs text-red-800">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="form-input mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">

            @error('name')
                <span class="text-xs text-red-800">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Contenido</label>
            <textarea name="description" id="description" rows="4"
                class="form-textarea mt-1 block w-full rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ old('description') }}</textarea>
                @error('description')
                <span class="text-xs text-red-800">{{ $message }}</span>
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
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md">Guardar</button>
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
