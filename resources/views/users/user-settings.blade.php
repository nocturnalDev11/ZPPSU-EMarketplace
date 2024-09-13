@extends('users.layouts.nav')

@section('content')
    {{-- <div class="mt-24 container xl:ml-80 lg:ml-80 md:ml-0 ml-0 dark:bg-gray-800 font-sans">
        <main>
            <article class="h-screen">
                <h1 class="text-3xl font-semibold mb-6 text-black text-center">{{ __('Personal details | Update') }}</h1>
                <div class="bg-gradient-to-br from-pink-50 via-sky-50 to-teal-50 gap-6 flex xl:flex-row lg:flex-row md:flex-col flex-col shadow w-3/4 mx-auto rounded-lg p-10 mb-6 dark:bg-gray-700">
                    <form action="{{ route('profile.update.picture', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="sm:col-span-2 mx-auto" id="dropzone-container">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span></p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input name="profile_picture" id="dropzone-file" type="file" class="hidden" />
                            </label>
                        </div>

                        @php
                            $baseClasses = 'h-64 w-64 mb-2 justify-center items-center hidden';
                            $additionalClasses = 'flex';
                            $allClasses = $baseClasses . ' ' . $additionalClasses;
                        @endphp
                        <div id="image-preview" class="{{ $allClasses }}">
                            <!-- Dynamically adds image preview -->
                        </div>

                        <button type="submit" class="mt-2 text-white inline-flex items-center bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Update Profile Picture
                        </button>
                    </form>
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" class="space-y-4 w-3/4">
                        @csrf
                        @method('POST')
                        <!-- First name -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-1/2">
                                <label for="first_name" class="block text-sm font-medium text-gray-500">{{ __('First name') }}</label>
                                <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('first_name') is-invalid @enderror" value="{{ $user->first_name }}" required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="middle_name" class="block text-sm font-medium text-gray-500">{{ __('Middle name') }}</label>
                                <input type="text" id="middle_name" name="middle_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('middle_name') is-invalid @enderror" value="{{ $user->middle_name }}">
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Last name and suffix -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-3/4">
                                <label for="last_name" class="block text-sm font-medium text-gray-500">{{ __('Last name') }}</label>
                                <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('last_name') is-invalid @enderror" value="{{ $user->last_name }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/4">
                                <label for="suffix" class="block text-sm font-medium text-gray-500">{{ __('Suffix') }}</label>
                                <select id="suffix" name="suffix" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('suffix') is-invalid @enderror">
                                    <option value="N/A" {{ $user->suffix == 'N/A' ? 'selected' : '' }}>N/A</option>
                                    <option value="Jr" {{ $user->suffix == 'Jr' ? 'selected' : '' }}>Jr</option>
                                    <option value="Sr" {{ $user->suffix == 'Sr' ? 'selected' : '' }}>Sr</option>
                                </select>
                                @error('suffix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- DOB and gender -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <!-- DOB -->
                            <div class="w-1/2">
                                <label for="dob" class="block text-sm font-medium text-gray-500">{{ __('Date of birth') }}</label>
                                <input type="date" id="dob" name="dob" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('dob') is-invalid @enderror" value="{{ $user->dob }}">
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Gender -->
                            <div class="w-1/2">
                                <label for="gender" class="block text-sm font-medium text-gray-500">{{ __('Gender') }}</label>
                                <select id="gender" name="gender" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('gender') is-invalid @enderror">
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="about" class="block text-sm font-medium text-gray-500">{{ __('About') }}</label>
                            <textarea id="about" name="about" rows="4" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('about') is-invalid @enderror" value="{{ $user->about }}"></textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <!-- Contact number -->
                        <div class="mb-4">
                            <label for="contact_number" class="block text-sm font-medium text-gray-500">{{ __('Contact number') }}</label>
                            <input type="text" id="contact_number" name="contact_number" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('email') is-invalid @enderror" value="{{ $user->contact_number }}">
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-500">{{ __('Email Address') }}</label>
                            <input type="email" id="email" name="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('email') is-invalid @enderror" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Home address -->
                        <div class="mb-4">
                            <label for="home_address" class="block text-sm font-medium text-gray-500">{{ __('Home address') }}</label>
                            <input type="text" id="home_address" name="home_address" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('email') is-invalid @enderror" value="{{ $user->home_address }}">
                            @error('home_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Update Button -->
                        <div class="flex justify-center mb-4">
                            <button type="submit" class="w-full py-2 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-bl text-white text-lg font-semibold rounded-md hover:bg-yellow transition-colors duration-300">{{ __('Update details') }}</button>
                        </div>
                    </form>
                </div>
            </article>
        </main>
    </div> --}}

    <div class="container xl:ml-80 lg:ml-80 md:ml-0 ml-0 dark:bg-gray-800 font-sans">
        <div class="relative w-full overflow-y-auto pt-16">
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
                            <form action="{{ route('profile.update', $user->id) }}" method="POST" class="w-full">
                                @csrf
                                @method('POST')
                                <div class="grid sm:grid-cols-2 gap-6">
                                    <!-- First name -->
                                    <div class="sm:col-span-2 flex space-x-4 w-full">
                                        <div class="w-1/2">
                                            <label for="first_name" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('First name') }}</label>
                                            <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('first_name') is-invalid @enderror" value="{{ $user->first_name }}" required>
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="w-1/2">
                                            <label for="middle_name" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Middle name') }}</label>
                                            <input type="text" id="middle_name" name="middle_name" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('middle_name') is-invalid @enderror" value="{{ $user->middle_name }}">
                                            @error('middle_name')
                                                <span class="invalid-feedback" role="alert">
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
                                                <span class="invalid-feedback" role="alert">
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
                                                <span class="invalid-feedback" role="alert">
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
                                                <span class="invalid-feedback" role="alert">
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
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="about" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('About') }}</label>
                                        <textarea id="about" name="about" rows="4" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('about') is-invalid @enderror" value="{{ $user->about }}"></textarea>
                                        @error('about')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="sm:col-span-2 flex space-x-4 w-full">
                                        <!-- Contact number -->
                                        <div class="w-1/2">
                                            <label for="contact_number" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Contact number') }}</label>
                                            <input type="text" id="contact_number" name="contact_number" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('email') is-invalid @enderror" value="{{ $user->contact_number }}">
                                            @error('contact_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- Email -->
                                        <div class="w-1/2">
                                            <label for="email" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Email Address') }}</label>
                                            <input type="email" id="email" name="email" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('email') is-invalid @enderror" value="{{ $user->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
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
                                            <span class="invalid-feedback" role="alert">
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
    <script>
        const firstNameInput = document.getElementById('first_name');
        const middleNameInput = document.getElementById('middle_name');
        const lastNameInput = document.getElementById('last_name');
        const outputText = document.getElementById('output-text');

        function updateOutputText() {
            outputText.textContent = `${firstNameInput.value} ${middleNameInput.value} ${lastNameInput.value}`;
        }

        firstNameInput.addEventListener('input', updateOutputText);
        middleNameInput.addEventListener('input', updateOutputText);
        lastNameInput.addEventListener('input', updateOutputText);

        document.addEventListener('DOMContentLoaded', function() {
            function setupFileUploadAndPreview(dropzoneId, imagePreviewContainerId, dropzoneContainerId) {
                const dropzone = document.getElementById(dropzoneId);
                const imagePreviewContainer = document.getElementById(imagePreviewContainerId);
                const dropzoneContainer = document.getElementById(dropzoneContainerId);

                dropzone.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function(e) {
                            const imgSrc = e.target.result;

                            const imgElement = document.createElement('img');
                            imgElement.src = imgSrc;
                            imgElement.className = 'w-full h-full object-cover rounded-lg';

                            imagePreviewContainer.innerHTML = '';
                            imagePreviewContainer.appendChild(imgElement);

                            imagePreviewContainer.classList.remove('hidden');

                            dropzoneContainer.style.display = 'none';
                        };
                    } else {
                        imagePreviewContainer.classList.add('hidden');
                    }
                });
            }

            setupFileUploadAndPreview('dropzone-file', 'image-preview', 'dropzone-container');
        });
    </script>
@endsection
