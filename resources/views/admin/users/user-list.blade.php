@extends('admin.layouts.dashboard-nav')

@include('admin.layouts.side-nav')
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

            {{-- @if (session('success'))
                <div class="bg-green-200 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif --}}

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
    </div>
</div>
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
<script>
    function toggleDeleteModal() {
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.classList.toggle('hidden');
        deleteModal.classList.toggle('flex');
    }
</script>
@endsection
