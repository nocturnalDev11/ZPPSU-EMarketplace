@extends('admin.layouts.nav')

@section('content')
<div id="main-content" class="flex overflow-hidden bg-gray-50 dark:bg-gray-900 transition-all ml-80 h-full">
    <div class="relative w-full overflow-y-auto pt-24">
        <main>
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" wire:navigate class="inline-flex items-center text-gray-700 hover:text-gray-900">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2" aria-current="page">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2" aria-current="page">Users</span>
                        </div>
                    </li>
                </ol>
            </nav>

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
                        <a href="{{ route('all.users') }}" wire:navigate class="hover:underline">View all</a>
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

            <div class="mx-4 my-6 gap-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <!-- Card header -->
                <div class="items-center justify-between lg:flex">
                    <div class="mb-4 lg:mb-0">
                        <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">User list</h3>
                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">This is a list of all users</span>
                    </div>
                    <div class="items-center sm:flex">
                        {{-- <div class="flex items-center">
                            <a href="{{ route('admin.users.create') }}" wire:navigate class="mb-4 sm:mb-0 mr-4 inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Create user
                            </a>
                        </div> --}}
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
                                                    <a href="{{ route('edit.user', $user->id) }}" wire:navigate class="text-green-600 font-medium mr-2 dark:text-green-400">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M16.7574 2.99677L14.7574 4.99677H5V18.9968H19V9.23941L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                    <a href="{{ route('view.user', ['id' => $user->id]) }}" wire:navigate class="text-yellow-400 text-xs font-medium mr-2 dark:text-yellow-300">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                            </path>
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
                        <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" type="button" data-dropdown-toggle="transactions-dropdown">Last 7 days <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    </div>
                </div>
              </div>
            </div>
        </main>
    </div>
</div>
@endsection
