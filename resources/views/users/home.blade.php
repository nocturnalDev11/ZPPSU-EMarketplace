@extends('users.layouts.nav')
@section('content')
@include('users.layouts.side-nav')
<div class="bg-white pt-14">
    <div class="container h-full xl:ml-80 lg:ml-80 md:ml-0 ml-0 p-4 pt-20 mx-auto">
        <div class="relative bg-gradient-to-br from-red-50 via-purple-50 to-gray-100 md:py-10 py-10 rounded-lg">
            <div class="px-4 md:px-10 mx-auto w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <!-- Card 1 -->
                    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg h-52">
                        <div class="flex-auto p-4 flex flex-col justify-between h-full">
                            <div>
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-700 uppercase font-bold text-md">PRODUCTS</h5>
                                        <span class="font-semibold text-sm text-gray-500">
                                            Browse through a variety of products available for sale within the university community.
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l">
                                            <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path fill="#ffffff" fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('lists.products.index') }}" wire:navigate class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                All products
                            </a>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg h-52">
                        <div class="flex-auto p-4 flex flex-col justify-between h-full">
                            <div>
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-700 uppercase font-bold text-md">SERVICES</h5>
                                        <span class="font-semibold text-sm text-gray-500">
                                            Discover a wide range of services offered by your peers and faculty.
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl">
                                            <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path fill="#ffffff" fill-rule="evenodd" d="M12 2a7 7 0 0 0-7 7 3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V9a5 5 0 1 1 10 0v7.083A2.919 2.919 0 0 1 14.083 19H14a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a2 2 0 0 0 1.732-1h.351a4.917 4.917 0 0 0 4.83-4H19a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3 7 7 0 0 0-7-7Zm1.45 3.275a4 4 0 0 0-4.352.976 1 1 0 0 0 1.452 1.376 2.001 2.001 0 0 1 2.836-.067 1 1 0 1 0 1.386-1.442 4 4 0 0 0-1.321-.843Z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('lists.services.index') }}" wire:navigate class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                All services
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg h-52">
                        <div class="flex-auto p-4 flex flex-col justify-between h-full">
                            <div>
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-700 uppercase font-bold text-md">POSTS</h5>
                                        <span class="font-semibold text-sm text-gray-500">
                                            Explore the latest listings and announcements from fellow students, staff, and faculty.
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl">
                                            <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill="#ffffff" fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('lists.posts.index') }}" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                All posts
                            </a>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg h-52">
                        <div class="flex-auto p-4 flex flex-col justify-between h-full">
                            <div>
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-gray-700 uppercase font-bold text-md">TRADES</h5>
                                        <span class="font-semibold text-sm text-gray-500">
                                            Manage your transactions and profile settings conveniently.
                                        </span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl">
                                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true" viewBox="0 0 24 24">
                                                <path fill="#ffffff" d="m13,2C13,.895,13.895,0,14.999,0l4.001-.002c1.105,0,2.001.895,2.001,2v2.005c0,1.104-.894,1.999-1.998,2l-2.498.002-2.288,1.87c-.526.336-1.215-.041-1.215-.665l-.002-5.209Zm-2,0C11,.895,10.105,0,9.001,0l-4.001-.002c-1.105,0-2.001.895-2.001,2v2.005c0,1.104.894,1.999,1.998,2l2.498.002,2.288,1.87c.526.336,1.215-.041,1.215-.665l.002-5.209Zm12,9.003c.552,0,1,.448,1,1v7c0,.552-.448,1-1,1h-2.814l-7.188-6.436-2.309,2.142c-.207.208-.493.315-.788.29-.298-.024-.56-.175-.739-.425-.274-.38-.19-.975.181-1.347l3.369-3.302c.667-.627,1.397-.923,2.288-.923.662,0,1.65.297,2.403.594.69.273,1.424.406,2.166.406h3.431Zm-9.993,5.255l4.778,4.279-3.381,2.639c-.687.536-1.533.827-2.404.827h0c-.871,0-1.717-.291-2.404-.827l-2.98-2.326c-.703-.549-1.569-.847-2.461-.847H1c-.552,0-1-.448-1-1v-7c0-.552.448-1,1-1h3.521c.768,0,1.525-.149,2.238-.434s1.578-.566,2.218-.566c.526,0,1.025.126,1.482.34l-2.533,2.473c-1.066,1.068-1.232,2.759-.389,3.926.52.724,1.321,1.179,2.192,1.25.086.008.173.012.259.012.792,0,1.549-.312,2.084-.85l.935-.895Z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('lists.trades.index') }}" type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                All trades
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-none w-full max-w-full mt-6">
            <!-- Product -->
            <div class="relative px-6 py-3 flex flex-col min-w-0 mb-6 break-words bg-gradient-to-br from-red-50 via-purple-50 to-gray-100 border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-lg bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-2xl">
                    <h2 class="mb-1 text-xl dark:text-white">Products</h2>
                </div>
                @if ($products->isEmpty())
                    <div class="mx-auto max-w-screen-sm text-center">
                        <img src="{{ asset('storage/svg/products_section.svg') }}" alt="Illustration of empty products section" class="mx-auto block w-80 h-80 mb-4">
                        <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl">Products section empty</p>
                        <p class="mb-4 text-lg font-light text-gray-500">There are no products available in this section. Add some products to continue.</p>
                    </div>
                @else
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <!-- Product Item -->
                            @foreach ($products as $product)
                                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border">
                                        <div class="relative">
                                            <a href="{{ route('products.show', $product->id) }}" wire:navigate class="block shadow-lg rounded-2xl">
                                                <img src="{{ asset('storage/' . $product->prod_picture) }}" alt="{{ $product->prod_name }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                                            </a>
                                        </div>
                                        <div class="flex-auto px-1 pt-6">
                                            <a href="{{ route('products.show', $product->id) }}" wire:navigate>
                                                <h5 class="dark:text-white">{{ $product->prod_name }}</h5>
                                            </a>
                                            <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                                                ₱{{ $product->prod_price }}
                                            </p>
                                            <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{{ $product->prod_description }}</p>
                                            <div class="flex items-center justify-between">
                                                <a href="{{ route('products.show', $product->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                                                    View product
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Service -->
            <div class="relative px-6 py-3 flex flex-col min-w-0 mb-6 break-words bg-gradient-to-br from-red-50 via-purple-50 to-gray-100 border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-lg bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-2xl">
                    <h2 class="mb-1 text-xl dark:text-white">Services</h2>
                </div>
                @if ($services->isEmpty())
                    <div class="mx-auto max-w-screen-sm text-center">
                        <img src="{{ asset('storage/svg/services_section.svg') }}" alt="Illustration of empty services section" class="mx-auto block w-80 h-80 mb-4">
                        <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl">Services section empty</p>
                        <p class="mb-4 text-lg font-light text-gray-500">There are no services available in this section. Add some services to continue.</p>
                    </div>
                @else
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <!-- Product Item -->
                            @foreach ($services as $service)
                                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border">
                                        @if ($service->services_picture)
                                            <div class="relative">
                                                <a class="block shadow-lg rounded-2xl">
                                                    <img src="{{ asset('storage/' . $service->services_picture) }}" alt="{{ $service->services_title }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                                                </a>
                                            </div>
                                        @else
                                            <div class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center h-44 shadow-soft-xl">
                                                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <defs>
                                                        <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                                            <stop offset="0%" style="stop-color:#EC4899;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#FB923C;stop-opacity:1" />
                                                        </linearGradient>
                                                    </defs>
                                                    <path fill="url(#grad2)" fill-rule="evenodd" d="M12 2a7 7 0 0 0-7 7 3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V9a5 5 0 1 1 10 0v7.083A2.919 2.919 0 0 1 14.083 19H14a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a2 2 0 0 0 1.732-1h.351a4.917 4.917 0 0 0 4.83-4H19a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3 7 7 0 0 0-7-7Zm1.45 3.275a4 4 0 0 0-4.352.976 1 1 0 0 0 1.452 1.376 2.001 2.001 0 0 1 2.836-.067 1 1 0 1 0 1.386-1.442 4 4 0 0 0-1.321-.843Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                                            </div>
                                        @endif
                                        <div class="flex-auto px-1 pt-6">
                                            <a href="{{ route('services.show', $service->id) }}" wire:navigate>
                                                <h5 class="dark:text-white">{{ $service->services_title }}</h5>
                                            </a>
                                            <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                                                ₱{{ $service->services_fee }}
                                            </p>
                                            <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{!! nl2br(e($service->services_description)) !!}</p>
                                            <div class="flex items-center justify-between">
                                                <a href="{{ route('services.show', $service->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                                                    View service
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Posts -->
            <div class="relative px-6 py-3 flex flex-col min-w-0 mb-6 break-words bg-gradient-to-br from-red-50 via-purple-50 to-gray-100 border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-lg bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-2xl">
                    <h2 class="mb-1 text-xl dark:text-white">Posts</h2>
                </div>
                @if ($posts->isEmpty())
                    <div class="mx-auto max-w-screen-sm text-center">
                        <img src="{{ asset('storage/svg/post_section.svg') }}" alt="Illustration of empty posts section" class="mx-auto block w-80 h-80 mb-4">
                        <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl">Posts section empty</p>
                        <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-200">There are no posts available in this section. Add some posts to continue.</p>
                    </div>
                @else
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <!-- Post Item -->
                            @foreach ($posts as $post)
                                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border">
                                        @if ($post->post_picture)
                                            <div class="relative">
                                                <a class="block shadow-lg rounded-2xl">
                                                    <img src="{{ asset('storage/' . $post->post_picture) }}" alt="{{ $post->post_title }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                                                </a>
                                            </div>
                                        @else
                                            <div class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center h-44 shadow-soft-xl">
                                                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <defs>
                                                        <linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%">
                                                            <stop offset="0%" style="stop-color:#7e22ce;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                                                        </linearGradient>
                                                    </defs>
                                                    <path fill="url(#grad3)" fill-rule="evenodd" d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z" clip-rule="evenodd"/>
                                                </svg>
                                                <span class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                                            </div>
                                        @endif
                                        <div class="flex-auto px-1 pt-6">
                                            <a href="{{ route('posts.show', $post->id) }}" wire:navigate>
                                                <h5 class="dark:text-white">{{ $post->post_title }}</h5>
                                            </a>
                                            <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                                                {{ $post->post_list_type }}
                                            </p>
                                            <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{!! nl2br(e($post->post_content)) !!}</p>
                                            <div class="flex items-center justify-between">
                                                <a href="{{ route('posts.show', $post->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                                                    View post
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Tradings -->
            <div class="relative px-6 py-3 flex flex-col min-w-0 mb-6 break-words bg-gradient-to-br from-red-50 via-purple-50 to-gray-100 border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-lg bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-2xl">
                    <h2 class="mb-1 text-xl dark:text-white">Tradings</h2>
                </div>
                @if ($trades->isEmpty())
                    <div class="mx-auto max-w-screen-sm text-center">
                        <img src="{{ asset('storage/svg/trading_section.svg') }}" alt="Illustration of empty posts section" class="mx-auto block w-80 h-80 mb-4">
                        <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl">Trading section empty</p>
                        <p class="mb-4 text-lg font-light text-gray-500">There are no tradings available in this section. Add some tradings to continue.</p>
                    </div>
                @else
                    <div class="flex-auto p-4">
                        <div class="flex flex-wrap -mx-3">
                            <!-- Post Item -->
                            @foreach ($trades as $trade)
                                <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                                    <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border">
                                        @if ($trade->trade_picture)
                                            <div class="relative">
                                                <a class="block shadow-lg rounded-2xl">
                                                    <img src="{{ asset('storage/' . $trade->trade_picture) }}" alt="{{ $trade->trade_title }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                                                </a>
                                            </div>
                                        @else
                                            <div class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center h-44 shadow-soft-xl">
                                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true" viewBox="0 0 24 24">
                                                    <defs>
                                                        <linearGradient id="grad4" x1="0%" y1="0%" x2="100%" y2="100%">
                                                            <stop offset="0%" style="stop-color:#4ade80;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#2563eb;stop-opacity:1" />
                                                        </linearGradient>
                                                    </defs>
                                                    <path fill="url(#grad4)" d="m13,2C13,.895,13.895,0,14.999,0l4.001-.002c1.105,0,2.001.895,2.001,2v2.005c0,1.104-.894,1.999-1.998,2l-2.498.002-2.288,1.87c-.526.336-1.215-.041-1.215-.665l-.002-5.209Zm-2,0C11,.895,10.105,0,9.001,0l-4.001-.002c-1.105,0-2.001.895-2.001,2v2.005c0,1.104.894,1.999,1.998,2l2.498.002,2.288,1.87c.526.336,1.215-.041,1.215-.665l.002-5.209Zm12,9.003c.552,0,1,.448,1,1v7c0,.552-.448,1-1,1h-2.814l-7.188-6.436-2.309,2.142c-.207.208-.493.315-.788.29-.298-.024-.56-.175-.739-.425-.274-.38-.19-.975.181-1.347l3.369-3.302c.667-.627,1.397-.923,2.288-.923.662,0,1.65.297,2.403.594.69.273,1.424.406,2.166.406h3.431Zm-9.993,5.255l4.778,4.279-3.381,2.639c-.687.536-1.533.827-2.404.827h0c-.871,0-1.717-.291-2.404-.827l-2.98-2.326c-.703-.549-1.569-.847-2.461-.847H1c-.552,0-1-.448-1-1v-7c0-.552.448-1,1-1h3.521c.768,0,1.525-.149,2.238-.434s1.578-.566,2.218-.566c.526,0,1.025.126,1.482.34l-2.533,2.473c-1.066,1.068-1.232,2.759-.389,3.926.52.724,1.321,1.179,2.192,1.25.086.008.173.012.259.012.792,0,1.549-.312,2.084-.85l.935-.895Z"/>
                                                </svg>
                                                <span class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                                            </div>
                                        @endif
                                        <div class="flex-auto px-1 pt-6">
                                            <a href="{{ route('trades.show', $trade->id) }}" wire:navigate>
                                                <h5 class="dark:text-white">{{ $trade->trade_title }}</h5>
                                            </a>
                                            <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                                                {{ $trade->trade_status }}
                                            </p>
                                            <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{!! nl2br(e($trade->trade_description)) !!}</p>
                                            <div class="flex items-center justify-between">
                                                <a href="{{ route('trades.show', $trade->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                                                    View trading
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div x-data="{ open: false }" class="fixed end-6 bottom-6 group">
            <div x-show="open" @click.outside="open = false" class="flex flex-col items-center mb-4 space-y-2">
                <button type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-lg border border-gray-200 hover:text-gray-900 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <svg class="w-5 h-5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M14.419 10.581a3.564 3.564 0 0 0-2.574 1.1l-4.756-2.49a3.54 3.54 0 0 0 .072-.71 3.55 3.55 0 0 0-.043-.428L11.67 6.1a3.56 3.56 0 1 0-.831-2.265c.006.143.02.286.043.428L6.33 6.218a3.573 3.573 0 1 0-.175 4.743l4.756 2.491a3.58 3.58 0 1 0 3.508-2.871Z" />
                    </svg>
                    <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -start-14 top-1/2">Share</span>
                </button>
                <button type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-lg border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <svg class="w-5 h-5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z" />
                        <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z" />
                    </svg>
                    <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -start-14 top-1/2">Print</span>
                </button>
                <button type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-lg border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <svg class="w-5 h-5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                        <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -start-14 top-1/2">Save</span>
                </button>
                <button type="button" class="relative w-[52px] h-[52px] text-gray-500 bg-white rounded-lg border border-gray-200 dark:border-gray-600 hover:text-gray-900 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
                    <svg class="w-5 h-5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M5 9V4.13a2.96 2.96 0 0 0-1.293.749L.879 7.707A2.96 2.96 0 0 0 .13 9H5Zm11.066-9H9.829a2.98 2.98 0 0 0-2.122.879L7 1.584A.987.987 0 0 0 6.766 2h4.3A3.972 3.972 0 0 1 15 6v10h1.066A1.97 1.97 0 0 0 18 14V2a1.97 1.97 0 0 0-1.934-2Z" />
                        <path d="M11.066 4H7v5a2 2 0 0 1-2 2H0v7a1.969 1.969 0 0 0 1.933 2h9.133A1.97 1.97 0 0 0 13 18V6a1.97 1.97 0 0 0-1.934-2Z" />
                    </svg>
                    <span class="absolute block mb-px text-sm font-medium -translate-y-1/2 -start-14 top-1/2">Copy</span>
                </button>
            </div>
            <button @click="open = !open" class="flex items-center justify-center text-white bg-blue-700 rounded-lg w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                <svg class="w-5 h-5 transition-transform" :class="{'rotate-45': open, 'rotate-0': !open}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                </svg>
                <span class="sr-only">Open actions menu</span>
            </button>
        </div>
    </div>
</div>
@endsection
