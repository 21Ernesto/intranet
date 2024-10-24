<x-students>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-8">Gestión de Justificaciones</h1>

        <!-- Formulario para crear justificación -->
        <form action="{{ route('justificacion.store') }}" method="POST" enctype="multipart/form-data"
            class="mb-8">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">Archivo</label>
                <input type="file" id="file" name="file" accept=".pdf,.docx,.jpg,.jpeg,.png"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Subir
            </button>
        </form>

        <div>
            <h2 class="text-xl font-bold mb-4">Listado de Justificaciones</h2>

            @if (count($justifications) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Archivo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Justificación
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($justifications as $justification)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <a class="text-indigo-600 hover:text-indigo-900">{{ $justification->file }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $justification->justification ? 'Sí' : 'No' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex space-x-2">

                                            <a href="{{ Storage::url($justification->file) }}" target="_blank" class="text-blue-500 hover:underline">Descargar</a>

                                            <form action="{{ route('justificacion.destroy', $justification->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 ml-2">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No hay justificaciones para mostrar.</p>
            @endif
        </div>
    </div>
</x-students>
