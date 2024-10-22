@extends('users.layouts.nav')

@section('content')
    <div
        x-data="{ show: false }" x-init="
        @if(session('success') || session('error'))
            show = true;
            setTimeout(() => show = false, 3000);
        @endif"
    >

        @if(session('success') || session('error'))
            <div x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-2"
                class="fixed z-[700] top-4 left-1/2 transform -translate-x-1/2 max-w-xs bg-emerald-50 border-l-4 border-emerald-300 rounded-xl drop-shadow-xl dark:bg-gray-800 dark:border-emerald-500">
                <div class="flex p-4">
                    @if(session('success'))
                        <div class="shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="shrink-0 w-7 h-7 text-emerald-500 p-1 bg-emerald-200 backdrop-blur-xl rounded-full dark:bg-emerald-200/20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="alert alert-success text-sm text-emerald-800 dark:text-emerald-400">
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="shrink-0 w-7 h-7 text-red-500 p-1 bg-red-200 backdrop-blur-xl rounded-full dark:bg-red-200/20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="alert alert-error text-sm text-gray-700 dark:text-neutral-400">
                                {{ session('error') }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <div class="font-[sans-serif] dark:bg-gray-900">
        <div class="min-h-screen flex fle-col items-center justify-center py-6 px-4">
            <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
                <div>
                    <h2 class="lg:text-5xl text-4xl font-extrabold lg:leading-[55px] text-gray-800 dark:text-white">
                        Seamless Login for Exclusive Access
                    </h2>
                    <p class="text-sm mt-6 text-gray-800 dark:text-gray-300">Immerse yourself in a hassle-free login journey with our intuitively designed login form. Effortlessly access your account.</p>
                </div>
                <form action="{{ route('login') }}" method="POST" class="max-w-md md:ml-auto w-full">
                    @csrf
                    <h3 class="text-gray-800 text-3xl font-extrabold mb-8 dark:text-white">
                        Sign in
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label for="university_id" class="text-gray-800 text-sm mb-2 block dark:text-white">University ID</label>
                            <div class="relative flex items-center">
                                <input type="text" id="university_id" name="university_id" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('univeristy_id') is-invalid @enderror" placeholder="Enter University ID" />
                                <svg class="w-4 h-4 absolute right-4 dark:text-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V13.5L23 18L18 22.5V19H15V17H18Z">
                                    </path>
                                </svg>
                            </div>
                            @error('university_id')
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div x-data="{ showPassword: false }">
                            <label for="password" class="text-gray-800 text-sm mb-2 block dark:text-white">Password</label>
                            <div class="relative flex items-center">
                                <input name="password" :type="showPassword ? 'text' : 'password'" required class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('password') is-invalid @enderror" placeholder="Enter password" />
                                <svg @click="showPassword = !showPassword" class="w-4 h-4 absolute right-4 cursor-pointer dark:text-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"></path>
                                </svg>
                            </div>
                            @error('password')
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                                <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="!mt-8">
                        <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-gradient-to-br from-orange-400 via-red-600 to-red-800 hover:bg-gradient-to-bl focus:outline-none">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
