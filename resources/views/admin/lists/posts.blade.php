@extends('admin.layouts.nav')

@section('content')
    <main class="container w-full mx-auto h-screen pt-20 px-10 dark:bg-gray-900">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}" wire:navigate
                        class="inline-flex items-center text-md font-medium text-gray-700 dark:text-gray-100">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-md font-medium text-gray-500 dark:text-gray-300 md:ms-2">All posts</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="grid gap-4 px-4 md:grid-cols-2 xl:grid-cols-4">
            <!-- Total posts -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <div class="px-4 py-3 text-gray-600 dark:text-gray-400">
                    <h3>Total posts</h3>
                </div>
                <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                    <div class="flex items-center justify-between gap-4">
                        <div class="font-medium text-4xl text-gray-800 dark:text-white">
                            <div>{{ $totalPost }}</div>
                        </div>
                        <div class="bg-gradient-to-br from-orange-300 to-orange-500 p-2 rounded-md">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M19 22H5C3.34315 22 2 20.6569 2 19V3C2 1.34315 3.34315 0 5 0H19C20.6569 0 22 1.34315 22 3V19C22 20.6569 20.6569 22 19 22ZM5 2C4.44772 2 4 2.44772 4 3V19C4 19.5523 4.44772 20 5 20H19C19.5523 20 20 19.5523 20 19V3C20 2.44772 19.5523 2 19 2H5ZM6 6H18V8H6V6ZM6 10H18V12H6V10ZM6 14H13V16H6V14Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total of users looking for services -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <div class="px-4 py-3 text-gray-600 dark:text-gray-400">
                    <h3>Total of users looking for services</h3>
                </div>
                <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                    <div class="flex items-center justify-between gap-4">
                        <div class="font-medium text-4xl text-gray-800 dark:text-white">
                            <div>{{ $totalServices }}</div>
                        </div>
                        <div class="bg-gradient-to-br from-pink-500 to-sky-500 p-2 rounded-md">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M19.9381 8H21C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8ZM3 10V14H4V10H3ZM20 10V14H21V10H20ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total of users looking for products -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <div class="px-4 py-3 text-gray-600 dark:text-gray-400">
                    <h3>Total of users looking for products</h3>
                </div>
                <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                    <div class="flex items-center justify-between gap-4">
                        <div class="font-medium text-4xl text-gray-800 dark:text-white">
                            <div>{{ $totalProduct }}</div>
                        </div>
                        <div class="bg-gradient-to-br from-green-400 to-sky-400 p-2 rounded-md">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM6.00436 7.00265V13.0027H17.5163L19.3163 7.00265H6.00436ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total of users looking for tradings -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <div class="px-4 py-3 text-gray-600 dark:text-gray-400">
                    <h3>Total of users looking for tradings</h3>
                </div>
                <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                    <div class="flex items-center justify-between gap-4">
                        <div class="font-medium text-4xl text-gray-800 dark:text-white">
                            <div>{{ $totalTradings }}</div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-500 to-sky-500 p-2 rounded-md">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M16.0503 12.0498L21 16.9996L16.0503 21.9493L14.636 20.5351L17.172 17.9988L4 17.9996V15.9996L17.172 15.9988L14.636 13.464L16.0503 12.0498ZM7.94975 2.0498L9.36396 3.46402L6.828 5.9988L20 5.99955V7.99955L6.828 7.9988L9.36396 10.5351L7.94975 11.9493L3 6.99955L7.94975 2.0498Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('admin.lists.user-post')
    </main>
@endsection
