<div>
    <table class="min-w-full bg-white rounded overflow-hidden shadow-lg">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Archivo</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Usuario</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Justificado</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($justifications as $justification)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $justification->file }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $justification->user->last_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($justification->justification)
                            <span class="bg-green-500 text-white px-2 py-1 rounded">Justificado</span>
                        @else
                            <span class="bg-red-500 text-white px-2 py-1 rounded">No justificado</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button wire:click="edit({{ $justification->id }})" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Editar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal para editar justificación -->
    @if ($isOpen)
        <div class="fixed inset-0 overflow-y-auto px-4 py-6 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full p-6">
                <h2 class="text-2xl font-semibold mb-4">Editar Justificación</h2>

                <form wire:submit.prevent="updateJustification">
                    <div class="mb-4 hidden">
                        <label for="file" class="block text-sm font-medium text-gray-700">Archivo</label>
                        <input wire:model="file" type="hidden" id="file" name="file" class="mt-1 block w-full px-3 py-2 border rounded-md" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Estado de Justificación</label>
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input wire:model="justification" type="checkbox" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="ml-2">Justificado</span>
                            </label>
                        </div>
                    </div>



                    <div class="flex justify-end">
                        <a href="{{ Storage::url($justification->file) }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Descargar</a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded ml-2">Guardar</button>
                        <button type="button" @click="closeModal" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
