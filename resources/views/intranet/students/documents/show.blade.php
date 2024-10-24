<x-students>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
        <div class="bg-white shadow-md rounded">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-2">{{ $document->title }}</h1>
                <p class="text-sm text-gray-500 mb-3">Publicado el {{ $document->uploaded_at }}</p>
                <p class="text-sm text-gray-500 mb-4">Autor: {{ $document->user->last_name }}, {{ $document->user->first_name }}</p>
                <div class="mb-4 flex items-center">
                    <label class="block text-sm font-extrabold text-gray-800 mr-3">Documento</label>
                    <a href="{{ Storage::url($document->file_path) }}" target="_blank" class="text-blue-500 hover:underline">
                        <i class="fa fa-download" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="prose mt-4">
                    {!! $document->description !!}
                </div>
            </div>
        </div>
    </div>
</x-students>
