@extends('layouts.nav')

@section('content')
<div class="font-[sans-serif] dark:bg-gray-900">
    <div class="min-h-screen flex fle-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
            <div>
                <h2 class="lg:text-5xl text-4xl font-extrabold lg:leading-[55px] text-gray-800 dark:text-white">
                    Seamless Login for Exclusive Access
                </h2>
                <p class="text-sm mt-6 text-gray-800 dark:text-gray-300">Immerse yourself in a hassle-free login journey with our intuitively designed login form. Effortlessly access your account.</p>
                <p class="text-sm mt-12 text-gray-800 dark:text-gray-300">Don't have an account <a href="{{ route('register') }}" wire:navigate class="text-red-700 dark:text-red-500 font-semibold hover:underline ml-1">Register here</a></p>
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
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                            <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                                Remember me
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="jajvascript:void(0);" class="text-blue-600 hover:text-blue-500 font-semibold">
                                Forgot your password?
                            </a>
                        </div>
                    </div> --}}
                </div>
                <div class="!mt-8">
                    <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-gradient-to-br from-orange-400 via-red-600 to-red-800 hover:bg-gradient-to-bl focus:outline-none">
                        Log in
                    </button>
                </div>
                {{-- <div class="space-x-6 flex justify-center mt-8">
                    <button type="button"
                        class="border-none outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32px" viewBox="0 0 512 512">
                            <path fill="#fbbd00" d="M120 256c0-25.367 6.989-49.13 19.131-69.477v-86.308H52.823C18.568 144.703 0 198.922 0 256s18.568 111.297 52.823 155.785h86.308v-86.308C126.989 305.13 120 281.367 120 256z" data-original="#fbbd00" />
                            <path fill="#0f9d58" d="m256 392-60 60 60 60c57.079 0 111.297-18.568 155.785-52.823v-86.216h-86.216C305.044 385.147 281.181 392 256 392z" data-original="#0f9d58" />
                            <path fill="#31aa52" d="m139.131 325.477-86.308 86.308a260.085 260.085 0 0 0 22.158 25.235C123.333 485.371 187.62 512 256 512V392c-49.624 0-93.117-26.72-116.869-66.523z" data-original="#31aa52" />
                            <path fill="#3c79e6" d="M512 256a258.24 258.24 0 0 0-4.192-46.377l-2.251-12.299H256v120h121.452a135.385 135.385 0 0 1-51.884 55.638l86.216 86.216a260.085 260.085 0 0 0 25.235-22.158C485.371 388.667 512 324.38 512 256z" data-original="#3c79e6" />
                            <path fill="#cf2d48" d="m352.167 159.833 10.606 10.606 84.853-84.852-10.606-10.606C388.668 26.629 324.381 0 256 0l-60 60 60 60c36.326 0 70.479 14.146 96.167 39.833z" data-original="#cf2d48" />
                            <path fill="#eb4132" d="M256 120V0C187.62 0 123.333 26.629 74.98 74.98a259.849 259.849 0 0 0-22.158 25.235l86.308 86.308C162.883 146.72 206.376 120 256 120z" data-original="#eb4132" />
                        </svg>
                    </button>
                    <button type="button"
                        class="border-none outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32px" viewBox="0 0 512 512">
                            <path fill="#1877f2" d="M512 256c0 127.78-93.62 233.69-216 252.89V330h59.65L367 256h-71v-48.02c0-20.25 9.92-39.98 41.72-39.98H370v-63s-29.3-5-57.31-5c-58.47 0-96.69 35.44-96.69 99.6V256h-65v74h65v178.89C93.62 489.69 0 383.78 0 256 0 114.62 114.62 0 256 0s256 114.62 256 256z" data-original="#1877f2" />
                            <path fill="#fff" d="M355.65 330 367 256h-71v-48.021c0-20.245 9.918-39.979 41.719-39.979H370v-63s-29.296-5-57.305-5C254.219 100 216 135.44 216 199.6V256h-65v74h65v178.889c13.034 2.045 26.392 3.111 40 3.111s26.966-1.066 40-3.111V330z" data-original="#ffffff" />
                        </svg>
                    </button>
                    <button type="button"
                        class="border-none outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32px" viewBox="0 0 22.773 22.773">
                            <path d="M15.769 0h.162c.13 1.606-.483 2.806-1.228 3.675-.731.863-1.732 1.7-3.351 1.573-.108-1.583.506-2.694 1.25-3.561C13.292.879 14.557.16 15.769 0zm4.901 16.716v.045c-.455 1.378-1.104 2.559-1.896 3.655-.723.995-1.609 2.334-3.191 2.334-1.367 0-2.275-.879-3.676-.903-1.482-.024-2.297.735-3.652.926h-.462c-.995-.144-1.798-.932-2.383-1.642-1.725-2.098-3.058-4.808-3.306-8.276v-1.019c.105-2.482 1.311-4.5 2.914-5.478.846-.52 2.009-.963 3.304-.765.555.086 1.122.276 1.619.464.471.181 1.06.502 1.618.485.378-.011.754-.208 1.135-.347 1.116-.403 2.21-.865 3.652-.648 1.733.262 2.963 1.032 3.723 2.22-1.466.933-2.625 2.339-2.427 4.74.176 2.181 1.444 3.457 3.028 4.209z" data-original="#000000"></path>
                        </svg>
                    </button>
                </div> --}}
            </form>
        </div>
    </div>
</div>
@endsection
