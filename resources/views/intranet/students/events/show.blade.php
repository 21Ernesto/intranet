<x-students>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
        <div class="bg-white shadow-md rounded">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-2">{{ $event->title }}</h1>
                <p class="text-sm text-gray-500 mb-4">Publicado el {{ $event->date }} por {{ $event->user->last_name }}, {{ $event->user->first_name }}</p>
                <p class="text-xsm text-gray-500"><span class="font-bold text-black">Ubicación: </span> {{ $event->location }}</p>
                <p class="text-xsm text-gray-500">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-3 py-1 rounded-xl">
                        {{ $event->category->name }}
                    </span>
                </p>
                <div class="prose mt-4">
                    {!! $event->description !!}
                </div>
            </div>
        </div>
    </div>
</x-students>
