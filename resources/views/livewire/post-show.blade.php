<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow-md rounded mb-4 p-4">
        <h2 class="text-lg font-bold">{{ $post->title }}</h2>
        <p class="text-sm text-gray-600">Publicado por {{ $post->user->last_name }} el {{ $post->created_at->format('d/m/Y H:i') }}</p>
        <p class="mt-2">{{ $post->content }}</p>
    </div>

    @foreach($replies as $reply)
        <div class="bg-gray-100 shadow-md rounded mb-4 p-4">
            <p class="text-sm text-gray-600">Respuesta por {{ $reply->user->last_name }} el {{ $reply->created_at->format('d/m/Y H:i') }}</p>
            <p class="mt-2">{{ $reply->content }}</p>
        </div>
    @endforeach

    {{ $replies->links() }}

    <!-- Formulario para responder al tema -->
    <form wire:submit.prevent="submitReply">
        <textarea wire:model="replyContent" class="w-full px-3 py-2 border rounded-md" rows="4" placeholder="Escribe tu respuesta aquí..."></textarea>
        @error('replyContent') <span class="text-red-500">{{ $message }}</span> @enderror
        <div class="mt-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Responder</button>
        </div>
    </form>
</div>
