<div class="relative w-full mx-auto">
    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span>
    <input
        type="search"
        placeholder="Search"
        wire:model.live="query"
        id="search-input"
        name="search"
        class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-gray-400 focus:ring-0 focus:outline-none"
        autocomplete="off"
    >
    @if(count($results) > 0)
        <div class="absolute bg-white shadow-lg rounded-md mt-2 w-full z-10 divide-y-2">
            @foreach($results as $result)
                <a href="{{ $result['url'] }}" wire:navigate class="block px-4 py-3 text-gray-800 hover:bg-gray-100 hover:rounded-md">
                    <div>
                        <div class="font-semibold">{{ $result['title'] }}</div>
                        <div class="text-sm text-gray-600 truncate">{{ $result['description'] }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
