<div>
    <x-button class="font-bold" wire:click="$set('openCrear', true)">
        <i class="fas fa-plus mr-2"></i> NUEVO
    </x-button>

    <x-dialog-modal wire:model="openCrear">
        <x-slot name="title">
            CREAR ARTÍCULO
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">
                    <i class="fas fa-heading"></i> Title
                </label>
                <input type="text" id="title" name="title" wire:model="cform.title"
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white"
                    placeholder="Enter the title" required>
            <x-input-error for="cform.content"/>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">
                    <i class="fas fa-align-left"></i> Content
                </label>
                <textarea id="content" name="content" rows="4" wire:model="cform.content"
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white"
                    placeholder="Write something..." required></textarea>
            <x-input-error for="cform.content"/>
            </div>

            <div class="mb-4">
                <label for="tag" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">
                    <i class="fas fa-tags"></i> Tag
                </label>
                <select id="tag" name="tag" wire:model="cform.tag_id"
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                    <option value="">Select a tag</option>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            <x-input-error for="cform.tag_id"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click="store"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition flex items-center justify-center gap-2">
                <i class="fas fa-paper-plane"></i> Submit
            </button>
        </x-slot>
    </x-dialog-modal>
</div>