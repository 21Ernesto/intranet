<div>
    <div class="flex justify-between items-center mb-5">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de cursos') }}
        </h2>
        <a href="{{ route('courses.create') }}" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded mt-4 inline-block">
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
                        Código</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descripción</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($courses as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->code }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{!! substr($item->description, 0, 20) !!}{!! strlen($item->description) > 20 ? '...' : '' !!}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('courses.material', $item->id) }}" title="Cargar documentos" class="text-green-600 hover:text-green-900 mr-2">
                            <i class="fa-regular fa-folder-open text-xl"></i>
                        </a>
                        <a href="{{ route('courses.show', $item->id) }}" title="Mostrar detalle" class="text-indigo-600 hover:text-indigo-900 mr-2">
                            <i class="fas fa-eye text-xl"></i>
                        </a>
                        <a href="{{ route('courses.edit', $item->id) }}" title="Modificar" class="text-orange-600 hover:text-orange-900 mr-2">
                            <i class="fas fa-edit text-xl"></i>
                        </a>
                        <form action="{{ route('courses.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Eliminar" class="text-red-600 hover:text-red-900">
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
        {{ $courses->links() }}
    </div>
</div>
