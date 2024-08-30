<div class="relative xl:w-full lg:w-full md:w-fit mx-auto">
    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none">
            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span>
    <input
        type="search"
        placeholder="Search"
        wire:model.live="query"
        id="search-input"
        name="search"
        class="w-full dark:text-gray-400 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-md pl-10 pr-4 py-2 focus:border-gray-300 dark:focus:border-gray-700 focus:ring-0 focus:outline-none"
        autocomplete="off"
    >
    @if(count($results) > 0)
        <div class="absolute bg-white shadow-lg rounded-md mt-2 w-full z-10 divide-y">
            @foreach($results as $result)
                <div class="flex justify-between items-center px-4 py-3 hover:bg-gray-50 hover:rounded-md">
                    <div class="flex items-center gap-3">
                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="{{ $result['url'] }}" wire:navigate class="block text-gray-800">
                            <div class="font-semibold">{{ $result['title'] }}</div>
                            <div class="text-sm text-gray-600 truncate max-w-sm xl:max-w-2xl">{{ $result['description'] }}</div>
                        </a>
                    </div>
                    <button
                        type="button"
                        wire:click.prevent="removeResult({{ $loop->index }})"
                        class="ml-4 text-gray-500 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414L10 8.586z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>
