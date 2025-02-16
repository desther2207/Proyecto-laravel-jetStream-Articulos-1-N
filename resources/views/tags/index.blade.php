<x-app-layout>
    <x-selfmade.base>
        <div class="w-full mx-auto p-4">
            <!-- Botón Nuevo -->
            <div class="mb-6">
                <a href="{{route('tags.create')}}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                    <i class="fas fa-plus mr-2"></i> NUEVO
                </a>
            </div>

            <!-- Tabla -->
            <div class="relative overflow-x-auto shadow-lg rounded-lg">
                <table class="w-full text-sm text-left text-gray-900 dark:text-gray-200 bg-white dark:bg-gray-800">
                    <thead class="text-xs uppercase bg-gray-300 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nombre</th>
                            <th scope="col" class="px-6 py-3">Descripción</th>
                            <th scope="col" class="px-6 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $item)
                        <tr class="border-b border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                            <!-- Nombre -->
                            <td class="px-6 py-4 font-medium text-gray-800 dark:text-gray-100">
                                {{$item->name}}
                            </td>
                            <!-- Descripción -->
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                {{$item->description}}
                            </td>
                            <!-- Acciones -->
                            <td class="px-6 py-4 text-center flex justify-center space-x-4">
                                <a href="{{route('tags.edit', $item)}}" class="text-blue-500 hover:text-blue-700" title="Editar">
                                    <i class="fas fa-edit text-lg"></i>
                                </a>
                                <form action="{{route('tags.destroy', $item)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Eliminar">
                                        <i class="fas fa-trash text-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!--Mensajeria-->

        @session('message')
        <script>
            Swal.fire({
                title: "Good job!",
                text: "{{session('message')}}",
                icon: "success"
            });
        </script>
        @endsession
    </x-selfmade.base>
</x-app-layout>