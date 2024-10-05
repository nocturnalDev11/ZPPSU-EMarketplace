@extends('users.layouts.nav')

@section('content')
    <section class="pt-48 h-screen dark:bg-gray-900">
        <div class="container flex flex-col justify-center mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
            <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left dark:text-gray-300">
                <h1 class="text-5xl font-bold leading-none sm:text-6xl">ZPPSU<br>
                    <span class="light:text-violet-600">E-Marketplace</span>
                </h1>
                <p class="mt-6 mb-8 text-lg sm:mb-12">Empowering Innovation and Entrepreneurship at ZPPSU:
                    <br class="hidden md:inline lg:hidden">Discover the ZPPSU E-Marketplace - Your Hub for Student
                    Creativity and Marketable Solutions."
                </p>
                <div
                    x-data="{ modelOpen: false }"
                    class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start"
                >
                    <button @click="modelOpen =!modelOpen" class="px-8 py-3 text-lg font-semibold rounded bg-gradient-to-br from-red-700 to-orange-400 hover:bg-gradient-to-bl text-gray-50">
                        Get started
                    </button>

                    <div x-show="modelOpen" class="fixed inset-0 z-50 flex items-center justify-center" aria-labelledby="modal-title"
                        role="dialog" aria-modal="true">
                        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-500 z-100 bg-opacity-40 backdrop:filter backdrop-blur-md dark:bg-gray-700 dark:bg-opacity-60 dark:backdrop:filter dark:backdrop-blur-md" aria-hidden="true">
                        </div>

                        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block p-5 overflow-hidden text-left transition-all transform bg-white rounded-lg sm:w-1/4 w-3/6 shadow-xl">

                            <div class="flex items-center justify-end">
                                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <form action="{{ route('send.credentials') }}" method="POST"
                                class="flex flex-col items-center xl:flex-row lg:flex-row md:flex-col p-4">
                                @csrf
                                <div class="w-full md:mt-0">
                                    <p class="mb-4 text-md text-gray-800">Please enter the email address below. We will send your account
                                        credentials to this email. Use this as you log in.</p>

                                    <div class="col-span-2">
                                        <label for="email" class="block text-sm text-gray-500 dark:text-gray-200">Email</label>
                                        <input type="email" id="email" name="email" required
                                            class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-gray-400 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40"
                                            placeholder="Enter your registered email address">
                                    </div>

                                    <div class="flex justify-b mt-6">
                                        <button type="submit"
                                            class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg- rounded-md bg-gradient-to-br from-red-700 to-orange-400 hover:bg-gradient-to-bl focus:outline-none focus:ring-none">
                                            Send Credentials
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-65 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                <img src="{{ asset('storage/svg/front-page.svg') }}" alt="image">
            </div>
        </div>
    </section>
@endsection
