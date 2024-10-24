<x-students>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
        <div class="bg-white shadow-md rounded">
            <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/default-news.jpg') }}"
                alt="{{ $news->title }}" class="w-full h-96 object-cover rounded-tl rounded-tr mb-4">
            <div class="p-6">
                <h1 class="text-3xl font-bold mb-2">{{ $news->title }}</h1>
                <p class="text-sm text-gray-500 mb-4">Publicado el {{ $news->published_at }} por
                    {{ $news->user->last_name }}</p>
                <div class="prose">
                    {!! $news->content !!}
                </div>
            </div>
        </div>
    </div>
</x-students>
