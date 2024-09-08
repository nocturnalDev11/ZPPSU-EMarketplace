<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-full border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
        <svg class="w-5 h-5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z" clip-rule="evenodd"/>
        </svg>
        <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -start-14 top-1/2">Post</span>
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
                class="inline-block w-full p-8 my-auto sm:my-24 overflow-hidden text-left transition-all transform bg-white rounded-lg xl:w-2/5 shadow-xl"
            >
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 ">Create a post</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mt-5 flex flex-col items-center xl:flex-row lg:flex-row md:flex-col">
                    @csrf
                    <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 ml-2 sm:col-span-4 ">
                        <input type="file" class="hidden" x-ref="photo" x-on:change="
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
                            Post picture
                            <span class="text-red-600"></span>
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

                    <div class="xl:w-3/5 lg:w-3/5 md:w-full w-full xl:px-12 lg:px-10 md:px-6 px-6 md:mt-0">
                        <div class="grid gap-2 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="post_title" class="block text-sm text-gray-700 dark:text-gray-200">Title</label>
                                <input id="post_title" name="post_title" placeholder="Ex. LF apparel" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            </div>

                            <div class="col-span-2">
                                <label for="post_list_type" class="block text-sm text-gray-700 dark:text-gray-200">Post list type</label>
                                <select id="post_list_type" name="post_list_type" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                    <option selected>Select list type</option>
                                    <option value="Products">Looking for a product</option>
                                    <option value="Services">Looking for a services</option>
                                    <option value="Trades">Looking for trading</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="post_content" class="block text-sm text-gray-700 dark:text-gray-200">Content</label>
                                <textarea id="post_content" name="post_content" type="text" class="scroll-on w-full resize-none block px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-b mt-6">
                            <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-none">
                                Add post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
