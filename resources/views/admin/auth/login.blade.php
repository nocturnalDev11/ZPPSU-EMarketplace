@extends('admin.layouts.login-nav')

@section('content')
    <div class="w-full min-h-[92vh] flex justify-center items-center">
        <div class="w-[500px] bg-white p-16 rounded-lg shadow-md border dark:bg-gray-800 dark:border-none">
            <div class="flex flex-col">
                <h1 class="text-3xl font-semibold text-gray-600 text-center">
                    <span class="text-red-700 dark:text-red-600">ZPPSU</span>
                    <span class="text-yellow-600 dark:text-yellow-500">E-Marketplace</span>
                </h1>
                <h1 class="text-3xl font-semibold mb-6 text-center dark:text-gray-200">
                    {{ __('Admin Login') }}
                </h1>
            </div>
            <h1 class="text-sm font-semibold mb-6 text-gray-500 text-center dark:text-gray-300">Access your university community anytime, anywhere, for free.</h1>
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
                @csrf
                <!-- Email -->
                <div class="mb-5">
                    <div class="relative">
                        <input type="email" id="email" name="email" aria-describedby="outlined_error_email" class="block px-2.5 pb-2.5 pt-4 w-full text-xl text-gray-900 bg-transparent rounded-lg border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-400 focus:outline-none focus:ring-0 focus:border-orange-500 peer @error('email') is-invalid @enderror" placeholder=" " value="{{ old('email') }}" required/>
                        <label for="email" class="absolute text-2xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-orange-400 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-6 start-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            {{ __('Email') }}
                        </label>
                    </div>
                    @error('email')
                        <p id="outlined_error_email" class="mt-2 text-xs text-red-700 dark:text-red-500">
                            <span class="font-medium">
                                {{ $message }}
                            </span>
                        </p>
                    @enderror
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <div class="relative">
                        <input type="password" id="password" name="password" aria-describedby="outlined_error_password" class="block px-2.5 pb-2.5 pt-4 w-full text-xl text-gray-900 bg-transparent rounded-lg border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-orange-400 focus:outline-none focus:ring-0 focus:border-orange-500 peer @error('password') is-invalid @enderror" placeholder=" " value="{{ old('password') }}" required/>
                        <label for="password" class="absolute text-2xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-orange-400 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-6 start-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            {{ __('Password') }}
                        </label>
                    </div>
                    @error('password')
                        <p id="outlined_error_password" class="mt-2 text-xs text-red-700 dark:text-red-500">
                            <span class="font-medium">
                                {{ $message }}
                            </span>
                        </p>
                    @enderror
                </div>
                <!-- Login Button -->
                <div class="flex justify-center mb-4">
                    <button type="submit" class="w-full py-3 text-2xl bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl text-white font-semibold rounded-md transition-colors duration-300">{{ __('Login') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection


