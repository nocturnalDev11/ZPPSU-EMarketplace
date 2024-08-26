<div class="relative">
    <button
        type="button"
        wire:click="toggleDropdown"
        class="items-center p-2 justify-center text-gray-500 ms-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-500 focus:outline-none">
        <span class="sr-only">Open user menu</span>
        <img class="w-9 h-9 rounded-full object-cover" src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}" alt="user photo"/>
    </button>

    @if($isOpen)
        <div class="absolute z-50 my-4 w-72 p-3 text-base list-none bg-gray-100 divide-y divide-gray-300 shadow rounded-xl dark:bg-gray-800 dark:divide-gray-600">
            <div class="py-3 px-4 cursor-pointer">
                <span class="block text-lg font-medium text-gray-700 dark:text-gray-200">
                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                </span>
                <span class="block text-md text-gray-700 dark:text-gray-200 truncate">
                    {{ auth()->user()->university_id }}
                </span>
            </div>
            <ul class="py-1 text-gray-700 dark:text-gray-200">
                <li>
                    <a href="{{ route('user.profile') }}" wire:navigate class="flex items-center py-2 px-4 text-md hover:bg-gray-200 dark:hover:bg-gray-700">
                        My profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.settings') }}" wire:navigate class="flex items-center py-2 px-4 text-md hover:bg-gray-200 dark:hover:bg-gray-700">
                        Account settings
                    </a>
                </li>
            </ul>
            <ul class="py-1 text-gray-700 dark:text-gray-200">
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block py-2 px-4 text-md hover:text-red-500 ">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    @endif
</div>
