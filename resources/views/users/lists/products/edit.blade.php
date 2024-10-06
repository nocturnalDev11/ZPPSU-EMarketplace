<div x-data="{ modelOpen: false }" class="inline-flex">
    <button @click="modelOpen = !modelOpen"
        class="w-[200px] px-3 py-2 text-xs font-medium text-center inline-flex items-center justify-center text-gray-700 dark:text-white bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-0 dark:bg-gray-600 dark:hover:bg-gray-700">
        <svg class="w-3 h-3 text-gray-700 dark:text-white me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            fill="currentColor">
            <path
                d="M7.24264 17.9967H3V13.754L14.435 2.319C14.8256 1.92848 15.4587 1.92848 15.8492 2.319L18.6777 5.14743C19.0682 5.53795 19.0682 6.17112 18.6777 6.56164L7.24264 17.9967ZM3 19.9967H21V21.9967H3V19.9967Z">
            </path>
        </svg>
        Edit product
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-[500] flex items-center justify-center" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 z-100 bg-opacity-40 backdrop:filter backdrop-blur-md dark:bg-gray-700 dark:bg-opacity-60 dark:backdrop:filter dark:backdrop-blur-md"
            aria-hidden="true">
        </div>

        <div x-cloak x-show="modelOpen"
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block p-5 overflow-hidden text-left transition-all transform bg-white rounded-lg max-w-xl 2xl:max-w-5xl shadow-xl">

                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 dark:text-white">Edit a product</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-5 flex flex-col items-center justify-center xl:flex-row lg:flex-row md:flex-col" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Photo File Input -->
                    <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 ml-2 sm:col-span-4">
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
                                class="relative flex items-center justify-center overflow-hidden bg-cover bg-center m-auto rounded-md shadow-soft-xl">
                                <img src="{{ asset('storage/' . $product->prod_picture) }}"
                                    class="justify-center object-cover w-64 h-64 rounded-lg cursor-pointer" alt="Product">
                            </div>
                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block w-64 h-64 rounded-md m-auto shadow bg-center bg-cover"
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

                    <div class="xl:w-3/5 lg:w-3/5 md:w-full w-full xl:px-12 lg:px-10 md:px-6 px-6 md:mt-0">
                        <div class="grid gap-2 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="prod_name" class="block text-sm text-gray-700 dark:text-gray-200">
                                    Product name
                                </label>
                                <input
                                    id="prod_name"
                                    name="prod_name"
                                    placeholder="ex. bag"
                                    type="text"
                                    value="{{ old('prod_name', $product->prod_name) }}"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="prod_price" class="block text-sm text-gray-700 dark:text-gray-200">Price</label>
                                <input
                                    id="prod_price"
                                    name="prod_price"
                                    type="number"
                                    value="{{ old('prod_price', $product->prod_price) }}"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border dark:bg-gray-700 border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="prod_status" class="block text-sm text-gray-700 dark:text-gray-200">Status</label>
                                <select id="prod_status" name="prod_status"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 dark:text-gray-200 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option value="Available" {{ $product->prod_status == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Out of Stock" {{ $product->prod_status == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                                    <option value="Closed" {{ $product->prod_status == 'Closed' ? 'selected' : ''}}>Closed</option>
                                </select>
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="prod_category"
                                    class="block text-sm text-gray-700 dark:text-gray-200">Category</label>
                                <select id="prod_category" name="prod_category"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 dark:text-gray-200 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option value="Apparel" {{ $product->prod_category == 'Apparel' ? 'selected' : '' }}>Apparel</option>
                                    <option value="School supplies" {{ $product->prod_category == 'School supplies' ? 'selected' : '' }}>School Supplies</option>
                                    <option value="Footwares" {{ $product->prod_category == 'Footwares' ? 'selected' : '' }}>Footwares</option>
                                    <option value="Stationery" {{ $product->prod_category == 'Stationery' ? 'selected' : '' }}>Stationery</option>
                                    <option value="Electronics" {{ $product->prod_category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="University merchandise" {{ $product->prod_category == 'University merchandise' ? 'selected' : '' }}>University Merchandise</option>
                                    <option value="Musical instruments" {{ $product->prod_category == 'Musical instruments' ? 'selected' : '' }}>Musical instruments</option>
                                    <option value="Books" {{ $product->prod_category == 'Books' ? 'selected' : '' }}>Books</option>
                                </select>
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="prod_condition" class="block text-sm text-gray-700 dark:text-gray-200">Condition</label>
                                <select id="prod_condition" name="prod_condition"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 dark:text-gray-200 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option value="New" {{ $product->prod_condition == 'New' ? 'selected' : '' }}>New</option>
                                    <option value="Used - like new" {{ $product->prod_condition == 'Used - like new' ? 'selected' : '' }}>Used - Like new</option>
                                    <option value="Used - like good" {{ $product->prod_condition == 'Used - like good' ? 'selected' : '' }}>Used - Like good</option>
                                    <option value="Used - like fair" {{ $product->prod_condition == 'Used - like fair' ? 'selected' : '' }}>Used - Like fair</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="prod_description"
                                    class="block text-sm text-gray-700 dark:text-gray-200">Description</label>
                                <textarea id="prod_description" name="prod_description" type="text" class="scroll-on w-full resize-none block px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" rows="4">{{ old('prod_description', $product->prod_description) }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-700 rounded-md dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-none">
                                Update product
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
