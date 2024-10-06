<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
        <svg class="w-5 h-5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16h13M4 16l4-4m-4 4 4 4M20 8H7m13 0-4 4m4-4-4-4"/>
        </svg>
        <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -start-14 top-1/2">Trading</span>
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-auto sm:my-24 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
            >
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 ">Create a trading</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('trades.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
                    @csrf
                    <!-- Photo File Input -->
                    <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                        <input type="file" class="hidden" x-ref="photo" name="trade_picture" x-on:change="
                            photoName = null;
                            photoPreview = null;
                            if ($refs.photo.files.length > 0) {
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                            }
                        ">

                        <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                            Trading picture
                            @error('trade_picture') <span class="text-red-600">{{ $message }}</span> @enderror
                        </label>

                        <div class="text-center">
                            <!-- Current Profile Photo -->
                            <div x-show="!photoPreview" class="relative flex items-center justify-center overflow-hidden bg-cover bg-center w-80 h-80 m-auto rounded-md shadow-soft-xl">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z" clip-rule="evenodd"/>
                                </svg>
                                <span class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-stone-100/50 to-slate-200/50 opacity-60"></span>
                            </div>
                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block w-80 h-80 rounded-md m-auto shadow bg-center bg-cover" x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3" x-on:click.prevent="$refs.photo.click()">
                                Upload photo
                            </button>
                        </div>
                    </div>

                    <div class="grid gap-2 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="trade_title" class="block text-sm text-gray-700">Title</label>
                            <input id="trade_title" name="trade_title" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            @error('trade_title') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="trade_category" class="block text-sm text-gray-700">Category</label>
                            <select id="trade_category" name="trade_category" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                <option selected>Select category</option>
                                <option value="Apparel">Apparel</option>
                                <option value="School supplies">School Supplies</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Stationery">Stationery</option>
                                <option value="University merchandise">University Merchandise</option>
                                <option value="Musical Instruments">Musical Instruments</option>
                                <option value="Books">Books</option>
                            </select>
                            @error('trade_category') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="trade_description" class="block text-sm text-gray-700">Description</label>
                            <textarea id="trade_description" name="trade_description" rows="4" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"></textarea>
                            @error('trade_description') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="trade_status" class="block text-sm text-gray-700">Status</label>
                            <select id="trade_status" name="trade_status" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                <option value="" selected>Select status</option>
                                <option value="Available">Available</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Closed">Closed</option>
                            </select>
                            @error('trade_status') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="trade_type" class="block text-sm text-gray-700">Type</label>
                            <select id="trade_type" name="trade_type" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                <option value="Buy">Buy</option>
                                <option value="Sell">Sell</option>
                                <option value="Exchange">Exchange</option>
                                <option value="Donation">Donation</option>
                                <option value="Rental">Rental</option>
                                <option value="Service offering">Service Offering</option>
                                <option value="Service request">Service Request</option>
                                <option value="Barter">Barter</option>
                            </select>
                            @error('trade_type') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="trade_value" class="block text-sm text-gray-700">Value</label>
                            <input id="trade_value" name="trade_value" type="number" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            @error('trade_value') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="trade_conditions" class="block text-sm text-gray-700">Conditions</label>
                            <textarea id="trade_conditions" name="trade_conditions" rows="4" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"></textarea>
                            @error('trade_conditions') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-2">
                            <label for="trade_duration" class="block text-sm text-gray-700">Duration</label>
                            <input id="trade_duration" name="trade_duration" type="date" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            @error('trade_duration') <span class="text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none">
                            Add trading
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
