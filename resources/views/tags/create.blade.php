<x-app-layout>
    <x-selfmade.base>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulario con Tailwind y FontAwesome</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <script src="https://kit.fontawesome.com/YOUR_FA_KIT.js" crossorigin="anonymous"></script>
        </head>

        <body class="flex items-center justify-center min-h-screen bg-gray-100 px-4">
            <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md mx-auto">
                <h2 class="text-2xl font-semibold text-gray-700 text-center mb-4">
                    <i class="fas fa-edit text-blue-500"></i> Formulario
                </h2>
                <form action="{{route('tags.store')}}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Campo Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium">
                            <i class="fas fa-user text-blue-500"></i> Nombre
                        </label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <x-input-error for="name" />
                    </div>

                    <!-- Campo Descripción -->
                    <div>
                        <label for="description" class="block text-gray-700 font-medium">
                            <i class="fas fa-align-left text-blue-500"></i> Descripción
                        </label>
                        <input type="text" id="description" name="description" required
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <x-input-error for="description" />
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-between">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            <i class="fas fa-paper-plane"></i> Enviar
                        </button>
                        <button type="reset" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                        <button type="button" onclick="window.history.back()"
                            class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            <i class="fas fa-times"></i> Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </body>

        </html>
    </x-selfmade.base>
</x-app-layout>