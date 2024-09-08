<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        ZPPSU E-Market
    </title>

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.4.2/uicons-regular-rounded/css/uicons-regular-rounded.css">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div id="app">
        <nav class="backdrop-filter backdrop-blur-lg bg-opacity-40 bg-white fixed left-0 right-0 top-0 z-50 dark:bg-gray-900 dark:backdrop:filter dark:backdrop-blur-4xl dark:bg-opacity-70">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-1">
                <a href="{{ route('users.home') }}" wire:navigate class="flex items-center space-x-3 rtl:space-x-reverse">
                    <svg class="size-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M5.535 7.677c.313-.98.687-2.023.926-2.677H17.46c.253.63.646 1.64.977 2.61.166.487.312.953.416 1.347.11.42.148.675.148.779 0 .18-.032.355-.09.515-.06.161-.144.3-.243.412-.1.111-.21.192-.324.245a.809.809 0 0 1-.686 0 1.004 1.004 0 0 1-.324-.245c-.1-.112-.183-.25-.242-.412a1.473 1.473 0 0 1-.091-.515 1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.401 1.401 0 0 1 13 9.736a1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.4 1.4 0 0 1 9 9.74v-.008a1 1 0 0 0-2 .003v.008a1.504 1.504 0 0 1-.18.712 1.22 1.22 0 0 1-.146.209l-.007.007a1.01 1.01 0 0 1-.325.248.82.82 0 0 1-.316.08.973.973 0 0 1-.563-.256 1.224 1.224 0 0 1-.102-.103A1.518 1.518 0 0 1 5 9.724v-.006a2.543 2.543 0 0 1 .029-.207c.024-.132.06-.296.11-.49.098-.385.237-.85.395-1.344ZM4 12.112a3.521 3.521 0 0 1-1-2.376c0-.349.098-.8.202-1.208.112-.441.264-.95.428-1.46.327-1.024.715-2.104.958-2.767A1.985 1.985 0 0 1 6.456 3h11.01c.803 0 1.539.481 1.844 1.243.258.641.67 1.697 1.019 2.72a22.3 22.3 0 0 1 .457 1.487c.114.433.214.903.214 1.286 0 .412-.072.821-.214 1.207A3.288 3.288 0 0 1 20 12.16V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2v-6.888ZM13 15a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="self-center text-gray-800 text-2xl font-semibold whitespace-nowrap dark:text-white">ZPPSU E-Marketplace</span>
                </a>
                <div class="flex md:order-2">
                    <div class="flex justify-end">
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
                            <!-- Button -->
                            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')" type="button"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-700">
                                <span class="sr-only">Open user menu</span>
                                @if(Auth::user()->profile_picture)
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="user photo">
                                @else
                                    <div class="relative inline-flex items-center justify-center w-8 h-8 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-700">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">
                                            {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                            </button>

                            <!-- Dropdown panel -->
                            <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                style="display: none;" class="absolute right-0 mt-2 w-56 p-2 rounded-md bg-white shadow-md divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <div class="px-4 py-3 mb-1 hover:bg-gray-50 dark:hover:bg-gray-700 hover:rounded-md">
                                    <a href="{{ route('users.profile') }}" wire:navigate x-on:click.prevent="$dispatch('pageNavigated')">
                                        <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                                    </a>
                                </div>

                                <ul class="divide-y dark:divide-gray-700">
                                    <li>
                                        <a href="{{ route('messages.index') }}" wire:navigate x-on:click.prevent="$dispatch('pageNavigated')" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 my-1 text-left text-sm hover:bg-gray-50 hover:rounded-md disabled:text-gray-500 dark:text-gray-300 dark:hover:bg-gray-700">
                                            Inbox
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}" wire:navigate x-on:click.prevent="$dispatch('pageNavigated')" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 my-1 text-left text-sm hover:bg-gray-50 hover:rounded-md disabled:text-gray-500 dark:text-gray-300 dark:hover:bg-gray-700">
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
                </div>
                <div class="items-center justify-between hidden w-3/5 md:flex md:order-1" id="navbar-search">
                    @livewire('lists.search')
                </div>
            </div>
        </nav>

        <!-- Side menu -->
        <aside class="backdrop-filter backdrop-blur-lg bg-opacity-40 bg-white xl:block lg:block md:hidden hidden fixed top-0 left-0 z-40 w-80 h-screen" aria-label="Sidenav">
            <div class="overflow-y-auto py-5 px-3 h-full mb-8 dark:bg-gray-900 pt-14">
                <ul class="flex flex-col w-full text-xl text-gray-800 font-semibold mt-7 gap-2" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" role="tablist" data-tabs-active-classes="text-red-700 hover:text-maroon bg-gray-100" data-tabs-inactive-classes="text-gray-500 hover:text-gray-600">
                    <!-- personal details tab -->
                    <li>
                        <a href="{{ route('lists.products.index') }}" wire:navigate type="button" class="flex flex-row items-center px-5 py-3 w-full rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <defs>
                                    <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#a855f7;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#ec4899;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#gradient1)" fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ms-6 dark:text-gray-300">Products</span>
                        </a>
                    </li>
                    <!-- Services -->
                    <li>
                        <a href="{{ route('lists.services.index') }}" wire:navigate type="button" class="flex flex-row items-center px-5 py-3 w-full rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#EC4899;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#FB923C;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#gradient2)" fill-rule="evenodd" d="M12 2a7 7 0 0 0-7 7 3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V9a5 5 0 1 1 10 0v7.083A2.919 2.919 0 0 1 14.083 19H14a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a2 2 0 0 0 1.732-1h.351a4.917 4.917 0 0 0 4.83-4H19a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3 7 7 0 0 0-7-7Zm1.45 3.275a4 4 0 0 0-4.352.976 1 1 0 0 0 1.452 1.376 2.001 2.001 0 0 1 2.836-.067 1 1 0 1 0 1.386-1.442 4 4 0 0 0-1.321-.843Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ms-6 dark:text-gray-300">Services</span>
                        </a>
                    </li>
                    <!-- Posts -->
                    <li>
                        <a href="{{ route('lists.posts.index') }}" wire:navigate type="button" class="flex flex-row items-center px-5 py-3 w-full rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#7e22ce;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#gradient3)" fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ms-6 dark:text-gray-300">Posts</span>
                        </a>
                    </li>
                    <!-- Tradings -->
                    <li>
                        <a href="{{ route('lists.trades.index') }}" wire:navigate type="button" class="flex flex-row items-center px-5 py-3 w-full rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="gradient4" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#4ade80;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#2563eb;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#gradient4)" d="m13,2C13,.895,13.895,0,14.999,0l4.001-.002c1.105,0,2.001.895,2.001,2v2.005c0,1.104-.894,1.999-1.998,2l-2.498.002-2.288,1.87c-.526.336-1.215-.041-1.215-.665l-.002-5.209Zm-2,0C11,.895,10.105,0,9.001,0l-4.001-.002c-1.105,0-2.001.895-2.001,2v2.005c0,1.104.894,1.999,1.998,2l2.498.002,2.288,1.87c.526.336,1.215-.041,1.215-.665l.002-5.209Zm12,9.003c.552,0,1,.448,1,1v7c0,.552-.448,1-1,1h-2.814l-7.188-6.436-2.309,2.142c-.207.208-.493.315-.788.29-.298-.024-.56-.175-.739-.425-.274-.38-.19-.975.181-1.347l3.369-3.302c.667-.627,1.397-.923,2.288-.923.662,0,1.65.297,2.403.594.69.273,1.424.406,2.166.406h3.431Zm-9.993,5.255l4.778,4.279-3.381,2.639c-.687.536-1.533.827-2.404.827h0c-.871,0-1.717-.291-2.404-.827l-2.98-2.326c-.703-.549-1.569-.847-2.461-.847H1c-.552,0-1-.448-1-1v-7c0-.552.448-1,1-1h3.521c.768,0,1.525-.149,2.238-.434s1.578-.566,2.218-.566c.526,0,1.025.126,1.482.34l-2.533,2.473c-1.066,1.068-1.232,2.759-.389,3.926.52.724,1.321,1.179,2.192,1.25.086.008.173.012.259.012.792,0,1.549-.312,2.084-.85l.935-.895Z"/>
                            </svg>
                            <span class="ms-6 dark:text-gray-300">Tradings</span>
                        </a>
                    </li>
                    <!-- Messages -->
                    <li>
                        <a href="{{ route('messages.index') }}" wire:navigate type="button" class="flex flex-row items-center px-5 py-3 w-full rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <defs>
                                    <linearGradient id="gradient5" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#FB923C;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#7e22ce;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#gradient5)" fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                            </svg>
                            <span class="ms-6 dark:text-gray-300">Messages</span>
                        </a>
                    </li>
                    <!-- User settings -->
                    <li>
                        <a href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}" wire:navigate type="button" class="flex flex-row items-center px-5 py-3 w-full rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                            <svg class="w-10 h-10 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <defs>
                                    <linearGradient id="gradient6" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#987dcc;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#4ade80;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#gradient6)" fill-rule="evenodd" d="M17 10v1.126c.367.095.714.24 1.032.428l.796-.797 1.415 1.415-.797.796c.188.318.333.665.428 1.032H21v2h-1.126c-.095.367-.24.714-.428 1.032l.797.796-1.415 1.415-.796-.797a3.979 3.979 0 0 1-1.032.428V20h-2v-1.126a3.977 3.977 0 0 1-1.032-.428l-.796.797-1.415-1.415.797-.796A3.975 3.975 0 0 1 12.126 16H11v-2h1.126c.095-.367.24-.714.428-1.032l-.797-.796 1.415-1.415.796.797A3.977 3.977 0 0 1 15 11.126V10h2Zm.406 3.578.016.016c.354.358.574.85.578 1.392v.028a2 2 0 0 1-3.409 1.406l-.01-.012a2 2 0 0 1 2.826-2.83ZM5 8a4 4 0 1 1 7.938.703 7.029 7.029 0 0 0-3.235 3.235A4 4 0 0 1 5 8Zm4.29 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h6.101A6.979 6.979 0 0 1 9 15c0-.695.101-1.366.29-2Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ms-6 dark:text-gray-300">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('users.profile') }}" wire:navigate x-on:click.prevent="$dispatch('pageNavigated')" class="flex absolute bottom-0 items-center px-5 py-3 gap-4 w-full lg:flex z-20 dark:bg-gray-800 rounded-md cursor-pointer">
                @if(Auth::user()->profile_picture)
                    <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="user photo">
                @else
                    <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <span class="font-medium text-gray-600 dark:text-gray-300">
                            {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}
                        </span>
                    </div>
                @endif
                <div class="font-medium dark:text-white">
                    <div>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        {{ auth()->user()->email }}
                    </div>
                </div>
            </a>
        </aside>
        <main class="dark:bg-gray-900">
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>
</html>
