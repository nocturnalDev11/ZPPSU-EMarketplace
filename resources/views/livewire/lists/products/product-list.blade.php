<div x-data="{
    openSort: false,
    openFilter: false,
    selectedCategories: @entangle('selectedCategories'),
    sortBy: @entangle('sortBy'),
    search: @entangle('search')
}">
    <div class="flex xl:flex-row lg:flex-col md:flex-col flex-col items-center justify-between p-4 space-y-3 md:space-y-2 md:space-x-4">
        <!-- Search -->
        <div class="relative w-full md:w-1/2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
              </svg>
            </div>
            <input type="search" wire:model.live="search" placeholder="Search" autocomplete="off" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-400" placeholder="Search" required="">
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end w-full md:w-auto md:flex-row md:space-y-0 xl:gap-0 gap-2 md:items-center md:space-x-3">
            <!-- Add Product -->
            <div x-data="{ modelOpen: false }">
                <button type="button" @click="modelOpen =!modelOpen"
                    class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-purple-700 hover:bg-purple-800 dark:bg-purple-500 dark:hover:bg-purple-600">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add product
                </button>

                <div x-show="modelOpen" class="fixed inset-0 z-[700] overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                    aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-500 z-100 bg-opacity-40 backdrop:filter backdrop-blur-md dark:bg-gray-700 dark:bg-opacity-60 dark:backdrop:filter dark:backdrop-blur-md"
                            aria-hidden="true"></div>

                        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block w-full max-w-xl p-8 my-auto sm:my-24 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl dark:bg-gray-800 dark:backdrop:filter dark:backdrop-blur-lg dark:bg-opacity-90">
                            <div class="flex items-center justify-between space-x-4">
                                <h1 class="text-xl font-medium text-gray-800 dark:text-white">Create a product</h1>

                                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <form action="{{ route('product.store') }}" method="POST" class="mt-5" enctype="multipart/form-data">
                                @csrf
                                <!-- Photo File Input -->
                                <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                                    <input type="file" class="hidden" x-ref="photo" name="prod_picture" x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                        ">

                                    <label class="block text-gray-700 text-sm font-bold mb-2 text-center dark:text-white" for="photo">
                                        Product picture
                                        <span class="text-red-600"></span>
                                    </label>

                                    <div class="text-center">
                                        <!-- Current Profile Photo -->
                                        <div x-show="!photoPreview"
                                            class="relative flex items-center justify-center overflow-hidden bg-cover bg-center w-80 h-80 m-auto rounded-md shadow-soft-xl">
                                            <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span
                                                class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-stone-100/50 to-slate-200/50 opacity-60"></span>
                                        </div>
                                        <!-- New Profile Photo Preview -->
                                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                                            <span class="block w-80 h-80 rounded-md m-auto shadow bg-center bg-cover"
                                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                            </span>
                                        </div>
                                        <button type="button"
                                            class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-purple-400 focus:shadow-outline-purple active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3"
                                            x-on:click.prevent="$refs.photo.click()">
                                            Upload photo
                                        </button>
                                    </div>
                                </div>

                                <div class="grid gap-2 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="prod_name" class="block text-sm text-gray-700 dark:text-gray-200">Product
                                            name</label>
                                        <input id="prod_name" name="prod_name" placeholder="ex. bag" type="text"
                                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="prod_price" class="block text-sm text-gray-700 dark:text-gray-200">Price</label>
                                        <input id="prod_price" name="prod_price" type="number"
                                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border dark:bg-gray-700 border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="prod_status" class="block text-sm text-gray-700 dark:text-gray-200">Status</label>
                                        <select id="prod_status" name="prod_status"
                                            class="block w-full px-3 py-2 mt-2 text-gray-600 dark:text-gray-200 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                            <option value="" selected>Select status</option>
                                            <option value="Available">Available</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                            <option value="Pre-Order">Pre-Order</option>
                                            <option value="Backordered">Backordered</option>
                                            <option value="Discontinued">Discontinued</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="prod_category"
                                            class="block text-sm text-gray-700 dark:text-gray-200">Category</label>
                                        <select id="prod_category" name="prod_category"
                                            class="block w-full px-3 py-2 mt-2 text-gray-600 dark:text-gray-200 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                            <option value="" selected>Select category</option>
                                            <option value="Apparel">Apparel</option>
                                            <option value="School supplies">School Supplies</option>
                                            <option value="Footwares">Footwares</option>
                                            <option value="Stationery">Stationery</option>
                                            <option value="Electronics">Electronics</option>
                                            <option value="University merchandise">University Merchandise</option>
                                            <option value="Musical instruments">Musical instruments</option>
                                            <option value="Books">Books</option>
                                        </select>
                                    </div>

                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="prod_condition"
                                            class="block text-sm text-gray-700 dark:text-gray-200">Condition</label>
                                        <select id="prod_condition" name="prod_condition"
                                            class="block w-full px-3 py-2 mt-2 text-gray-600 dark:text-gray-200 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                            <option value="" selected>Select condition</option>
                                            <option value="New">New</option>
                                            <option value="Used - like new">Used - Like new</option>
                                            <option value="Used - like good">Used - Like good</option>
                                            <option value="Used - like fair">Used - Like fair</option>
                                        </select>
                                    </div>

                                    <div class="col-span-2">
                                        <label for="prod_description"
                                            class="block text-sm text-gray-700 dark:text-gray-200">Description</label>
                                        <textarea id="prod_description" name="prod_description" type="text"
                                            class="scroll-on w-full resize-none block px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                                            rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="flex justify-end mt-6">
                                    <button type="submit"
                                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-700 rounded-md dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-none">
                                        Add product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sort by -->
            <div @click.away="openSort = false" class="relative">
                <button @click="openSort = !openSort"
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
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
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
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
            <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12 my-4">
                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border h-full">
                    <div class="relative">
                        <a href="{{ route('products.show', $product->id) }}" wire:navigate class="block shadow-lg rounded-2xl">
                            <img src="{{ asset('storage/' . $product->prod_picture) }}" alt="{{ $product->prod_name }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                        </a>
                    </div>
                    <div class="flex-auto px-1 pt-6">
                        <a href="{{ route('products.show', $product->id) }}" wire:navigate>
                            <h5 class="dark:text-white">{{ $product->prod_name }}</h5>
                        </a>
                        <p class="relative leading-normal text-sm text-green-500 dark:text-white dark:opacity-80">
                            {{ $product->prod_status }}
                        </p>
                        <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                            ₱{{ $product->prod_price }}
                        </p>
                        <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{{ $product->prod_description }}</p>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <a href="{{ route('products.show', $product->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                            View product
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="flex items-center justify-center h-full w-full my-auto">
                <p class="text-lg text-gray-700 dark:text-gray-300">No products found.</p>
            </div>
        @endforelse
    </div>
</div>
