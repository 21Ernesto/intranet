<div>
    <div class="flex justify-between items-center mb-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de documentos') }}
        </h2>
        <a href="{{ route('documents.create') }}" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mt-4 inline-block">
            Crear nuevo
        </a>
    </div>
    <div class="mb-3 text-end">
        <input wire:model.live="search"
            class="w-96 h-10 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
            type="text" name="search" placeholder="Buscar">
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Título</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Contenido</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Publicado</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($documents as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{!! substr($item->description, 0, 20) !!}{!! strlen($item->description) > 20 ? '...' : '' !!}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->uploaded_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('documents.show', $item->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">
                            <i class="fas fa-eye text-xl"></i>
                        </a>
                        <a href="{{ route('documents.edit', $item->id) }}" class="text-green-600 hover:text-green-900 mr-2">
                            <i class="fas fa-edit text-xl"></i>
                        </a>
                        <form action="{{ route('documents.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash-alt text-xl"></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $documents->links() }}
    </div>
</div>
