@extends('layouts.nav')

@section('content')
    <div class="w-full h-screen dark:bg-gray-900">
        <div class="max-w-4xl mx-auto font-[sans-serif] pt-[70px]">
            <div class="text-center mb-10">
                <h1 class="text-gray-800 text-4xl font-semibold mt-6 dark:text-white">Sign up into your account</h4>
                <p class="text-base mt-5 dark:text-gray-300">Join Our Community with all-time access and free.</p>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="grid sm:grid-cols-2 gap-6">
                    <!-- First name -->
                    <div class="sm:col-span-2">
                        <label for="first_name" class="text-gray-800 text-sm mb-2 block dark:text-gray-200">First Name</label>
                        <input name="first_name" id="first_name" type="text" required class="w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('first_name') is-invalid @enderror" placeholder="Enter first name" required/>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Last name and suffix -->
                    <div class="sm:col-span-2 flex space-x-4 w-full">
                        <!-- Last name -->
                        <div class="w-3/4">
                            <label for="last_name" class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Last Name</label>
                            <input name="last_name" id="last_name" type="text" required class="w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('last_name') is-invalid @enderror" placeholder="Enter last name" required/>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Suffix -->
                        <div class="w-1/4 relative" x-data="{ open: false, selected: '', suffixOptions: ['N/A', 'Jr', 'Sr'] }">
                            <label for="suffix" class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Suffix</label>
                            <!-- Dropdown button -->
                            <button @click="open = !open" type="button" class="w-full bg-white border border-gray-300 text-gray-800 text-sm px-4 py-3 rounded-md flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50">
                                <!-- Dropdown text -->
                                <span x-text="selected ? selected : 'Select suffix'">Select suffix</span>
                                <svg class="w-4 h-4 inline-block ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <!-- Dropdown options -->
                            <ul x-show="open" @click.away="open = false" class="dropdown-menu absolute z-50 left-0 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg">
                                <template x-for="option in suffixOptions" :key="option">
                                    <li @click="selected = option; open = false" x-text="option" class="px-4 py-2 hover:bg-gray-100 cursor-pointer"></li>
                                </template>
                            </ul>
                            <input type="hidden" id="suffix" name="suffix" :value="selected" />
                        </div>
                    </div>
                    <!-- DOB -->
                    <div>
                        <label for="dob" class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Birthday</label>
                        <input name="dob" id="dob" type="date" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('dob') is-invalid @enderror" placeholder="Enter first name" required/>
                        @error('dob')
                            <span class="text-red-500 text-sm mt-1 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Gender -->
                    <div x-data="{ open: false, selected: '{{ old('gender', '') }}', genderOptions: ['Male', 'Female', 'Others'] }" class="relative">
                        <label class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Gender</label>
                        <!-- Dropdown button -->
                        <button @click="open = !open" type="button" class="w-full bg-white border border-gray-300 text-gray-800 text-sm px-4 py-3 rounded-md flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('gender') @enderror">
                            <!-- Dropdown text -->
                            <span x-text="selected ? selected : 'Select gender'">Select gender</span>
                            <svg class="w-4 h-4 inline-block ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown options -->
                        <ul x-show="open" @click.away="open = false" class="absolute z-50 left-0 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg">
                            <template x-for="option in genderOptions" :key="option">
                                <li @click="selected = option; open = false" x-text="option" class="px-4 py-2 hover:bg-gray-100 cursor-pointer"></li>
                            </template>
                        </ul>
                        <input type="hidden" name="gender" :value="selected" />

                        <!-- Error message display -->
                        @error('gender')
                            <span class="text-red-500 text-sm mt-1 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Role -->
                    <div x-data="{ open: false, selected: '{{ old('role', '') }}', roleOptions: ['Student', 'Faculty', 'Staff'] }" class="relative">
                        <label class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Role</label>
                        <!-- Dropdown button -->
                        <button @click="open = !open" type="button" class="w-full bg-white border border-gray-300 text-gray-800 text-sm px-4 py-3 rounded-md flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('role') @enderror">
                            <!-- Dropdown text -->
                            <span x-text="selected ? selected : 'Select role'">Select role</span>
                            <svg class="w-4 h-4 inline-block ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown options -->
                        <ul x-show="open" @click.away="open = false" class="absolute left-0 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg">
                            <template x-for="option in roleOptions" :key="option">
                                <li @click="selected = option; open = false" x-text="option" class="px-4 py-2 hover:bg-gray-100 cursor-pointer"></li>
                            </template>
                        </ul>
                        <input type="hidden" name="role" :value="selected" />

                        <!-- Error message display -->
                        @error('role')
                            <span class="text-red-500 text-sm mt-1 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Department -->
                    <div x-data="{ open: false, selected: '{{ old('department', '') }}', departmentOptions: ['CICS', 'CME', 'CTE', 'CET', 'CAHSS', 'SBA', 'SHS', 'DRRMO', 'Registrar', 'Admissions Office', 'Guidance and Couseling', 'Medical-Dental Health Services', 'Learning Commons Center'] }" class="relative">
                        <label class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Department</label>
                        <!-- Dropdown button -->
                        <button @click="open = !open" type="button" class="w-full bg-white border border-gray-300 text-gray-800 text-sm px-4 py-3 rounded-md flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('department') @enderror">
                            <!-- Dropdown text -->
                            <span x-text="selected ? selected : 'Select department'">Select department</span>
                            <svg class="w-4 h-4 inline-block ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown options -->
                        <ul x-show="open" @click.away="open = false" class="absolute left-0 mt-1 w-full z-50 bg-white border border-gray-300 rounded-md shadow-lg">
                            <template x-for="option in departmentOptions" :key="option">
                                <li @click="selected = option; open = false" x-text="option" class="px-4 py-2 hover:bg-gray-100 cursor-pointer"></li>
                            </template>
                        </ul>
                        <input type="hidden" name="department" :value="selected" />

                        @error('department')
                            <span class="text-red-500 text-sm mt-1 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- University ID -->
                    <div class="sm:col-span-2">
                        <label for="university_id" class="text-gray-800 text-sm mb-2 block dark:text-gray-200">University ID</label>
                        <input name="university_id" id="university_id" type="text" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('university_id') is-invalid @enderror" placeholder="Enter University ID" required/>
                        @error('university_id')
                            <span class="text-red-500 text-sm mt-1 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Password -->
                    <div x-data="{ showPassword: false }">
                        <label for="password" class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Password</label>
                        <div class="relative flex items-center">
                            <input :type="showPassword ? 'text' : 'password'" name="password" id="password" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('password') is-invalid @enderror" placeholder="Enter new password" required/>
                            <svg @click="showPassword = !showPassword" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                            </svg>
                        </div>
                        @error('password')
                            <span class="text-red-500 text-sm mt-1 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Confirm Password -->
                    <div x-data="{ showPassword: false }">
                        <label for="password-confirm" class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Confirm password</label>
                        <div class="relative flex items-center">
                            <input :type="showPassword ? 'text' : 'password'" name="password_confirmation" id="password-confirm" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50" placeholder="Enter confirm password" required/>
                            <svg @click="showPassword = !showPassword" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- Signup Button -->
                <div class="!mt-8">
                    <button type="submit" class="w-full shadow-xl px-4 py-3 text-sm font-semibold rounded text-white bg-gradient-to-br from-orange-400 via-red-600 to-red-800 hover:bg-gradient-to-bl focus:outline-none">
                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
