@extends('admin.layouts.nav')

@section('content')
<div class="ml-[20rem]">
    <div class="relative w-full pt-16">
        <main>
            <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-6">
                <div class="col-span-full mb-5 xl:mb-0">
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
                                    <a href="{{ route('all.users') }}" wire:navigate class="ml-1 text-sm font-medium text-gray-400 md:ml-2" aria-current="page">Users</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="{{ route('view.user', ['id' => $user->id]) }}" wire:navigate class="ml-1 text-sm font-medium text-gray-400 md:ml-2" aria-current="page">View user</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="#" class="ml-1 md:ml-2 text-sm font-medium text-gray-700 hover:text-gray-900">Edit user</a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
                        Edit user
                    </h1>
                </div>

                <div class="col-span-full xl:col-auto">
                    <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6 dark:bg-gray-800 dark:shadow-none">
                        <div class="sm:flex xl:block sm:space-x-4 xl:space-x-0">
                            @if($user->profile_picture)
                                <img class="mb-2 w-20 h-20 rounded-2xl shadow-lg shadow-gray-300 object-cover" src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->first_name }}'s picture" />
                            @else
                                <div class="relative inline-flex items-center justify-center rounded-2xl shadow-lg shadow-gray-300 mb-2 overflow-hidden bg-gray-200 dark:bg-gray-600 w-20 h-20">
                                    <span class="p-2 font-medium text-2xl text-gray-700 dark:text-gray-300">
                                        {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                            <div>
                                <h2 class="text-xl font-bold">{{ $user->first_name }} {{ $user->last_name }}</h2>
                                <ul class="mt-2 space-y-1">
                                    <li class="flex items-center text-md font-normal text-gray-500">
                                        <svg class="mr-2 w-4 h-4 text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                                        </svg>
                                        {{ $user->department }} department
                                    </li>
                                    <li class="flex items-center text-md font-normal text-gray-500">
                                        <svg class="mr-2 w-4 h-4 text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                        </svg>
                                        @if (empty($user->home_address))
                                            {{ $user->first_name }} has not provided a home address yet.
                                        @else
                                            {{ $user->home_address }}
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-4 sm:flex xl:block">
                            <div class="sm:flex-1">
                                <address class="text-sm not-italic font-normal text-gray-500">
                                    <div class="mt-4">Email address</div>
                                    <a class="text-md font-medium text-gray-900" href="/cdn-cgi/l/email-protection#9aedfff8f7fbe9eeffe8dafcf6f5edf8f3eeffb4f9f5f7">
                                        <span class="__cf_email__" data-cfemail="3f46504a4d515e525a7f595350485d564b5a115c5052">{{ $user->email }}</span>
                                    </a>
                                    <div class="mt-4">Role</div>
                                    <div class="mb-2 text-md font-medium text-gray-900">
                                        {{ $user->role }}
                                    </div>
                                    <div class="mt-4">Phone number</div>
                                    <div class="mb-2 text-md font-medium text-gray-900">
                                        @if (empty($user->contact_number))
                                            {{ $user->first_name }} has not provided a contact number yet.
                                        @else
                                            {{ $user->contact_number }}
                                        @endif
                                    </div>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                        <div class="flow-root">
                            <h3 class="text-xl font-bold">General information</h3>
                            <ul class="mt-2 divide-y text-md text-gray-700 dark:text-white dark:divide-gray-500">
                                <li class="flex flex-col py-2">
                                    <span class="font-semibold w-24">About:</span>
                                    <span class="text-gray-700 dark:text-gray-300">{!! nl2br(e($user->about)) !!}</span>
                                </li>
                                <li class="flex py-2">
                                    <span class="font-semibold w-24">Gender:</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $user->gender }}</span>
                                </li>
                                <li class="flex py-2">
                                    <span class="font-semibold w-24">Birthday:</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ date('M d, Y', strtotime($user->dob)) }}</span>
                                </li>
                                <li class="flex py-2">
                                    <span class="font-semibold w-24">Joined:</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ date('M d, Y', strtotime($user->created_at)) }}</span>
                                </li>
                                <li class="flex py-2">
                                    <span class="font-semibold w-24">ID:</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $user->university_id }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="flex flex-col lg:flex-row items-center bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                        <form action="{{ route('update.user', $user->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('PUT')
                            <div class="grid sm:grid-cols-2 gap-6">
                                <!-- First name and middle name -->
                                <div class="sm:col-span-2 flex space-x-4 w-full">
                                    <div class="w-1/2">
                                        <label for="first_name" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('First name') }}</label>
                                        <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('first_name') is-invalid @enderror" value="{{ $user->first_name }}" required>
                                        @error('first_name')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="w-1/2">
                                        <label for="middle_name" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Middle name') }}</label>
                                        <input type="text" id="middle_name" name="middle_name" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('middle_name') is-invalid @enderror" value="{{ $user->middle_name }}">
                                        @error('middle_name')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Last name and suffix -->
                                <div class="sm:col-span-2 flex space-x-4 w-full">
                                    <div class="w-3/4">
                                        <label for="last_name" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Last name') }}</label>
                                        <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('last_name') is-invalid @enderror" value="{{ $user->last_name }}" required>
                                        @error('last_name')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="w-1/4">
                                        <label for="suffix" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Suffix') }}</label>
                                        <select id="suffix" name="suffix" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('suffix') is-invalid @enderror">
                                            <option value="N/A" {{ $user->suffix == 'N/A' ? 'selected' : '' }}>N/A</option>
                                            <option value="Jr" {{ $user->suffix == 'Jr' ? 'selected' : '' }}>Jr</option>
                                            <option value="Sr" {{ $user->suffix == 'Sr' ? 'selected' : '' }}>Sr</option>
                                        </select>
                                        @error('suffix')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- DOB and gender -->
                                <div class="sm:col-span-2 flex space-x-4 w-full">
                                    <!-- DOB -->
                                    <div class="w-1/2">
                                        <label for="dob" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Date of birth') }}</label>
                                        <input type="date" id="dob" name="dob" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('dob') is-invalid @enderror" value="{{ $user->dob }}">
                                        @error('dob')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Gender -->
                                    <div class="w-1/2">
                                        <label for="gender" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Gender') }}</label>
                                        <select id="gender" name="gender" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('gender') is-invalid @enderror">
                                            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Role and department -->
                                <div class="sm:col-span-2 flex space-x-4 w-full">
                                    <!-- role -->
                                    <div class="w-1/2">
                                        <label for="role" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Role') }}</label>
                                        <select id="role" name="role" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('role') is-invalid @enderror">
                                            <option value="Student" {{ $user->role == 'Student' ? 'selected' : '' }}>Student</option>
                                            <option value="Faculty" {{ $user->role == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                                            <option value="Staff" {{ $user->role == 'Staff' ? 'selected' : '' }}>Staff</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Department -->
                                    <div class="w-1/2">
                                        <label for="department" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Department') }}</label>
                                        <select id="department" name="department" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('department') is-invalid @enderror">
                                            <option value="CICS" {{ $user->department== 'CICS' ? 'selected' : '' }}>CICS</option>
                                            <option value="CME" {{ $user->department == 'CME' ? 'selected' : '' }}>CME</option>
                                            <option value="CTE" {{ $user->department == 'CTE' ? 'selected' : '' }}>CTE</option>
                                            <option value="CET" {{ $user->department == 'CET' ? 'selected' : '' }}>CET</option>
                                            <option value="CAHSS" {{ $user->department == 'CAHSS' ? 'selected' : '' }}>CAHSS</option>
                                            <option value="SBA" {{ $user->department == 'SBA' ? 'selected' : '' }}>SBA</option>
                                            <option value="SHS" {{ $user->department == 'SHS' ? 'selected' : '' }}>SHS</option>
                                            <option value="DRRMO" {{ $user->department == 'DRRMO' ? 'selected' : '' }}>DRRMO</option>
                                            <option value="Registrar" {{ $user->department == 'Registrar' ? 'selected' : '' }}>Registrar</option>
                                            <option value="Admissions Office" {{ $user->department == 'Admissions Office' ? 'selected' : '' }}>Admissions Office</option>
                                            <option value="Guidance and Couseling" {{ $user->department == 'Guidance and Couseling' ? 'Guidance and Couseling' : '' }}>Guidance and Couseling</option>
                                            <option value="Medical-Dental Health Services" {{ $user->department == 'Medical-Dental Health Services' ? 'selected' : '' }}>Medical-Dental Health Services</option>
                                            <option value="Learning Commons Center" {{ $user->department == 'Learning Commons Center' ? 'selected' : '' }}>Learning Commons Center</option>
                                        </select>
                                        @error('department')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- University id and Username -->
                                <div class="sm:col-span-2 flex space-x-4 w-full">
                                    <!-- University ID -->
                                    <div class="w-1/2">
                                        <label for="university_id" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('University ID') }}</label>
                                        <input type="text" id="university_id" name="university_id" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('university_id') is-invalid @enderror" value="{{ $user->university_id }}">
                                        @error('university_id')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Username -->
                                    <div class="w-1/2">
                                        <label for="username" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Username') }}</label>
                                        <input type="text" id="username" name="username" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('username') is-invalid @enderror" value="{{ $user->username }}">
                                        @error('username')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="sm:col-span-2 flex space-x-4 w-full">
                                    <!-- Contact number -->
                                    <div class="w-1/2">
                                        <label for="contact_number" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Contact number') }}</label>
                                        <input type="text" id="contact_number" name="contact_number" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('email') is-invalid @enderror" value="{{ $user->contact_number }}">
                                        @error('contact_number')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Email -->
                                    <div class="w-1/2">
                                        <label for="email" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Email Address') }}</label>
                                        <input type="email" id="email" name="email" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('email') is-invalid @enderror" value="{{ $user->email }}">
                                        @error('email')
                                            <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Home address -->
                                <div class="sm:col-span-2">
                                    <label for="home_address" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Home address') }}</label>
                                    <input type="text" id="home_address" name="home_address" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('email') is-invalid @enderror" value="{{ $user->home_address }}">
                                    @error('home_address')
                                        <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-center my-2">
                                <button type="submit" class="w-full py-2 bg-gradient-to-r from-gray-100 to-gray-200 hover:bg-gradient-to-bl text-gray-500 text-lg font-semibold rounded-md hover:bg-yellow transition-colors duration-300">{{ __('Update details') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
