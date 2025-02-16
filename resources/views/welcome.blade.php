<x-app-layout>
    <x-selfmade.base>
        <div class="relative overflow-hidden rounded-lg shadow-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <!-- Encabezado -->
                <thead class="text-xs uppercase bg-gray-800 text-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-user"></i> Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-heading"></i> Título
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-align-left"></i> Contenido
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fas fa-tag"></i> Etiqueta
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            <i class="fas fa-cogs"></i> Acciones
                        </th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($articulos as $item)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <!-- Usuario -->
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white flex items-center gap-2">
                                <i class="fas fa-user-circle text-gray-500"></i>
                                {{$item->user->email}}
                            </td>

                            <!-- Título -->
                            <td class="px-6 py-4">{{$item->title}}</td>

                            <!-- Contenido -->
                            <td class="px-6 py-4 truncate max-w-xs">{{$item->content}}</td>

                            <!-- Etiqueta -->
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs font-semibold text-white bg-blue-500 rounded-md">
                                    {{$item->tag->name}}
                                </span>
                            </td>

                            <!-- Acciones -->
                            <td class="px-6 py-4 text-center">
                                <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="text-red-600 dark:text-red-400 hover:underline ml-4">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mensajería -->
        @session('message')
            <script>
                Swal.fire({
                    title: "¡Bien hecho!",
                    text: "{{session('message')}}",
                    icon: "success"
                });
            </script>
        @endsession
    </x-selfmade.base>
</x-app-layout>
