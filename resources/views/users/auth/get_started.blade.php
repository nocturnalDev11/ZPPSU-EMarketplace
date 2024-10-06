<div
    x-data="{ show: false }"
    x-init="
    @if(session('error'))
        show = true;
        setTimeout(() => show = false, 3000);
    @endif
">
    <form action="{{ route('send.credentials') }}" method="POST" class="w-full mx-auto">
        @csrf
        <label for="email" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Get started</label>
        <div class="flex items-center relative">
            <input type="email" id="email" name="email"
                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:ring-0 focus:border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-none dark:focus:border-gray-500"
                placeholder="Enter your registered email address" required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-gradient-to-br from-red-700 to-orange-400 hover:bg-gradient-to-bl focus:ring-0 focus:outline-none focus:ring-none font-medium rounded-lg text-sm px-4 py-2">
                Get started
            </button>
        </div>
    </form>

    @if(session('error'))
        <div x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="fixed z-[700] top-4 left-1/2 transform -translate-x-1/2 max-w-xs bg-red-50 border-l-4 border-red-300 rounded-xl drop-shadow-xl dark:bg-gray-800 dark:border-red-500">
            <div class="flex p-4">
                @if(session('error'))
                    <div class="shrink-0 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor"
                            class="shrink-0 w-7 h-7 text-red-500 p-1 bg-red-100 backdrop-blur-xl rounded-full dark:bg-red-200/20">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="alert alert-danger text-sm text-red-800 dark:text-red-400">
                            {{ session('error') }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
