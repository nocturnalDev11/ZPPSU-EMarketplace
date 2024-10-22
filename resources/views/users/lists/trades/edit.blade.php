<div x-data="{ modelOpen: false }" class="inline-flex">
    <button @click="modelOpen = !modelOpen"
        class="w-[200px] px-3 py-2 text-xs font-medium text-center inline-flex items-center justify-center text-gray-700 dark:text-white bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-0 dark:bg-gray-600 dark:hover:bg-gray-700">
        <svg class="w-3 h-3 text-gray-700 dark:text-white me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
            fill="currentColor">
            <path
                d="M7.24264 17.9967H3V13.754L14.435 2.319C14.8256 1.92848 15.4587 1.92848 15.8492 2.319L18.6777 5.14743C19.0682 5.53795 19.0682 6.17112 18.6777 6.56164L7.24264 17.9967ZM3 19.9967H21V21.9967H3V19.9967Z">
            </path>
        </svg>
        Edit trading
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-[700] overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div x-show="modelOpen" class="fixed inset-0 z-[500] flex items-center justify-center" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">
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
                class="inline-block p-5 overflow-hidden text-left transition-all transform bg-white rounded-lg max-w-full sm:max-w-5xl shadow-xl">

                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 dark:text-white">Add a trading</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('trades.update', $trade->id) }}" method="POST"
                    class="mt-5 flex flex-col items-center justify-center xl:flex-row lg:flex-row md:flex-col"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                            @if($trade->trade_picture)
                                <div x-show="!photoPreview"
                                    class="relative flex items-center justify-center overflow-hidden bg-cover bg-center w-80 h-80 m-auto rounded-md shadow-soft-xl">
                                    <img src="{{ asset('storage/' . $trade->trade_picture) }}"
                                        class="justify-center object-cover w-64 h-64 rounded-lg cursor-pointer" alt="Trading">
                                </div>
                            @else
                                <div x-show="!photoPreview"
                                    class="relative flex items-center justify-center overflow-hidden bg-cover bg-center w-64 h-64 m-auto rounded-md shadow-soft-xl">
                                    <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M13 10a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H14a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12c0 .556-.227 1.06-.593 1.422A.999.999 0 0 1 20.5 20H4a2.002 2.002 0 0 1-2-2V6Zm6.892 12 3.833-5.356-3.99-4.322a1 1 0 0 0-1.549.097L4 12.879V6h16v9.95l-3.257-3.619a1 1 0 0 0-1.557.088L11.2 18H8.892Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span
                                        class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-stone-100/50 to-slate-200/50 opacity-60"></span>
                                </div>
                            @endif
                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block w-64 h-64 rounded-md m-auto shadow bg-center bg-cover"
                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button type="button"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3"
                                x-on:click.prevent="$refs.photo.click()">
                                Upload photo
                            </button>
                        </div>
                    </div>

                    <div class="xl:w-3/5 lg:w-3/5 md:w-full w-full xl:px-12 lg:px-10 md:px-6 px-6 md:mt-0">
                        <div class="grid gap-2 mb-4 grid-cols-3">
                            <div class="col-span-3">
                                <label for="trade_title" class="block text-sm text-gray-700">Title</label>
                                <input id="trade_title" name="trade_title" type="text"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                                    value="{{ old('trade_title', $trade->trade_title) }}"
                                >
                                @error('trade_title') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-3">
                                <label for="trade_category" class="block text-sm text-gray-700">Category</label>
                                <select id="trade_category" name="trade_category"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option value="Apparel" {{ $trade->trade_category == 'Apparel' ? 'selected' : '' }}>Apparel</option>
                                    <option value="School supplies" {{ $trade->trade_category == 'School supplies' ? 'selected' : '' }}>School Supplies</option>
                                    <option value="Stationery" {{ $trade->trade_category == 'Stationery' ? 'selected' : '' }}>Stationery</option>
                                    <option value="Electronics" {{ $trade->trade_category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="University merchandise" {{ $trade->trade_category == 'University merchandise' ? 'selected' : ''}}>University Merchandise</option>
                                    <option value="Musical Instruments" {{ $trade->trade_category == 'Musical Instruments' ? 'selected' : ''}}>Musical Instruments</option>
                                    <option value="Books" {{ $trade->trade_category == 'Books' ? 'selected' : ''}}>Books</option>
                                </select>
                                @error('trade_category') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-3">
                                <label for="trade_description" class="block text-sm text-gray-700">Description</label>
                                <textarea id="trade_description" name="trade_description" rows="4"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                                    >{{ old('trade_description', $trade->trade_description) }}</textarea>
                                @error('trade_description') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <label for="trade_status" class="block text-sm text-gray-700">Status</label>
                                <select id="trade_status" name="trade_status"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option value="Available" {{ $trade->trade_status == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Completed" {{ $trade->trade_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="Cancelled" {{ $trade->trade_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="Closed" {{ $trade->trade_status == 'Closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                                @error('trade_status') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <label for="trade_type" class="block text-sm text-gray-700">Type</label>
                                <select id="trade_type" name="trade_type"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option value="Buy" {{ $trade->trade_type == 'Buy' ? 'selected' : '' }}>Buy</option>
                                    <option value="Sell" {{ $trade->trade_type == 'Sell' ? 'selected' : '' }}>Sell</option>
                                    <option value="Exchange" {{ $trade->trade_type == 'Exchange' ? 'selected' : '' }}>Exchange</option>
                                    <option value="Donation" {{ $trade->trade_type == 'Donation' ? 'selected' : '' }}>Donation</option>
                                    <option value="Rental" {{ $trade->trade_type == 'Rental' ? 'selected' : '' }}>Rental</option>
                                    <option value="Service offering" {{ $trade->trade_type == 'Service offering' ? 'selected' : '' }}>Service Offering</option>
                                    <option value="Service request" {{ $trade->trade_type == 'Service request' ? 'selected' : '' }}>Service Request</option>
                                    <option value="Barter" {{ $trade->trade_type == 'Barter' ? 'selected' : '' }}>Barter</option>
                                </select>
                                @error('trade_type') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-3 sm:col-span-1">
                                <label for="trade_value" class="block text-sm text-gray-700">Value</label>
                                <input id="trade_value" name="trade_value" type="number"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                                    value="{{ old('trade_value', $trade->trade_value) }}"
                                >
                                @error('trade_value') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-3">
                                <label for="trade_conditions" class="block text-sm text-gray-700">Conditions</label>
                                <textarea id="trade_conditions" name="trade_conditions" rows="4"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">{{ old('trade_conditions', $trade->trade_conditions) }}</textarea>
                                @error('trade_conditions') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-span-3">
                                <label for="trade_duration" class="block text-sm text-gray-700">Duration</label>
                                <input id="trade_duration" name="trade_duration" type="date"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                                    value="{{ old('trade_duration', $trade->trade_duration) }}"
                                >
                                @error('trade_duration') <span class="text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-700 rounded-md dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-none">
                                Add trading
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
