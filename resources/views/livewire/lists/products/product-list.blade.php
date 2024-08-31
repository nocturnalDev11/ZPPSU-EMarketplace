<div x-data="{
    openSort: false,
    openFilter: false,
    selectedCategories: @entangle('selectedCategories'),
    sortBy: @entangle('sortBy'),
    search: @entangle('search')
}">
    <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <!-- Search -->
        <div class="relative w-full md:w-1/2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
              </svg>
            </div>
            <input type="search" wire:model.live="search" placeholder="Search" autocomplete="off" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
        </div>

        <!-- Actions -->
        <div class="flex flex-col items-stretch justify-end w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
            <!-- Add Product -->
            <button type="button"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-purple-700 hover:bg-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Add product
            </button>

            <!-- Sort by -->
            <div @click.away="openSort = false" class="relative">
                <button @click="openSort = !openSort"
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                    Sort by
                    <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
                <div x-show="openSort" class="absolute mt-2 w-44 bg-white shadow rounded z-10">
                    <button wire:click="setSort('latest')"
                        class="block w-full px-4 py-2 text-sm text-left hover:bg-gray-100">
                        Latest
                    </button>
                    <button wire:click="setSort('oldest')"
                        class="block w-full px-4 py-2 text-sm text-left hover:bg-gray-100">
                        Oldest
                    </button>
                </div>
            </div>

            <!-- Filter -->
            <div @click.away="openFilter = false" class="relative">
                <button @click="openFilter = !openFilter"
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                    Filter
                    <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
                <div x-show="openFilter" class="absolute mt-2 w-48 p-3 bg-white shadow rounded z-10">
                    <h6 class="mb-3 text-sm font-medium text-gray-900">
                        Category
                    </h6>
                    <ul class="space-y-2 text-sm">
                        @foreach (['Apparel', 'School supplies', 'Footwares', 'Stationery', 'Electronics', 'University merchandise', 'Musical instruments', 'Books'] as $category)
                        <li class="flex items-center">
                            <input type="checkbox" wire:model.live="selectedCategories"
                                value="{{ $category }}"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                            <label for="{{ $category }}" class="ml-2 text-sm font-medium text-gray-900">
                                {{ $category }}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Product List -->
    <div class="flex flex-wrap -mx-3">
        @forelse ($products as $product)
        <div class="w-full max-w-full px-3 mb-6 md:w-6/12 xl:mb-0 xl:w-3/12">
            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl">
                <div class="relative">
                    <a href="{{ route('products.show', $product->id) }}" class="block shadow-lg rounded-2xl">
                        <img src="{{ asset('storage/' . $product->prod_picture) }}" alt="{{ $product->prod_name }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl">
                    </a>
                </div>
                <div class="flex-auto px-1 pt-6">
                    <a href="{{ route('products.show', $product->id) }}">
                        <h5 class="dark:text-white">{{ $product->prod_name }}</h5>
                    </a>
                    <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                        <span class="text-gray-600 dark:text-gray-400">₱ {{ number_format($product->prod_price, 2) }}</span>
                    </p>
                    <a href="{{ route('products.show', $product->id) }}" class="text-sm font-medium text-gray-700 hover:text-maroon">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <div class="flex items-center justify-center w-full">
            <p class="text-lg text-gray-700">No products found.</p>
        </div>
        @endforelse
    </div>
</div>
