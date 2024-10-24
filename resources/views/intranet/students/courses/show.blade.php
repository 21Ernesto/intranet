<x-students>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
        <div class="bg-white shadow-md rounded">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-2">{{ $course->code }}</h1>
                <p class="text-sm text-gray-500 mb-4">{{ $course->name }}</p>
                <p class="text-sm text-gray-500 mb-4">Publicado por {{ $course->user->last_name }},
                    {{ $course->user->first_name }}</p>
                <div class="mt-5">
                    <h1 class="font-bold mb-3">Materiales del curso</h1>
                    <ul class="list-disc pl-5">
                        @foreach ($course->courseMaterials as $material)
                            <li class="mb-4">
                                <div class="flex items-center">
                                    <label
                                        class="block text-sm font-extrabold text-gray-800 mr-3">{{ $material->title }}</label>
                                    <a href="{{ Storage::url($material->file_path) }}" target="_blank"
                                        class="text-blue-500 hover:underline">
                                        <i class="fa fa-download" aria-hidden="true"></i> Descargar
                                    </a>
                                </div>
                                <cite class="block text-xs text-gray-400 mt-1">{{ $material->description }}</cite>
                            </li>
                        @endforeach
                    </ul>
                </div>


                <div class="prose mt-4">
                    {!! $course->description !!}
                </div>
            </div>
        </div>
    </div>
</x-students>
