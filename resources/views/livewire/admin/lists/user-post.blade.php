<div x-data="{
    openSort: false,
    openFilter: false,
    selectedTypes: @entangle('selectedTypes'),
    sortBy: @entangle('sortBy'),
    search: @entangle('search')
}">
    {{-- <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
        <!-- Search -->
        <div class="relative w-full md:w-1/2">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                    viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <input type="search" wire:model.live="search" placeholder="Search" autocomplete="off"
                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-400"
                placeholder="Search" required="">
        </div>

        <!-- Actions -->
        <div
            class="flex items-center justify-end w-full md:w-auto md:flex-row md:space-y-0 xl:gap-0 gap-2 md:items-center md:space-x-3">

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
                <div x-show="openFilter" class="absolute mt-2 w-48 p-3 bg-white shadow rounded z-10">
                    <h6 class="mb-3 text-sm font-medium text-gray-900">
                        List type
                    </h6>
                    <ul class="space-y-2 text-sm">
                        @foreach (['Products', 'Services', 'Trades'] as $post_list_type)
                        <li class="flex items-center">
                            <input type="checkbox" wire:model.live="selectedTypes" value="{{ $post_list_type }}"
                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                            <label for="{{ $post_list_type }}" class="ml-2 text-sm font-medium text-gray-900">
                                {{ $post_list_type }}
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
        <div class="w-full max-w-full px-7 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
            <div
                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border h-full">
                @if ($post->post_picture)
                <div class="relative">
                    <a class="block shadow-lg rounded-2xl">
                        <img src="{{ asset('storage/' . $post->post_picture) }}" alt="{{ $post->post_title }}"
                            class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                    </a>
                </div>
                @else
                <div
                    class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center h-44 shadow-soft-xl">
                    <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <defs>
                            <linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#7e22ce;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path fill="url(#grad3)" fill-rule="evenodd"
                            d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span
                        class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                </div>
                @endif
                <div class="flex-auto px-1 pt-6">
                    <a href="{{ route('posts.show', $post->id) }}" wire:navigate>
                        <h5 class="dark:text-white">{{ $post->post_title }}</h5>
                    </a>
                    <p
                        class="relative mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                        {{ $post->post_list_type }}
                    </p>
                    <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{!!
                        nl2br(e($post->post_content)) !!}</p>
                </div>
                <div class="flex items-center justify-between mt-auto">
                    <a href="{{ route('posts.show', $post->id) }}" wire:navigate
                        class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                        View post
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="flex items-center justify-center w-full">
            <p class="text-lg text-gray-700 dark:text-gray-300">No posts found.</p>
        </div>
        @endforelse
    </div> --}}
    <div class="mx-4 my-6 gap-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0 w-full">
                <!-- Search -->
                <div class="relative w-full md:w-1/2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="search" wire:model.live="search" placeholder="Search" autocomplete="off"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-400"
                        placeholder="Search" required="">
                </div>
            </div>

            <div class="justify-end items-center sm:flex gap-2 w-full">
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
                    <div x-show="openFilter" class="absolute mt-2 w-48 p-3 bg-white shadow rounded z-10">
                        <h6 class="mb-3 text-sm font-medium text-gray-900">
                            List type
                        </h6>
                        <ul class="space-y-2 text-sm">
                            @foreach (['Products', 'Services', 'Trades'] as $post_list_type)
                            <li class="flex items-center">
                                <input type="checkbox" wire:model.live="selectedTypes" value="{{ $post_list_type }}"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                <label for="{{ $post_list_type }}" class="ml-2 text-sm font-medium text-gray-900">
                                    {{ $post_list_type }}
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
                                        Post
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        List type
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Content
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
                                @forelse ($posts as $post)
                                <tr>
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center gap-4">
                                            @if ($post->post_picture)
                                            <img class="w-10 h-10 rounded-xl object-cover bg-center"
                                                src="{{ asset('storage/' . $post->post_picture) }}"
                                                alt="{{ $post->post_title }}">
                                            @else
                                            <div
                                                class="relative inline-flex items-center justify-center rounded-xl overflow-hidden bg-gray-200 dark:bg-gray-600 w-10 h-10">
                                                <svg class="p-2 text-md text-gray-700 dark:text-gray-300"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor">
                                                    <path
                                                        d="M19 22H5C3.34315 22 2 20.6569 2 19V3C2 1.34315 3.34315 0 5 0H19C20.6569 0 22 1.34315 22 3V19C22 20.6569 20.6569 22 19 22ZM5 2C4.44772 2 4 2.44772 4 3V19C4 19.5523 4.44772 20 5 20H19C19.5523 20 20 19.5523 20 19V3C20 2.44772 19.5523 2 19 2H5ZM6 6H18V8H6V6ZM6 10H18V12H6V10ZM6 14H13V16H6V14Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            @endif
                                            <div class="font-medium dark:text-white">
                                                <div>{{ $post->post_title }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $post->post_list_type }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $post->post_content }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $post->created_at->format('F j, Y') }}
                                    </td>
                                    <td class="flex items-center p-4 whitespace-nowrap">
                                        <button class="text-yellow-400 text-xs font-medium mr-2 dark:text-yellow-300">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                </path>
                                            </svg>
                                        </button>

                                        <button class="text-red-600 text-xs font-medium mr-2 dark:text-red-400">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-lg text-gray-700 dark:text-gray-300">
                                        No post found.
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
