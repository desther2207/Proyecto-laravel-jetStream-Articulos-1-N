<x-app-layout>
    <x-selfmade.base>
        <div class="max-w-lg mx-auto bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
                <i class="fas fa-paper-plane"></i> Contacto
            </h2>

            <form action="{{route('contacto.procesar')}}" method="POST" class="space-y-4">
                @csrf
                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-gray-700 dark:text-gray-300 font-medium">
                        <i class="fas fa-user"></i> Nombre
                    </label>
                    <input type="text" id="name" name="name" required
                        class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white">
                    <x-input-error for="name" />
                </div>

                @guest
                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 dark:text-gray-300 font-medium">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" id="email" name="email" required
                        class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white">
                    <x-input-error for="email" />
                </div>
                @endguest

                <!-- Mensaje -->
                <div>
                    <label for="body" class="block text-gray-700 dark:text-gray-300 font-medium">
                        <i class="fas fa-comment"></i> Mensaje
                    </label>
                    <textarea id="body" name="body" rows="4" required
                        class="w-full mt-1 p-2 border rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white"></textarea>
                    <x-input-error for="body" />
                </div>

                <!-- Botones -->
                <div class="flex justify-between mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        <i class="fas fa-paper-plane"></i> Enviar
                    </button>
                    <button type="reset" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="button" onclick="window.history.back()"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                </div>
            </form>
        </div>
    </x-selfmade.base>
</x-app-layout>