<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
        <svg class="w-5 h-5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 2a7 7 0 0 0-7 7 3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V9a5 5 0 1 1 10 0v7.083A2.919 2.919 0 0 1 14.083 19H14a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a2 2 0 0 0 1.732-1h.351a4.917 4.917 0 0 0 4.83-4H19a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3 7 7 0 0 0-7-7Zm1.45 3.275a4 4 0 0 0-4.352.976 1 1 0 0 0 1.452 1.376 2.001 2.001 0 0 1 2.836-.067 1 1 0 1 0 1.386-1.442 4 4 0 0 0-1.321-.843Z" clip-rule="evenodd"/>
        </svg>
        <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -start-14 top-1/2">Service</span>
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-[700] overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div x-show="modelOpen" class="fixed inset-0 z-[700] flex items-center justify-center" aria-labelledby="modal-title"
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

                <form action="{{ route('service.store') }}" method="POST" class="mt-5 flex flex-col items-center justify-center xl:flex-row lg:flex-row md:flex-col" enctype="multipart/form-data">
                    @csrf
                    <!-- Photo File Input -->
                    <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                        <input type="file" class="hidden" x-ref="photo" name="services_picture" x-on:change="
                                                photoName = $refs.photo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photo.files[0]);
                                            ">

                        <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
                            Service picture
                            <span class="text-red-600"></span>
                        </label>

                        <div class="text-center">
                            <!-- Current Profile Photo -->
                            <div x-show="!photoPreview"
                                class="relative flex items-center justify-center overflow-hidden bg-cover bg-center w-80 h-80 m-auto rounded-md shadow-soft-xl">
                                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3"
                                x-on:click.prevent="$refs.photo.click()">
                                Upload photo
                            </button>
                        </div>
                    </div>

                    <div class="xl:w-3/5 lg:w-3/5 md:w-full w-full xl:px-12 lg:px-10 md:px-6 px-6 md:mt-0">
                        <div class="grid gap-2 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="services_title" class="block text-sm text-gray-700 dark:text-gray-200">Title</label>
                                <input id="services_title" name="services_title" placeholder="ex. Offering tutorial" type="text"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="services_status" class="block text-sm text-gray-700 dark:text-gray-200">Status</label>
                                <select id="services_status" name="services_status"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 dark:text-gray-200 placeholder-gray-400 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option value="" selected>Select status</option>
                                    <option value="Available">Available</option>
                                    <option value="Discontinued">Discontinued</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="services_fee" class="block text-sm text-gray-700 dark:text-gray-200">Service fee</label>
                                <input id="services_fee" name="services_fee" type="number"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            </div>

                            <div class="col-span-2">
                                <label for="services_category" class="block text-sm text-gray-700 dark:text-gray-200">Category</label>
                                <select id="services_category" name="services_category"
                                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option value="" selected>Select category</option>
                                    <option value="Tutoring services">Tutoring services</option>
                                    <option value="Video editing">Video editing</option>
                                    <option value="Photo editing">Photo editing</option>
                                    <option value="Videography">Videography</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Writing">Writing</option>
                                    <option value="Coding services">Coding services</option>
                                    <option value="Drawing">Drawing</option>
                                    <option value="Painting">Painting</option>
                                    <option value="Catering">Catering</option>
                                    <option value="Troubleshooting">Troubleshooting</option>
                                    <option value="Vehicle repair">Repair services</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="services_description" class="block text-sm text-gray-700 dark:text-gray-200">Description</label>
                                <textarea id="services_description" name="services_description" type="text"
                                    class="scroll-on w-full resize-none block px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                                    rows="4"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-700 rounded-md dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-none">
                                Add service
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
