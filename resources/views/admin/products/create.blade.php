<x-layouts.app :title="__('Product Toevoegen')">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold">Product Toevoegen</h2>
                    </div>

                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Naam</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Beschrijving</label>
                            <textarea name="description" id="description" rows="4"
                                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prijs (€)</label>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md">
                            @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categorie</label>
                            <select name="category" id="category"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md">
                                <option value="FiveM Plugin" {{ old('category') == 'FiveM Plugin' ? 'selected' : '' }}>FiveM Plugin</option>
                                <option value="Discord Bot" {{ old('category') == 'Discord Bot' ? 'selected' : '' }}>Discord Bot</option>
                                <option value="Web Development" {{ old('category') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                            </select>
                            @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Framework Selection (alleen voor FiveM Plugin) -->
                        <div class="mb-4" id="frameworkSection" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Frameworks</label>
                            <div class="grid grid-cols-2 gap-3">
                                @php
                                    $frameworks = ['QBCore', 'ESX', 'vRP', 'Ox Core', 'Standalone'];
                                    $selectedFrameworks = old('frameworks', []);
                                @endphp

                                @foreach($frameworks as $framework)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="frameworks[]" value="{{ $framework }}"
                                               {{ in_array($framework, $selectedFrameworks) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $framework }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('frameworks')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Picture</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                   class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-300
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                dark:file:bg-indigo-900 dark:file:text-indigo-300
                                hover:file:bg-indigo-100 dark:hover:file:bg-indigo-800">
                            @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Featured product</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('admin.products.index') }}" class="text-gray-500 dark:text-gray-400 mr-4">
                                Anulate
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Create Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

<script>
    document.getElementById('category').addEventListener('change', function() {
        const frameworkSection = document.getElementById('frameworkSection');
        if (this.value === 'FiveM Plugin') {
            frameworkSection.style.display = 'block';
        } else {
            frameworkSection.style.display = 'none';
        }
    });

    // Show on page load if FiveM Plugin is selected
    document.addEventListener('DOMContentLoaded', function() {
        const category = document.getElementById('category').value;
        if (category === 'FiveM Plugin') {
            document.getElementById('frameworkSection').style.display = 'block';
        }
    });
</script>
