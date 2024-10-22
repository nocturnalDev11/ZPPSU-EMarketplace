<div x-data="{
    openSort: false,
    openFilter: false,
    openStatus: false,
    selectedCategories: @entangle('selectedCategories'),
    status: @entangle('status'),
    sortBy: @entangle('sortBy'),
    search: @entangle('search')
}">
    <!-- Product List -->
    <div class="mx-4 my-6 gap-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0 w-full">
                <!-- Search -->
                <div class="relative sm:w-full xl:w-1/2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="search" wire:model.live="search" placeholder="Search" autocomplete="off"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-400"
                        placeholder="Search" required="">
                </div>
            </div>

            <div class="justify-end items-center sm:flex gap-2 w-full">
                <div @click.away="openStatus = false" class="relative">
                    <button @click="openStatus = !openStatus"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
                        Status
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div x-show="openStatus" class="absolute right-0 mt-2 w-48 p-3 bg-white shadow rounded z-10">
                        <h6 class="mb-3 text-sm font-medium text-gray-900">
                            Status
                        </h6>
                        <ul class="space-y-2 text-sm">
                            @foreach (['Available', 'Out of Stock', 'Closed'] as $status)
                            <li class="flex items-center">
                                <input type="checkbox" wire:model.live="status" value="{{ $status }}"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                <label for="{{ $status }}" class="ml-2 text-sm font-medium text-gray-900">
                                    {{ $status }}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Sort by -->
                <div @click.away="openSort = false" class="relative">
                    <button @click="openSort = !openSort"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
                        Sort by
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
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
                        class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
                        Filter
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div x-show="openFilter" class="absolute right-0 mt-2 w-48 p-3 bg-white shadow rounded z-10">
                        <h6 class="mb-3 text-sm font-medium text-gray-900">
                            Category
                        </h6>
                        <ul class="space-y-2 text-sm">
                            @foreach (['Apparel', 'School supplies', 'Footwares', 'Stationery', 'Electronics',
                            'University merchandise', 'Musical instruments', 'Books'] as $category)
                            <li class="flex items-center">
                                <input type="checkbox" wire:model.live="selectedCategories" value="{{ $category }}"
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
        <!-- Table -->
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Products
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Category
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Condition
                                    </th>
                                    <th scope="col" class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Listed by
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Created at
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                                @forelse ($products as $product)
                                <tr>
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center gap-4">
                                            <img class="w-10 h-10 rounded-xl object-cover bg-center"
                                                src="{{ asset('storage/' . $product->prod_picture) }}"
                                                alt="{{ $product->prod_name }}">
                                            <div class="font-medium dark:text-white">
                                                <div>{{ $product->prod_name }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    ₱{{ $product->prod_price }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $product->prod_status }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->prod_category }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $product->prod_condition }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        <a href="{{ route('view.user', ['id' => $product->user->id]) }}" wire:navigate class="hover:underline">
                                            {{ $product->user->first_name }} {{ $product->user->last_name }}
                                        </a>
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $product->created_at->format('F j, Y') }}
                                    </td>
                                    <td class="flex items-center p-4 whitespace-nowrap">
                                        <!-- View product -->
                                        <div x-data="{ modelOpen:false }">
                                            <button @click="modelOpen =!modelOpen" class="text-yellow-400 text-xs font-medium mr-2 dark:text-yellow-300">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor">
                                                    <path
                                                        d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                    </path>
                                                </svg>
                                            </button>

                                            <div x-show="modelOpen" class="fixed inset-0 z-[500] overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                                                aria-modal="true">
                                                <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                                    <div x-show="modelOpen" class="fixed inset-0 z-50 flex items-center justify-center"
                                                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                                            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                                                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                                            class="fixed inset-0 transition-opacity bg-gray-500 z-100 bg-opacity-40 backdrop:filter backdrop-blur-md dark:bg-gray-700 dark:bg-opacity-60 dark:backdrop:filter dark:backdrop-blur-md"
                                                            aria-hidden="true">
                                                        </div>

                                                        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave="transition ease-in duration-200 transform"
                                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            class="inline-block w-11/12 md:w-3/4 lg:w-2/5 p-8 items-center sm:my-24 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl">
                                                            <div class="flex items-center justify-end space-x-4">
                                                                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <div class="flex p-4 gap-4">
                                                                <div class="w-28 h-28">
                                                                    <img class="w-full h-full rounded-xl object-cover bg-center"
                                                                        src="{{ asset('storage/' . $product->prod_picture) }}" alt="{{ $product->prod_name }}">
                                                                </div>
                                                                <div>
                                                                    <h1 class="mb-2 text-xl font-bold text-gray-500">{{ $product->prod_name }}</h1>
                                                                    <p class="text-lg font-medium text-green-500">₱{{ $product->prod_price }}</p>
                                                                    <span
                                                                        class="bg-slate-200 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                                                        {{ $product->prod_status }}
                                                                    </span>
                                                                    <p class="text-sm text-gray-700 py-2">{!! nl2br(e($product->prod_description)) !!}</p>
                                                                </div>
                                                            </div>

                                                            <div class="flex justify-end pr-6">
                                                                <button @click="modelOpen = false" type="submit"
                                                                    class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete product -->
                                        <div x-data="{ modelOpen:false }">
                                            <button @click="modelOpen =!modelOpen" class="text-red-600 text-xs font-medium mr-2 dark:text-red-400">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>

                                            <div x-show="modelOpen" class="fixed inset-0 z-[500] overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                                                aria-modal="true">
                                                <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                                    <div x-show="modelOpen" class="fixed inset-0 z-50 flex items-center justify-center"
                                                        aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                                            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                                                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                                            class="fixed inset-0 transition-opacity bg-gray-500 z-100 bg-opacity-40 backdrop:filter backdrop-blur-md dark:bg-gray-700 dark:bg-opacity-60 dark:backdrop:filter dark:backdrop-blur-md"
                                                            aria-hidden="true">
                                                        </div>

                                                        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave="transition ease-in duration-200 transform"
                                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                            class="inline-block p-5 overflow-hidden text-left transition-all transform bg-white rounded-lg max-w-xl 2xl:max-w-5xl shadow-xl">
                                                            <div class="flex items-center justify-end space-x-4">
                                                                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <div class="p-4 text-center">
                                                                <svg class="mx-auto text-red-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>
                                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this product?</h3>
                                                            </div>
                                                            <div class="flex justify-end pr-6">
                                                                <form action="{{ route('delete.products', $product->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-lg text-gray-700 dark:text-gray-300">
                                        No product found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Footer -->
        <div class="flex items-center justify-between pt-3 sm:pt-6">
            <div>
                <button
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    type="button" data-dropdown-toggle="transactions-dropdown">Last 7 days
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
