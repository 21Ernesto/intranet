<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
    @foreach($posts as $post)
        <div class="bg-white shadow-md rounded mb-4 p-4">
            <h2 class="text-lg font-bold"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
            <p class="text-sm text-gray-600">Publicado por {{ $post->user->last_name }} el {{ $post->created_at->format('d/m/Y H:i') }}</p>
            <p class="mt-2">{{ $post->content }}</p>
        </div>
    @endforeach

    {{ $posts->links() }}
</div>
