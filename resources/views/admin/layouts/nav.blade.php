<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @if (Route::currentRouteName() == 'login')
                Admin Login
            @elseif (Route::currentRouteName() == 'admin.dashboard')
                Admin Dashboard
            @else
                ZPPSU E-Market
            @endif
        </title>

        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>

        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body x-data="sidebar()" class="antialiased" @resize.window="handleResize()">
        <div class="xl:flex">
            <!-- Sidebar -->
            <aside
                @click.away="handleAway()"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-x-0"
                x-transition:leave-end="opacity-0 transform -translate-x-full"
                x-show="isOpen()"
                class="fixed xl:static inset-0 flex bg-white backdrop:filter backdrop-blur-md bg-opacity-75 h-screen z-40">
                <div @click.away="handleAway()" class="xl:w-80 w-96 h-screen text-gray-800 bg-white dark:bg-gray-900 top-0 left-0">
                    <div class="flex flex-wrap flex-col justify-center items-center cursor-pointer pt-24">
                        <div class="bg-gray-300 w-12 h-12 rounded-full flex items-center justify-center font-bold text-black text-xl">
                            <span>A</span>
                        </div>
                        <div class="text-center mt-4">
                            <p class="text-base dark:text-white">{{ auth()->user()->first_name }}</p>
                            <p class="text-xs dark:text-gray-300 mt-0.5">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <hr class="mt-6 border-gray-200 dark:border-gray-600" />
                    <ul class="space-y-2 mt-8 mx-2">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" wire:navigate class="flex items-center px-4 py-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                                    <path d="M197.332 170.668h-160C16.746 170.668 0 153.922 0 133.332v-96C0 16.746 16.746 0 37.332 0h160c20.59 0 37.336 16.746 37.336 37.332v96c0 20.59-16.746 37.336-37.336 37.336zM37.332 32A5.336 5.336 0 0 0 32 37.332v96a5.337 5.337 0 0 0 5.332 5.336h160a5.338 5.338 0 0 0 5.336-5.336v-96A5.337 5.337 0 0 0 197.332 32zm160 480h-160C16.746 512 0 495.254 0 474.668v-224c0-20.59 16.746-37.336 37.332-37.336h160c20.59 0 37.336 16.746 37.336 37.336v224c0 20.586-16.746 37.332-37.336 37.332zm-160-266.668A5.337 5.337 0 0 0 32 250.668v224A5.336 5.336 0 0 0 37.332 480h160a5.337 5.337 0 0 0 5.336-5.332v-224a5.338 5.338 0 0 0-5.336-5.336zM474.668 512h-160c-20.59 0-37.336-16.746-37.336-37.332v-96c0-20.59 16.746-37.336 37.336-37.336h160c20.586 0 37.332 16.746 37.332 37.336v96C512 495.254 495.254 512 474.668 512zm-160-138.668a5.338 5.338 0 0 0-5.336 5.336v96a5.337 5.337 0 0 0 5.336 5.332h160a5.336 5.336 0 0 0 5.332-5.332v-96a5.337 5.337 0 0 0-5.332-5.336zm160-74.664h-160c-20.59 0-37.336-16.746-37.336-37.336v-224C277.332 16.746 294.078 0 314.668 0h160C495.254 0 512 16.746 512 37.332v224c0 20.59-16.746 37.336-37.332 37.336zM314.668 32a5.337 5.337 0 0 0-5.336 5.332v224a5.338 5.338 0 0 0 5.336 5.336h160a5.337 5.337 0 0 0 5.332-5.336v-224A5.336 5.336 0 0 0 474.668 32zm0 0" data-original="#000000" />
                                </svg>
                            <span class="ms-3">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('all.users') }}" wire:navigate class="flex items-center px-4 py-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                                    <path
                                        d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                                        data-original="#000000" />
                                </svg>
                                <span class="ms-3">All users</span>
                            </a>
                        </li>
                        <li x-data="{ expanded: false }">
                            <button @click="expanded = ! expanded" type="button" class="flex items-center w-full px-4 py-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>

                                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">List</span>

                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>

                            <div x-show="expanded" x-collapse>
                                <ul class="py-2 space-y-2">
                                    <li>
                                        <a href="{{ route('products') }}" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            Products
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('services') }}" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            Services
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('posts') }}" wire:navigate class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            Posts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('trades') }}" wire:navigate
                                            class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            Tradings
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <hr class="my-8 border-gray-200 dark:border-gray-600" />
                    <ul class="space-y-3">
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" wire:navigate class="text-gray-700 text-sm flex items-center dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-900 rounded px-4 py-3 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4" viewBox="0 0 6.35 6.35">
                                    <path d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z" />
                                </svg>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Navbar -->
                <nav class="flex flex-wrap items-center justify-between backdrop-filter backdrop-blur-lg bg-opacity-40 bg-white fixed left-0 right-0 top-0 sm:px-10 px-6 py-1 lg:gap-y-4 gap-y-6 gap-x-4  z-50 w-full dark:bg-gray-900 dark:backdrop:filter dark:backdrop-blur-4xl dark:bg-opacity-70">
                    <div class="flex items-center">
                        <!-- Button to open sidebar, visible when sidebar is closed -->
                        <button type="button" x-show="!isOpen()" @click.prevent="handleOpen()" class="p-3 hover:bg-gray-200 dark:text-white rounded-md">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>

                        <!-- Button to close sidebar, visible when sidebar is open -->
                        <button @click.prevent="handleClose()" x-show="isOpen()" class="p-3 hover:bg-gray-200 dark:text-white rounded-md flex items-center" type="button">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <div class="rounded-md">
                            <h1 class="text-2xl font-bold ml-4 w-36 text-[#333] dark:text-[#fff]">
                                Admin Panel
                            </h1>
                        </div>
                    </div>
                    {{-- <div class="bg-gray-100 backdrop-filter backdrop-blur-lg bg-opacity-60 dark:bg-gray-800 dark:backdrop:filter dark:backdrop-blur-4xl dark:bg-opacity-40 flex max-md:order-1 px-4 rounded-sm h-11 lg:w-2/4 max-md:w-full mx-auto my-2 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px" class="fill-gray-400 mr-4 rotate-90">
                            <path d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z"></path>
                        </svg>
                        <input type='email' placeholder='Search...' class="w-full text-gray-600 dark:text-gray-200 border-none outline-none focus:outline-none focus:ring-0 focus:border-transparent bg-transparent" />
                    </div> --}}
                    <div class='flex items-center space-x-8 max-md:ml-auto'>
                        <a href="{{ route('admin.dashboard') }}" wire:navigate x-on:click.prevent="$dispatch('pageNavigated')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20px" class="cursor-pointer fill-[#333] dark:fill-[#fff] hover:fill-[#077bff]" viewBox="0 0 511 511.999">
                                <path d="M498.7 222.695c-.016-.011-.028-.027-.04-.039L289.805 13.81C280.902 4.902 269.066 0 256.477 0c-12.59 0-24.426 4.902-33.332 13.809L14.398 222.55c-.07.07-.144.144-.21.215-18.282 18.386-18.25 48.218.09 66.558 8.378 8.383 19.44 13.235 31.273 13.746.484.047.969.07 1.457.07h8.32v153.696c0 30.418 24.75 55.164 55.168 55.164h81.711c8.285 0 15-6.719 15-15V376.5c0-13.879 11.293-25.168 25.172-25.168h48.195c13.88 0 25.168 11.29 25.168 25.168V497c0 8.281 6.715 15 15 15h81.711c30.422 0 55.168-24.746 55.168-55.164V303.14h7.719c12.586 0 24.422-4.903 33.332-13.813 18.36-18.367 18.367-48.254.027-66.633zm-21.243 45.422a17.03 17.03 0 0 1-12.117 5.024h-22.72c-8.285 0-15 6.714-15 15v168.695c0 13.875-11.289 25.164-25.168 25.164h-66.71V376.5c0-30.418-24.747-55.168-55.169-55.168H232.38c-30.422 0-55.172 24.75-55.172 55.168V482h-66.71c-13.876 0-25.169-11.29-25.169-25.164V288.14c0-8.286-6.715-15-15-15H48a13.9 13.9 0 0 0-.703-.032c-4.469-.078-8.66-1.851-11.8-4.996-6.68-6.68-6.68-17.55 0-24.234.003 0 .003-.004.007-.008l.012-.012L244.363 35.02A17.003 17.003 0 0 1 256.477 30c4.574 0 8.875 1.781 12.113 5.02l208.8 208.796.098.094c6.645 6.692 6.633 17.54-.031 24.207zm0 0" data-original="#000000" />
                            </svg>
                        </a>
                        {{-- <button class="hover:bg-slate-100 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-[#333] dark:text-[#fff] hover:text-[#077bff]" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                        </button> --}}
                        <div
                            x-data="{
                                open: false,
                                toggle() {
                                    if (this.open) {
                                        return this.close()
                                    }
                                    this.$refs.button.focus()
                                    this.open = true
                                },
                                close(focusAfter) {
                                    if (! this.open) return
                                    this.open = false
                                    focusAfter && focusAfter.focus()
                                }
                            }"
                            x-on:keydown.escape.prevent.stop="close($refs.button)"
                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                            x-id="['dropdown-button']"
                            class="relative"
                        >
                            <button class="cursor-pointer" x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-[#333] dark:text-[#fff] hover:text-[#077bff]" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </button>
                            <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                style="display: none;" class="absolute right-0 mt-2 w-56 p-2 rounded-md bg-white shadow-md divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <div class="px-4 py-3 mb-1 hover:bg-gray-50 dark:hover:bg-gray-700 hover:rounded-md">
                                    <a href="#" wire:navigate x-on:click.prevent="$dispatch('pageNavigated')">
                                        <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                                    </a>
                                </div>
                                <ul class="divide-y dark:divide-gray-700">
                                    <li>
                                        <a href="#" wire:navigate x-on:click.prevent="$dispatch('pageNavigated')" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 my-1 text-left text-sm hover:bg-gray-50 hover:rounded-md disabled:text-gray-500 dark:text-gray-300 dark:hover:bg-gray-700">
                                            Settings
                                        </a>
                                    </li>
                                    <li>
                                        <div
                                            x-data="{
                                                mode: '',
                                                toggleMode() {
                                                    this.mode = this.mode === 'dark' ? 'light' : 'dark';
                                                    this.setColorMode(this.mode);
                                                },
                                                setColorMode(m) {
                                                    if (m === 'dark') {
                                                        document.documentElement.classList.add('dark');
                                                        localStorage.setItem('colorMode', 'dark');
                                                    } else {
                                                        document.documentElement.classList.remove('dark');
                                                        localStorage.setItem('colorMode', 'light');
                                                    }
                                                }
                                            }"
                                            x-init="() => {
                                                this.mode = localStorage.getItem('colorMode') || 'light';
                                                this.setColorMode(this.mode);
                                            }"
                                        >
                                            <label class="inline-flex items-center cursor-pointer px-4 py-2.5 dark:hover:bg-gray-700 w-full hover:rounded-md my-1">
                                                <input type="checkbox"
                                                    @click="toggleMode"
                                                    :checked="mode === 'dark'"
                                                    class="sr-only peer">
                                                <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                <span class="ms-3 text-sm text-gray-900 dark:text-gray-300">
                                                <span x-text="mode === 'dark' ? 'Light mode' : 'Dark mode'"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="{{ route('logout') }}" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 my-1 text-left text-sm hover:bg-gray-50 dark:hover:bg-gray-700 hover:rounded-md disabled:text-gray-500"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="text-red-600 dark:text-red-400">Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- Main Section -->
                <main class="p-4 dark:bg-gray-900">
                    @yield('content')
                </main>
            </div>
        </div>

        <script>
            function sidebar() {
                const breakpoint = 1280;
                return {
                    open: {
                        above: true,
                        below: false,
                    },
                    isAboveBreakpoint: window.innerWidth > breakpoint,

                    handleResize() {
                        this.isAboveBreakpoint = window.innerWidth > breakpoint;
                    },

                    isOpen() {
                        return this.isAboveBreakpoint ? this.open.above : this.open.below;
                    },
                    handleOpen() {
                        if (this.isAboveBreakpoint) {
                            this.open.above = true;
                        }
                        this.open.below = true;
                    },
                    handleClose() {
                        if (this.isAboveBreakpoint) {
                            this.open.above = false;
                        }
                        this.open.below = false;
                    },
                    handleAway() {
                        if (!this.isAboveBreakpoint) {
                            this.open.below = false;
                        }
                    },
                };
            }
        </script>
        @livewireScripts
    </body>
</html>
