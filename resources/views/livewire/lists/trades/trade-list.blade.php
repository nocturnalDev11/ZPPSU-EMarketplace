<div x-data="{
    openSort: false,
    openFilter: false,
    openStatus: false,
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
            <!-- Add trade -->
            <button type="button"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-purple-700 hover:bg-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Add trade
            </button>

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
                    Filter by category
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

            <!-- Status -->
            <div @click.away="openStatus = false" class="relative">
                <button @click="openStatus = !openStatus"
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg">
                    Filter by status
                    <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
                <div x-show="openStatus" class="absolute mt-2 w-48 p-3 bg-white shadow rounded z-10">
                    <h6 class="mb-3 text-sm font-medium text-gray-900">
                        Status
                    </h6>
                    <ul class="space-y-2 text-sm">
                        @foreach (['Available', 'Pending', 'In-Progress', 'Completed', 'Cancelled', 'Expired', 'Negotiating', 'Closed'] as $status)
                            <li class="flex items-center">
                                <input type="checkbox" wire:model.live="selectedStatus"
                                    value="{{ $status }}"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                <label for="{{ $status }}" class="ml-2 text-sm font-medium text-gray-900">
                                    {{ $status }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap -mx-3">
        @forelse ($trades as $trade)
            <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border h-full">
                    @if ($trade->trade_picture)
                        <div class="relative">
                            <a class="block shadow-lg rounded-2xl">
                                <img src="{{ asset('storage/' . $trade->trade_picture) }}" alt="{{ $trade->trade_title }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                            </a>
                        </div>
                    @else
                        <div class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center h-44 shadow-soft-xl">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="grad4" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#4ade80;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#2563eb;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#grad4)" d="m13,2C13,.895,13.895,0,14.999,0l4.001-.002c1.105,0,2.001.895,2.001,2v2.005c0,1.104-.894,1.999-1.998,2l-2.498.002-2.288,1.87c-.526.336-1.215-.041-1.215-.665l-.002-5.209Zm-2,0C11,.895,10.105,0,9.001,0l-4.001-.002c-1.105,0-2.001.895-2.001,2v2.005c0,1.104.894,1.999,1.998,2l2.498.002,2.288,1.87c.526.336,1.215-.041,1.215-.665l.002-5.209Zm12,9.003c.552,0,1,.448,1,1v7c0,.552-.448,1-1,1h-2.814l-7.188-6.436-2.309,2.142c-.207.208-.493.315-.788.29-.298-.024-.56-.175-.739-.425-.274-.38-.19-.975.181-1.347l3.369-3.302c.667-.627,1.397-.923,2.288-.923.662,0,1.65.297,2.403.594.69.273,1.424.406,2.166.406h3.431Zm-9.993,5.255l4.778,4.279-3.381,2.639c-.687.536-1.533.827-2.404.827h0c-.871,0-1.717-.291-2.404-.827l-2.98-2.326c-.703-.549-1.569-.847-2.461-.847H1c-.552,0-1-.448-1-1v-7c0-.552.448-1,1-1h3.521c.768,0,1.525-.149,2.238-.434s1.578-.566,2.218-.566c.526,0,1.025.126,1.482.34l-2.533,2.473c-1.066,1.068-1.232,2.759-.389,3.926.52.724,1.321,1.179,2.192,1.25.086.008.173.012.259.012.792,0,1.549-.312,2.084-.85l.935-.895Z"/>
                            </svg>
                            <span class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                        </div>
                    @endif
                    <div class="flex-auto px-1 pt-6">
                        <a href="{{ route('trades.show', $trade->id) }}" wire:navigate>
                            <h5 class="dark:text-white">{{ $trade->trade_title }}</h5>
                        </a>
                        <p class="relative mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                            {{ $trade->trade_status }}
                        </p>
                        <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{!! nl2br(e($trade->trade_description)) !!}</p>
                    </div>
                    <div class="flex items-center justify-between mt-auto">
                        <a href="{{ route('trades.show', $trade->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                            View trading
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="flex items-center justify-center w-full">
                <p class="text-lg text-gray-700">No tradings found.</p>
            </div>
        @endforelse
    </div>
</div>
