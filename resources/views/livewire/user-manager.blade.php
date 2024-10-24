<div>
    <div x-data="{ open: false }">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Lista de usuarios</h1>
            <div>
                <a href="{{ asset('docs/Plantilla.xlsx') }}" target="_blank" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded"><i class="fa-solid fa-file-arrow-down"></i></a>
                <button class="bg-blue-400 px-2 py-1 rounded text-white font-bold" @click="open = true" title="Crear nuevo usuario">Crear nuevo</button>
            </div>
        </div>

        <div>
            @if (session()->has('message'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="import" class="mb-4 mt-4">
                <div class="flex items-center gap-4">

                    <div class="">
                        <input type="file" wire:model="file" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                        @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="bg-green-400 px-4 py-2 rounded text-white font-bold"><i class="fa-solid fa-upload"></i></button>

                </div>
            </form>

            <div wire:loading wire:target="import" >
                <div class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
                    <div class="bg-white rounded-lg p-8">
                        <div class="flex items-center mb-4">
                            <div class="mr-4">
                                <svg class="animate-spin h-8 w-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0c-4.418 0-8 3.582-8 8zM20 12a8 8 0 01-8 8v-4c0-4.418 3.582-8 8-8z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-semibold">Importando usuarios...</p>
                                <p class="text-sm text-gray-500">Por favor, espere mientras se procesa la importación.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-50">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-4xl sm:w-full">
                <form wire:submit.prevent="save" class="mb-4 mt-4">
                    <h1 class="pl-5 text-3xl font-semibold mb-4">{{ $editId ? 'Actualizar usuario' : 'Crear nuevo usuario' }}</h1>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="px-5 mb-3">
                            <label for="identification">Identificación:</label>
                            <input type="text" wire:model="identification" id="identification" placeholder="Identificación"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('identification')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="last_name">Apellidos:</label>
                            <input type="text" wire:model="last_name" id="last_name" placeholder="Apellidos"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('last_name')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="first_name">Nombres:</label>
                            <input type="text" wire:model="first_name" id="first_name" placeholder="Nombres"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('first_name')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="gender">Sexo:</label>
                            <input type="text" wire:model="gender" id="gender" placeholder="Sexo"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('gender')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="phone">Teléfono:</label>
                            <input type="text" wire:model="phone" id="phone" placeholder="Teléfono"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('phone')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="mobile">Celular:</label>
                            <input type="text" wire:model="mobile" id="mobile" placeholder="Celular"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('mobile')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="email">Email:</label>
                            <input type="email" wire:model="email" id="email" placeholder="Email"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('email')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="password">Password:</label>
                            <input type="password" wire:model="password" id="password" placeholder="Password"
                                class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                            @error('password')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="level_id">Nivel:</label>
                            <select wire:model="level_id" id="level_id" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                <option value="">Seleccione un nivel</option>
                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @error('level_id')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="px-5 mb-3">
                            <label for="role_id">Rol:</label>
                            <select wire:model="role_id" id="role_id" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full">
                                <option value="">Seleccione un rol</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex p-4 bg-gray-50 sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $editId ? 'Actualizar' : 'Crear' }}</button>

                        <button type="button" wire:click="cancelEdit" @click="open = false"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="mx-auto overflow-x-auto">
            <div class="mb-3 text-end">
                <input wire:model.live="search"
                    class="w-96 h-10 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                    type="text" name="search" placeholder="Buscar">
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Identificación</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombres</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Apellidos</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nivel</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Correo electrónico</th>
                        <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <div wire:transition>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->identification }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->first_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->level->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-end">
                                    <button wire:click="edit({{ $user->id }})" @click="open = true"
                                        title="Editar {{ $user->name }}"
                                        class="text-indigo-600 hover:text-indigo-900 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="users({{ $user->id }})" title="Eliminar {{ $user->name }}"
                                        class="text-red-600 hover:text-red-900 mr-4">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>

            <div class="mt-3">
                {{ $users->links() }}
            </div>
        </div>

    </div>
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function users(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('delete', id);
                        Swal.fire(
                            '¡Eliminado!',
                            'Ha sido eliminado.',
                            'success'
                        )
                    }
                })
            }
        </script>
    @endpush
</div>
