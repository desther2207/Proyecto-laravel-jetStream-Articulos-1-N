<x-selfmade.base>

    <h3 class="mb-2 text-center w-full text-2xl font-bold">
        Listado de articulos de {{Auth::user()->name}}
    </h3>

    @livewire('crear-article')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 cursor-pointer mr-2" wire:click="ordenar('title')">Title <i class="fas fa-sort"></i></th>
                    <th scope="col" class="px-6 py-3 cursor-pointer mr-2" wire:click="ordenar('content')">Content <i class="fas fa-sort"></i></th>
                    <th scope="col" class="px-6 py-3">Tag</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->title}}
                    </th>
                    <td class="px-6 py-4">{{$item->content}}</td>
                    <td class="px-6 py-4">{{$item->tag->name}}</td>
                    <td class="px-6 py-4 text-center w-32">

                        <button wire:click="edit({{$item->id}})"><i class="fas fa-edit text-blue-500"></i></button>
                        <button wire:click="confirmarDelete({{$item->id}})"><i class="fas fa-trash text-red-500"></i></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2">
        {{$articles->links()}}
    </div>
    <!----------------------- Modal para Editar --------------------------->
    <x-dialog-modal wire:model="openUpdate">
        <x-slot name="title">
            EDITAR POST
        </x-slot>
        <x-slot name="content">
            <!-- Título -->
            <div class="mb-6">
                <label for="title" class="block text-lg font-medium text-gray-700 mb-2">Title</label>
                <input type="text" wire:model="uform.title"
                    id="title" name="title" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" placeholder="Escribe el título del post">
                <x-input-error for="uform.title" />
            </div>

            <!-- Contenido -->
            <div class="mb-6">
                <label for="content" class="block text-lg font-medium text-gray-700 mb-2">Content</label>
                <textarea wire:model="uform.content"
                    id="content" name="content" rows="6" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500" placeholder="Escribe el contenido del post"></textarea>
                <x-input-error for="uform.content" />
            </div>

            <!-- Tag -->
            <div class="mb-6">
                <label for="tag" class="block text-lg font-medium text-gray-700 mb-2">Tag</label>
                <select id="tag" wire:model="uform.tag_id" name="tag" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    <option selected>Seleccionar categoría</option>
                    @foreach($tags as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <x-input-error for="uform.tag_id" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <!-- Botón de Enviar -->
            <div class="flex flex-row-reverse justify-center">
                <button wire:click="update" wire:loading.attr="disabled" class="p-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                    <i class="fas fa-paper-plane mr-2"></i> Editar Article
                </button>
                <button wire:click="cancelar" class="p-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition duration-300">
                    <i class="fas fa-xmark mr-2"></i> Cancelar
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
</x-selfmade.base>