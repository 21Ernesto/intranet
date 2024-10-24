<x-students>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
        <h1 class="text-2xl font-bold mb-4">Noticias</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse ($news as $new)
                <div class="bg-white shadow-md rounded mb-4">
                    <img src="{{ $new->image ? asset('storage/' . $new->image) : asset('images/default-news.jpg') }}"
                        alt="{{ $new->title }}" class="w-full h-32 object-cover rounded-tl rounded-tr">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mt-2">{{ $new->title }}</h2>
                        <p class="text-gray-600">{!! Str::limit($new->content, 40) !!}</p>
                        <p class="text-sm text-gray-500 mt-2">{{ $new->published_at }}</p>
                        <p class="text-sm text-gray-500 mt-2"><span class="font-bold text-black">Por: </span>{{ $new->user->last_name }}, {{ $new->user->first_name }}
                        </p>
                        <a href="{{ route('noticias.show', $new->id) }}"
                            class="text-blue-500 hover:underline mt-2 inline-block font-semibold">Leer más</a>
                    </div>
                </div>
            @empty
                <p>No hay noticias disponibles para tu nivel.</p>
            @endforelse
        </div>
    </div>
</x-students>
