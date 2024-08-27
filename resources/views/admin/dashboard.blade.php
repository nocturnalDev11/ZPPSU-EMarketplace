@extends('admin.layouts.dashboard-nav')

@include('admin.layouts.side-nav')
@section('content')
<div id="main-content" class="flex overflow-hidden bg-gray-50 dark:bg-gray-900 transition-all ml-80 h-full">
    <div class="relative w-full overflow-y-auto pt-24">
        <main>
            <!-- Users -->
            <div class="grid gap-4 px-4 md:grid-cols-2 xl:grid-cols-4">
                <!-- Total Users -->
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                    <div class="px-4 text-gray-600 dark:text-gray-400">
                        <h3>Total users</h3>
                    </div>
                    <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div class="font-medium text-4xl text-gray-800 dark:text-white">
                                <div>{{ $totalUsers }}</div>
                            </div>
                            <div class="bg-gradient-to-br from-orange-300 to-orange-500 p-2 rounded-md">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 dark:text-gray-400">
                        <a href="{{ route('admin.users.list') }}" wire:navigate class="hover:underline">View all</a>
                    </div>
                </div>

                <!-- Total Students -->
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                    <div class="px-4 text-gray-600 dark:text-gray-400">
                        <h3>Total students</h3>
                    </div>
                    <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div class="font-medium text-4xl text-gray-800 dark:text-white">
                                <div>{{ $totalStudents }}</div>
                            </div>
                            <div class="bg-gradient-to-br from-pink-500 to-sky-500 p-2 rounded-md">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Faculties -->
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                    <div class="px-4 text-gray-600 dark:text-gray-400">
                        <h3>Total faculties</h3>
                    </div>
                    <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div class="font-medium text-4xl text-gray-800 dark:text-white">
                                <div>{{ $totalFaculties }}</div>
                            </div>
                            <div class="bg-gradient-to-br from-green-400 to-sky-400 p-2 rounded-md">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Staff -->
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                    <div class="px-4 text-gray-600 dark:text-gray-400">
                        <h3>Total staff</h3>
                    </div>
                    <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div class="font-medium text-4xl text-gray-800 dark:text-white">
                                <div>{{ $totalStaff }}</div>
                            </div>
                            <div class="bg-gradient-to-br from-purple-500 to-sky-500 p-2 rounded-md">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lists -->
            <div class="grid gap-4 px-4 pt-6 md:grid-cols-2 xl:grid-cols-4">
                <!-- Total Products -->
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                    <div class="px-4 text-gray-600 dark:text-gray-400 rounded dark:border-gray-600">
                        <h3>Total products</h3>
                    </div>
                    <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div class="font-medium text-4xl text-gray-800 dark:text-white">
                                <div>{{ $totalProducts }}</div>
                            </div>
                            <div class="bg-gradient-to-br from-teal-400 to-green-500 p-2 rounded-md">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM6.00436 7.00265V13.0027H17.5163L19.3163 7.00265H6.00436ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 text-gray-800 dark:text-gray-400 dark:border-gray-600">
                        <h3>View all</h3>
                    </div>
                </div>
                <!-- Total Services -->
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                    <div class="px-4 text-gray-600 dark:text-gray-400 rounded dark:border-gray-600">
                        <h3>Total services</h3>
                    </div>
                    <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div class="font-medium text-4xl text-gray-800 dark:text-white">
                                <div>{{ $totalServices }}</div>
                            </div>
                            <div class="bg-gradient-to-br from-pink-300 to-orange-400 p-2 rounded-md">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19.9381 8H21C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8ZM3 10V14H4V10H3ZM20 10V14H21V10H20ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 text-gray-800 dark:text-gray-400 dark:border-gray-600">
                        <h3>View all</h3>
                    </div>
                </div>
                <!-- Total Posts -->
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                    <div class="px-4 text-gray-600 dark:text-gray-400 rounded dark:border-gray-600">
                        <h3>Total posts</h3>
                    </div>
                    <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div class="font-medium text-4xl text-gray-800 dark:text-white">
                                <div>{{ $totalPosts }}</div>
                            </div>
                            <div class="bg-gradient-to-br from-sky-300 to-purple-400 p-2 rounded-md">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 22H5C3.34315 22 2 20.6569 2 19V3C2 1.34315 3.34315 0 5 0H19C20.6569 0 22 1.34315 22 3V19C22 20.6569 20.6569 22 19 22ZM5 2C4.44772 2 4 2.44772 4 3V19C4 19.5523 4.44772 20 5 20H19C19.5523 20 20 19.5523 20 19V3C20 2.44772 19.5523 2 19 2H5ZM6 6H18V8H6V6ZM6 10H18V12H6V10ZM6 14H13V16H6V14Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 text-gray-800 dark:text-gray-400 dark:border-gray-600">
                        <h3>View all</h3>
                    </div>
                </div>
                <!-- Total Trades -->
                <div class="p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                    <div class="px-4 text-gray-600 dark:text-gray-400 rounded dark:border-gray-600">
                        <h3>Total trades</h3>
                    </div>
                    <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                        <div class="flex items-center justify-between gap-4">
                            <div class="font-medium text-4xl text-gray-800 dark:text-white">
                                <div>{{ $totalTrades }}</div>
                            </div>
                            <div class="bg-gradient-to-br from-blue-500 to-sky-300 p-2 rounded-md">
                                <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M16.0503 12.0498L21 16.9996L16.0503 21.9493L14.636 20.5351L17.172 17.9988L4 17.9996V15.9996L17.172 15.9988L14.636 13.464L16.0503 12.0498ZM7.94975 2.0498L9.36396 3.46402L6.828 5.9988L20 5.99955V7.99955L6.828 7.9988L9.36396 10.5351L7.94975 11.9493L3 6.99955L7.94975 2.0498Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 text-gray-800 dark:text-gray-400 dark:border-gray-600">
                        <h3>View all</h3>
                    </div>
                </div>
            </div>

            <div class="mx-4 my-6 gap-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <!-- Card header -->
                <div class="items-center justify-between lg:flex">
                    <div class="mb-4 lg:mb-0">
                        <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">User list</h3>
                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">This is a list of all users</span>
                    </div>
                    <div class="items-center sm:flex">
                        <div class="flex items-center">
                            <a href="{{ route('admin.users.create') }}" wire:navigate class="mb-4 sm:mb-0 mr-4 inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Create user
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="flex flex-col mt-6">
                    <div class="overflow-x-auto rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="p-4 text-lg font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Users
                                            </th>
                                            <th scope="col" class="p-4 text-lg font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Role
                                            </th>
                                            <th scope="col" class="p-4 text-lg font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Department
                                            </th>
                                            <th scope="col" class="p-4 text-lg font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Home address
                                            </th>
                                            <th scope="col" class="p-4 text-lg font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Created at
                                            </th>
                                            <th scope="col" class="p-4 text-lg font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="p-4 text-lg font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center gap-4">
                                                        <img class="w-10 h-10 rounded-full object-cover bg-center" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}" alt="{{ $user->first_name }}'s photo">
                                                        <div class="font-medium dark:text-white">
                                                            <div>{{ $user->first_name }} {{ $user->last_name }}</div>
                                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="p-4 text-lg font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                    {{ $user->role }}
                                                </td>
                                                <td class="p-4 text-lg font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $user->department }}
                                                </td>
                                                <td class="p-4 text-lg font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                    {{ $user->home_address }}
                                                </td>
                                                <td class="p-4 text-lg font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                                    {{ $user->created_at->format('F j, Y') }}
                                                </td>
                                                <td class="flex items-center p-4 whitespace-nowrap">
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" wire:navigate class="text-green-600 font-medium mr-2 dark:text-green-400">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M16.7574 2.99677L14.7574 4.99677H5V18.9968H19V9.23941L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <a href="{{ route('admin.users.profile.show', ['id' => $user->id]) }}" wire:navigate class="text-yellow-400 text-xs font-medium mr-2 dark:text-yellow-300">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <button onclick="toggleDeleteModal()" class="text-red-600 text-xs font-medium mr-2 dark:text-red-400">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card Footer -->
                <div class="flex items-center justify-between pt-3 sm:pt-6">
                    <div>
                        <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" type="button" data-dropdown-toggle="transactions-dropdown">Last 7 days <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    </div>
                </div>
              </div>
            </div>
        </main>
        <div id="deleteModal" class="fixed inset-0 z-50 hidden justify-center items-center bg-gray-800 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 lg:w-1/4">
                <div class="flex justify-end items-center p-4">
                    <button onclick="toggleDeleteModal()" class="p-2 text-gray-600 hover:text-gray-900">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div class="p-4 text-center">
                    <svg class="mx-auto text-red-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete this user?</h3>
                </div>
                <div class="flex justify-end pr-6">
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleDeleteModal() {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.classList.toggle('hidden');
        deleteModal.classList.toggle('flex');
    }
</script>
@endsection
