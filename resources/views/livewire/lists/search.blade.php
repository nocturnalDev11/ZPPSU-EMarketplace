<div
    class="bg-gray-100 backdrop-filter backdrop-blur-lg bg-opacity-60 dark:bg-gray-800 dark:backdrop:filter dark:backdrop-blur-4xl dark:bg-opacity-40 flex max-md:order-1 px-4 rounded-sm h-11 lg:w-2/4 max-md:w-full mx-auto my-2 relative">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
        class="fill-gray-400 mr-4 rotate-90">
        <path
            d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
        </path>
    </svg>
    <input type="search" placeholder="Search..." wire:model.live="query" id="search-input" name="search"
        autocomplete="off"
        class="w-full text-gray-600 dark:text-gray-200 border-none outline-none focus:outline-none focus:ring-0 focus:border-transparent bg-transparent" />

    @if(count($results) > 0)
    <div class="absolute bg-white shadow-lg rounded-md mt-12 w-[96%] z-10 dark:bg-gray-900">
        @foreach($results as $result)
        <div
            class="flex justify-between items-center px-4 py-3 hover:rounded-md hover:bg-gray-50 hover:dark:bg-gray-700">
            <div class="flex items-center gap-3">
                <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a href="{{ $result['url'] }}" wire:navigate class="block text-gray-800 dark:text-white">
                    <div class="font-semibold">{{ $result['title'] }}</div>
                    <div class="text-sm text-gray-600 truncate max-w-sm xl:max-w-2xl dark:text-gray-300">{{
                        $result['description'] }}</div>
                </a>
            </div>
            <button type="button" wire:click.prevent="removeResult({{ $loop->index }})"
                class="ml-4 text-gray-500 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414L10 8.586z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        @endforeach
    </div>
    @endif
</div>
