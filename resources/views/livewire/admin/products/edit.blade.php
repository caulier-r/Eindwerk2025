<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold">Product Bewerken</h2>
                    </div>

                    <form wire:submit.prevent="update">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Naam</label>
                            <input type="text" wire:model="name" id="name"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Beschrijving</label>
                            <textarea wire:model="description" id="description" rows="4"
                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md"></textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prijs (€)</label>
                            <input type="number" step="0.01" wire:model="price" id="price"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md">
                            @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categorie</label>
                            <select wire:model="category" id="category"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md">
                                <option value="FiveM Plugin">FiveM Plugin</option>
                                <option value="Discord Bot">Discord Bot</option>
                                <option value="Web Development">Web Development</option>
                            </select>
                            @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="newImage" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Afbeelding</label>
                            @if($product->image)
                                <div class="mt-2 mb-4">
                                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" class="h-24 w-auto">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Huidige afbeelding. Upload een nieuwe om te vervangen.</p>
                                </div>
                            @endif
                            <input type="file" wire:model="newImage" id="newImage"
                                   class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-300
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                dark:file:bg-indigo-900 dark:file:text-indigo-300
                                hover:file:bg-indigo-100 dark:hover:file:bg-indigo-800">
                            @error('newImage')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            @if ($newImage)
                                <div class="mt-2">
                                    <img src="{{ $newImage->temporaryUrl() }}" class="h-20 w-auto" alt="Nieuwe afbeelding">
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" wire:model="featured" value="1"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Featured product</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.products.index') }}" class="text-gray-500 dark:text-gray-400 mr-4">
                                Annuleren
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Product Bijwerken
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
