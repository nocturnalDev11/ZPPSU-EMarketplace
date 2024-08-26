@extends('layouts.guest-nav')

@section('content')
    <div class="flex min-h-screen items-center justify-center dark:bg-gray-800 pt-20 px-4 sm:px-0">
        <div class="w-full max-w-lg sm:max-w-2xl md:max-w-3xl lg:max-w-3xl xl:max-w-4xl bg-gray-50 py-4 md:p-12 lg:p-8 xl:p-12 rounded-lg shadow-md border dark:bg-gray-700 dark:border-gray-600">
            <div class="flex flex-col my-3">
                <h1 class="text-2xl sm:text-3xl font-semibold text-black text-center dark:text-gray-100">
                    <span class="text-red-700 dark:text-red-600">ZPPSU</span>
                    <span class="text-yellow-600 dark:text-yellow-500">E-Marketplace</span>
                </h1>
                <h2 class="text-xl sm:text-2xl font-semibold my-3 text-black text-center dark:text-gray-100">
                    {{ __('Sign Up') }}
                </h2>
            </div>
            <p class="text-sm sm:text-base font-semibold my-3 text-gray-500 text-center dark:text-gray-300">
                Join Our Community with all-time access and free.
            </p>
            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <!-- First name -->
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('First name') }}</label>
                    <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Last name and suffix -->
                <div class="flex flex-row space-x-4 mb-4">
                    <div class="w-3/4">
                        <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Last name') }}</label>
                        <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="w-1/4">
                        <label for="suffix" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Suffix') }}</label>
                        <select id="suffix" name="suffix" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('suffix') is-invalid @enderror">
                            <option value="N/A">N/A</option>
                            <option value="Jr">Jr</option>
                            <option value="Sr">Sr</option>
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
                        <label for="dob" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Date of birth') }}</label>
                        <input type="date" id="dob" name="dob" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('dob') is-invalid @enderror" value="{{ old('dob') }}" required>
                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Gender -->
                    <div class="w-1/2">
                        <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Gender') }}</label>
                        <select id="gender" name="gender" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('gender') is-invalid @enderror" value="{{ old('gender') }}" required>
                            <option value="" selected>Select gender:</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- Role and department -->
                <div class="flex flex-row space-x-4 mb-4">
                    <!-- Role -->
                    <div class="w-1/2">
                        <label for="role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Role') }}</label>
                        <select id="role" name="role" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('role') is-invalid @enderror">
                            <option value="" selected>Select role:</option>
                            <option value="Student">Student</option>
                            <option value="Staff">Staff</option>
                            <option value="Faculty">Faculty</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- Department -->
                    <div class="w-1/2">
                        <label for="department" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Department') }}</label>
                        <select id="department" name="department" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('department') is-invalid @enderror" value="{{ old('department') }}" required>
                            <option value="" selected>Select department:</option>
                            <option value="CICS">CICS</option>
                            <option value="CME">CME</option>
                            <option value="CTE">CTE</option>
                            <option value="CET">CET</option>
                            <option value="CAHSS">CAHSS</option>
                            <option value="SBA">SBA</option>
                            <option value="SHS">SHS</option>
                            <option value="DRRMO">DRRMO</option>
                            <option value="Registrar">Registrar</option>
                            <option value="Admissions Office">Admissions Office</option>
                            <option value="Guidance and Couseling">Guidance and Couseling and Testing Services</option>
                            <option value="Medical-Dental Health Services">Medical-Dental Health Services</option>
                            <option value="Learning Commons Center ">Learning Commons Center</option>
                            <option value="N/A">N/A</option>
                        </select>
                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <!-- University ID -->
                <div class="mb-4">
                    <label for="university_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('University ID') }}</label>
                    <input type="text" id="university_id" name="university_id" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('university_id') is-invalid @enderror" value="{{ old('university_id') }}" required>
                    @error('university_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Email Address') }}</label>
                    <input type="email" id="email" name="email" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600 @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Confirm Password') }}</label>
                    <input type="password" id="password-confirm" name="password_confirmation" class="mt-1 p-2 w-full text-lg border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-gray-400 dark:focus:ring-gray-600" required>
                </div>
                <!-- Register Button -->
                <div class="flex justify-center mb-4">
                    <button type="submit" class="w-full py-2 text-lg bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl text-white font-semibold rounded-md transition-colors duration-300">{{ __('Register') }}</button>
                </div>
                <div class="text-sm text-gray-600 text-center dark:text-gray-300">
                    {{ __('Already have an account?') }} <a href="{{ route('login') }}" class="text-maroon hover:underline dark:text-yellow-500">{{ __('Sign In') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
