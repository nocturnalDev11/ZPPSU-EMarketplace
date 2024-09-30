<div x-data="{
    openDepartment: false,
    openGender: false,
    openRole: false,
    selectedDepartment: @entangle('selectedDepartment'),
    selectedGender: @entangle('selectedGender'),
    selectedRole: @entangle('selectedRole'),
    search: @entangle('search').
}">
    <!-- User List -->
    <div class="mx-4 my-6 gap-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0 w-full">
                <!-- Search -->
                <div class="relative w-full md:w-1/2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="search" wire:model.live="search" placeholder="Search" autocomplete="off"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-400"
                        placeholder="Search" required="">
                </div>
            </div>

            <div class="justify-end items-center sm:flex gap-2 w-full">
                @include('admin.users.add-users')

                <div @click.away="openDepartment = false" class="relative">
                    <button @click="openDepartment = !openDepartment"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
                        Filter by department
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div x-show="openDepartment" class="absolute right-0 mt-2 w-48 p-3 bg-white shadow rounded z-10">
                        <h6 class="mb-3 text-sm font-medium text-gray-900">
                            Department
                        </h6>
                        <ul class="space-y-2 text-sm">
                            @foreach ([
                            'CICS',
                            'CME',
                            'CTE',
                            'CET',
                            'CAHSS',
                            'SBA',
                            'SHS',
                            'DRRMO',
                            'Registrar',
                            'Admissions Office',
                            'Guidance and Couseling',
                            'Medical-Dental Health Services',
                            'Learning Commons Center'
                            ] as $department)
                            <li class="flex items-center">
                                <input type="checkbox" wire:model.live="selectedDepartment" value="{{ $department }}"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                <label for="{{ $department }}" class="ml-2 text-sm font-medium text-gray-900">
                                    {{ $department }}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Gender -->
                <div @click.away="openGender = false" class="relative">
                    <button @click="openGender = !openGender"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
                        Filter by gender
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div x-show="openGender" class="absolute right-0 mt-2 w-48 p-3 bg-white shadow rounded z-10">
                        <h6 class="mb-3 text-sm font-medium text-gray-900">
                            Gender
                        </h6>
                        <ul class="space-y-2 text-sm">
                            @foreach (['Male', 'Female', 'Others'] as $gender)
                            <li class="flex items-center">
                                <input type="checkbox" wire:model.live="selectedGender" value="{{ $gender }}"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                <label for="{{ $gender }}" class="ml-2 text-sm font-medium text-gray-900">
                                    {{ $gender }}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div @click.away="openRole = false" class="relative">
                    <button @click="openRole = !openRole"
                        class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
                        Filter by role
                        <svg class="ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div x-show="openRole" class="absolute right-0 mt-2 w-48 p-3 bg-white shadow rounded z-10">
                        <h6 class="mb-3 text-sm font-medium text-gray-900">
                            Role
                        </h6>
                        <ul class="space-y-2 text-sm">
                            @foreach (['Student', 'Faculty', 'Staff'] as $role)
                            <li class="flex items-center">
                                <input type="checkbox" wire:model.live="selectedRole" value="{{ $role }}"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                <label for="{{ $role }}" class="ml-2 text-sm font-medium text-gray-900">
                                    {{ $role }}
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
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
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Users
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Role
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Department
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Home address
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Created at
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-md font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                                @forelse ($users as $user)
                                <tr>
                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center gap-4">
                                            @if ($user->profile_picture)
                                            <img class="w-10 h-10 rounded-full object-cover bg-center"
                                                src="{{ asset('storage/' . $user->profile_picture) }}"
                                                alt="{{ $user->first_name }}'s photo">
                                            @else
                                            <div
                                                class="relative inline-flex items-center justify-center rounded-full overflow-hidden bg-gray-200 dark:bg-gray-600 w-10 h-10">
                                                <span class="p-2 font-medium text-md text-gray-700 dark:text-gray-300">
                                                    {{ strtoupper(substr($user->first_name, 0, 1)) }}{{
                                                    strtoupper(substr($user->last_name, 0, 1)) }}
                                                </span>
                                            </div>
                                            @endif
                                            <div class="font-medium dark:text-white">
                                                <div>{{ $user->first_name }} {{ $user->last_name }}</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $user->role }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->department }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $user->home_address }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap dark:text-gray-400">
                                        {{ $user->created_at->format('F j, Y') }}
                                    </td>
                                    <td class="flex items-center p-4 whitespace-nowrap">
                                        <a href="{{ route('edit.user', $user->id) }}" wire:navigate
                                            class="text-green-600 font-medium mr-2 dark:text-green-400">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M16.7574 2.99677L14.7574 4.99677H5V18.9968H19V9.23941L21 7.23941V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99677C3 3.44448 3.44772 2.99677 4 2.99677H16.7574ZM20.4853 2.09727L21.8995 3.51149L12.7071 12.7039L11.2954 12.7063L11.2929 11.2897L20.4853 2.09727Z">
                                                </path>
                                            </svg>
                                            </button>
                                            <a href="{{ route('view.user', ['id' => $user->id]) }}" wire:navigate
                                                class="text-yellow-400 text-xs font-medium mr-2 dark:text-yellow-300">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                    </path>
                                                </svg>
                                            </a>
                                            @include('admin.users.delete-user')
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-lg text-gray-700 dark:text-gray-300">
                                        No user found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Footer -->
        <div class="flex items-center justify-between pt-3 sm:pt-6">
            <div>
                <button
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    type="button" data-dropdown-toggle="transactions-dropdown">Last 7 days
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
