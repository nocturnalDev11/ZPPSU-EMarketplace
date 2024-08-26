<aside id="sidebar" class="fixed top-0 left-0 z-30 w-80 h-screen pt-16 transition-transform transform translate-x-0 bg-white dark:bg-gray-900 aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-50 dark:bg-gray-900">
        <ul class="space-y-2 pt-4">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-5 text-gray-900 text-2xl rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="ri-dashboard-fill flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-5 text-gray-900 text-2xl rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="ri-group-2-fill flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                </a>
            </li>
            <li>
                <button type="button" class="flex items-center w-full py-3 px-5 text-2xl text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i class="ri-list-check-2 flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Lists</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full text-2xl p-3 text-gray-900 transition duration-75 rounded-lg pl-14 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full text-2xl p-3 text-gray-900 transition duration-75 rounded-lg pl-14 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full text-2xl p-3 text-gray-900 transition duration-75 rounded-lg pl-14 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Posts</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full text-2xl p-3 text-gray-900 transition duration-75 rounded-lg pl-14 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tradings</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-5 text-gray-900 text-2xl rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="ri-inbox-fill flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center py-3 px-5 text-gray-900 text-2xl rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="ri-notification-3-fill flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Notifications</span>
                    <span class="inline-flex items-center justify-center w-fit h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                        100+
                    </span>
                </a>
            </li>
        </ul>
    </div>
 </aside>
