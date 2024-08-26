<aside class="xl:hidden lg:hidden md:block sm:block fixed top-0 left-0 z-40 w-3/5 h-screen transition-transform transform -translate-x-full md:translate-x-0" aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-gray-50 mb-8 pt-20">
        <p class="text-3xl mx-5">Messages</p>
        <!-- Lists tab -->
        <ul class="grid grid-row w-full my-3 gap-3">
            @foreach($users as $userItem)
                <li class="flex flex-row py-4 my-2 items-center justify-between rounded-lg hover:bg-gray-200">
                    <a href="{{ route('messages.index', ['id' => $userItem->id]) }}" class="flex flex-row cursor-pointer px-4">
                        <img src="https://picsum.photos/200" class="object-cover h-12 w-12 rounded-full" alt=""/>
                        <div class="flex flex-col ml-5">
                            <span class="text-2xl font-semibold">{{ $userItem->first_name }} {{ $userItem->last_name }}</span>
                            @if ($userItem->latestMessage)
                                <span class="text-gray-500">{{ $userItem->latestMessage->content }}</span>
                            @endif
                        </div>
                    </a>
                    <button id="dropdownMenuIconButton" data-dropdown-toggle="user-{{ $userItem->id }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 rounded-lg mr-3 hover:bg-gray-300 focus:ring-2 focus:outline-none focus:ring-gray-300" type="button">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                            <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="user-{{ $userItem->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated link</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
