<div class="relative w-full flex-shrink-0 bg-white dark:bg-gray-900 dark:text-white sm:w-2/5 lg:w-1/3 border-r-2 dark:border-gray-700">
    <!-- Search contacts section -->
    <div class="relative my-4 max-w-lg mx-5">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
        <input
            type="search"
            placeholder="Search contacts"
            wire:model.live="search"
            autocomplete="off"
            class="w-full bg-gray-100 dark:bg-gray-800 dark:text-white border-none rounded-md pl-10 pr-4 py-2 focus:ring-0 focus:outline-none"
        >
    </div>

    <!-- Contacts -->
    @if(!empty($search))
    <div id="contacts" class="scrollbar-thumb scrollbar-hide h-[95vh] overflow-y-scroll">
        <ul>
            @foreach($users as $userItem)
                <li class="contact flex cursor-pointer items-center py-4 hover:bg-gray-100 dark:hover:bg-gray-800">
                    <a href="{{ route('messages.index', ['id' => $userItem->id]) }}" wire:navigate class="wrap relative mx-auto flex w-full items-center">
                        <img src="{{ $userItem->profile_picture ? asset('storage/' . $userItem->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}" alt="Contact" class="object-cover ml-6 mr-2 h-10 w-10 rounded-full" />
                        <div class="meta hidden sm:block">
                            <p class="name font-semibold">
                                {{ $userItem->first_name }} {{ $userItem->last_name }}
                            </p>
                            <p class="preview text-gray-400">
                                {{ $userItem->latestMessage ? \Illuminate\Support\Str::limit($userItem->latestMessage->content, 50) : 'No messages yet' }} •
                                {{ $userItem->latestMessage ? \Carbon\Carbon::parse($userItem->latestMessage->created_at)->diffForHumans() : '' }}
                            </p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    @else
        <p class="text-center text-gray-500 dark:text-gray-400 mt-4">Start typing to search contacts...</p>
    @endif
</div>
