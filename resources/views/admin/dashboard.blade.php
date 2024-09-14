@extends('admin.layouts.nav')

@section('content')
<main class="flex overflow-hidden h-screen w-full dark:bg-gray-900">
    <div class="relative w-full overflow-y-auto pt-16">
        <!-- Users -->
        <div class="grid gap-4 px-4 md:grid-cols-2 xl:grid-cols-4">
            <!-- Total Users -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
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
                    <a href="{{ route('all.users') }}" wire:navigate class="hover:underline">View all</a>
                </div>
            </div>
            <!-- Total Students -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
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
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
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
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
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
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
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
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
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
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
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
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
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

        <div class="mx-4 my-6 gap-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
            <!-- Card header -->
            <div class="items-center justify-between lg:flex">
                <div class="mb-4 lg:mb-0">
                    <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">User list</h3>
                    <span class="text-base font-normal text-gray-500 dark:text-gray-400">This is a list of all users</span>
                </div>
                <div class="items-center sm:flex">
                    <div class="flex items-center">
                        @include('admin.users.add-users')
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="flex flex-col mt-6">
                <div class="overflow-x-auto rounded-lg">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-200 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Users
                                        </th>
                                        <th scope="col" class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Role
                                        </th>
                                        <th scope="col" class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Department
                                        </th>
                                        <th scope="col" class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Home address
                                        </th>
                                        <th scope="col" class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Created at
                                        </th>
                                        <th scope="col" class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center gap-4">
                                                @if ($user->profile_picture)
                                                <img class="w-10 h-10 rounded-full object-cover bg-center" src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->first_name }}'s photo">
                                                @else
                                                <div class="relative inline-flex items-center justify-center rounded-full overflow-hidden bg-gray-200 dark:bg-gray-600 w-10 h-10">
                                                    <span class="p-2 font-medium text-md text-gray-700 dark:text-gray-300">
                                                    {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                                                    </span>
                                                </div>
                                                @endif
                                                <div class="font-medium dark:text-white">
                                                    <div>{{ $user->first_name }} {{ $user->last_name }}</div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                            {{ $user->role }}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->department }}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                            {{ $user->home_address }}
                                        </td>
                                        <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                            {{ $user->created_at->format('F j, Y') }}
                                        </td>
                                        <td class="flex items-center p-4 whitespace-nowrap">
                                            <a href="{{ route('edit.user', $user->id) }}" wire:navigate class="text-green-600 font-medium mr-2 dark:text-green-400">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                                </button>
                                            <a href="{{ route('view.user', ['id' => $user->id]) }}" wire:navigate class="text-yellow-400 text-xs font-medium mr-2 dark:text-yellow-300">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </a>
                                            @include('admin.users.delete-user')
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
                    <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" type="button" data-dropdown-toggle="transactions-dropdown">
                        Last 7 days
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
