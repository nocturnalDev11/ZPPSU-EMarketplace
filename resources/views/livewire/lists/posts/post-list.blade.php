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
            <!-- Add post -->
            <div x-data="{ modelOpen: false }">
                <button type="button" @click="modelOpen =!modelOpen"
                    class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-purple-700 hover:bg-primary-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add post
                </button>

                <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                    aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block w-full p-8 my-auto sm:my-24 overflow-hidden text-left transition-all transform bg-white rounded-lg xl:w-2/5 shadow-xl">
                            <div class="flex items-center justify-between space-x-4">
                                <h1 class="text-xl font-medium text-gray-800 ">Create a post</h1>

                                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
                                class="mt-5 flex flex-col items-center xl:flex-row lg:flex-row md:flex-col">
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
                                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3"
                                            x-on:click.prevent="$refs.photo.click()">
                                            Upload photo
                                        </button>
                                    </div>
                                </div>

                                <div class="xl:w-3/5 lg:w-3/5 md:w-full w-full xl:px-12 lg:px-10 md:px-6 px-6 md:mt-0">
                                    <div class="grid gap-2 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="post_title" class="block text-sm text-gray-700 dark:text-gray-200">Title</label>
                                            <input id="post_title" name="post_title" placeholder="Ex. LF apparel" type="text"
                                                class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                        </div>

                                        <div class="col-span-2">
                                            <label for="post_list_type" class="block text-sm text-gray-700 dark:text-gray-200">Post list
                                                type</label>
                                            <select id="post_list_type" name="post_list_type"
                                                class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                                <option selected>Select list type</option>
                                                <option value="Products">Looking for a product</option>
                                                <option value="Services">Looking for a services</option>
                                                <option value="Trades">Looking for trading</option>
                                            </select>
                                        </div>

                                        <div class="col-span-2">
                                            <label for="post_content"
                                                class="block text-sm text-gray-700 dark:text-gray-200">Content</label>
                                            <textarea id="post_content" name="post_content" type="text"
                                                class="scroll-on w-full resize-none block px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40"
                                                rows="4"></textarea>
                                        </div>
                                    </div>

                                    <div class="flex justify-b mt-6">
                                        <button type="submit"
                                            class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-none">
                                            Add post
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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

    <!-- Post List -->
    <div class="flex flex-wrap -mx-3">
        @forelse ($posts as $post)
            <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border h-full">
                    @if ($post->post_picture)
                        <div class="relative">
                            <a class="block shadow-lg rounded-2xl">
                                <img src="{{ asset('storage/' . $post->post_picture) }}" alt="{{ $post->post_title }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                            </a>
                        </div>
                    @else
                        <div class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center h-44 shadow-soft-xl">
                            <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#7e22ce;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#grad3)" fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                        </div>
                    @endif
                    <div class="flex-auto px-1 pt-6">
                        <a href="{{ route('posts.show', $post->id) }}" wire:navigate>
                            <h5 class="dark:text-white">{{ $post->post_title }}</h5>
                        </a>
                        <p class="relative mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                            {{ $post->post_list_type }}
                        </p>
                        <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{!! nl2br(e($post->post_content)) !!}</p>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <a href="{{ route('posts.show', $post->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                            View post
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="flex items-center justify-center w-full">
                <p class="text-lg text-gray-700">No posts found.</p>
            </div>
        @endforelse
    </div>
</div>
