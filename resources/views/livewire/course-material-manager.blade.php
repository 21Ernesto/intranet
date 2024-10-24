<div>

    <div class="flex flex-col p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Materiales del Curso</h2>
            <button wire:click="create()" class="px-4 py-2 bg-blue-500 text-white rounded">Agregar Material</button>
        </div>

        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-500 text-white rounded">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="mx-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descripción</th>
                    <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courseMaterials as $material)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $material->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $material->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-end">
                            <button wire:click="edit({{ $material->id }})" @click="open = true"
                                title="Editar {{ $material->title }}"
                                class="text-indigo-600 hover:text-indigo-900 mr-2">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" onclick="confirmDeletion({{ $material->id }})"
                                title="Eliminar {{ $material->title }}" class="text-red-600 hover:text-red-900 mr-4">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($isOpen)
        @include('livewire.create-course-material')
    @endif
</div>
