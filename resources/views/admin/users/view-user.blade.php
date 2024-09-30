@extends('admin.layouts.nav')

@section('content')
    <div id="main-content" class="flex overflow-hidden bg-gray-50 dark:bg-gray-900 transition-all h-full">
        <div class="relative w-full overflow-y-auto pt-16">
            <main>
                <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-6">
                    <div class="col-span-full mb-5 xl:mb-0">
                        <nav class="flex mb-5" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('admin.dashboard') }}" wire:navigate
                                        class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                        <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                            </path>
                                        </svg>
                                        <span class="ml-1 text-sm font-medium text-gray-400 hover:text-gray-900 md:ml-2"
                                            aria-current="page">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <a href="{{ route('all.users') }}" wire:navigate class="ml-1 md:ml-2 text-sm font-medium text-gray-400 hover:text-gray-900">Users</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="ml-1 md:ml-2 text-sm font-medium text-gray-700 hover:text-gray-900">View user</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
                            View user
                        </h1>
                    </div>

                    <div class="col-span-full xl:col-auto">
                        <div
                            class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6 dark:bg-gray-800 dark:shadow-none">
                            <div class="sm:flex xl:block sm:space-x-4 xl:space-x-0">
                                @if($user->profile_picture)
                                <img class="mb-2 w-20 h-20 rounded-2xl shadow-lg shadow-gray-300 object-cover"
                                    src="{{ asset('storage/' . $user->profile_picture) }}"
                                    alt="{{ $user->first_name }}'s picture" />
                                @else
                                <div
                                    class="relative inline-flex items-center justify-center rounded-2xl shadow-lg shadow-gray-300 mb-2 overflow-hidden bg-gray-200 dark:bg-gray-600 w-20 h-20">
                                    <span class="p-2 font-medium text-2xl text-gray-700 dark:text-gray-300">
                                        {{ strtoupper(substr($user->first_name, 0, 1)) }}{{
                                        strtoupper(substr($user->last_name, 0, 1)) }}
                                    </span>
                                </div>
                                @endif
                                <div>
                                    <h2 class="text-xl font-bold">{{ $user->first_name }} {{ $user->last_name }}</h2>
                                    <ul class="mt-2 space-y-1">
                                        <li class="flex items-center text-md font-normal text-gray-500">
                                            <svg class="mr-2 w-4 h-4 text-gray-900" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                                    clip-rule="evenodd"></path>
                                                <path
                                                    d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
                                                </path>
                                            </svg>
                                            {{ $user->department }} department
                                        </li>
                                        <li class="flex items-center text-md font-normal text-gray-500">
                                            <svg class="mr-2 w-4 h-4 text-gray-900" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                    clip-rule="evenodd"></path>
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
                                        <a class="text-md font-medium text-gray-900"
                                            href="/cdn-cgi/l/email-protection#9aedfff8f7fbe9eeffe8dafcf6f5edf8f3eeffb4f9f5f7">
                                            <span class="__cf_email__"
                                                data-cfemail="3f46504a4d515e525a7f595350485d564b5a115c5052">{{ $user->email
                                                }}</span>
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
                                        <span class="text-gray-700 dark:text-gray-300">{{ date('M d, Y',
                                            strtotime($user->dob)) }}</span>
                                    </li>
                                    <li class="flex py-2">
                                        <span class="font-semibold w-24">Joined:</span>
                                        <span class="text-gray-700 dark:text-gray-300">{{ date('M d, Y',
                                            strtotime($user->created_at)) }}</span>
                                    </li>
                                    <li class="flex py-2">
                                        <span class="font-semibold w-24">ID:</span>
                                        <span class="text-gray-700 dark:text-gray-300">{{ $user->university_id }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                            <div class="flow-root">
                                <h3 class="text-xl font-bold">{{ $user->first_name }}'s activity</h3>
                                <div class="relative px-4">
                                    @if ($activities->isEmpty())
                                    <div class="flex items-center w-full my-6 justify-center">
                                        <p class="text-gray-400">No activities found.</p>
                                    </div>
                                    @else
                                    <div
                                        class="absolute h-full border-dashed border border-opacity-20 border-gray-600 dark:border-gray-200">
                                    </div>
                                    @foreach($activities as $activity)
                                    <!-- start::Timeline item -->
                                    <div class="flex items-center w-full my-6 -ml-1">
                                        <div class="w-1/12 z-10">
                                            <div class="w-2.5 h-2.5 bg-green-500 dark:bg-green-400 rounded-full"></div>
                                        </div>
                                        <div class="w-11/12">
                                            <p class="text-sm dark:text-white">
                                                @if($activity['type'] === 'Post')
                                                Post created: <a href="#"
                                                    class="text-green-400 dark:text-green-300 font-bold">{{
                                                    $activity['title'] }}</a>
                                                @elseif($activity['type'] === 'Product')
                                                Product listed: <a href="#"
                                                    class="text-green-400 dark:text-green-300 font-bold">{{
                                                    $activity['title'] }}</a>
                                                @elseif($activity['type'] === 'Service')
                                                Service offered: <a href="#"
                                                    class="text-green-400 dark:text-green-300 font-bold">{{
                                                    $activity['title'] }}</a>
                                                @elseif($activity['type'] === 'Trade')
                                                Trade initiated: <a href="#"
                                                    class="text-green-400 dark:text-green-300 font-bold">{{
                                                    $activity['title'] }}</a>
                                                @endif

                                            <p class="text-xs text-gray-500 dark:text-gray-300">{{
                                                \Carbon\Carbon::parse($activity['created_at'])->diffForHumans() }}</p>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end::Timeline item -->
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-2">
                        @foreach($user->products as $product)
                        <div
                            class="flex flex-col lg:flex-row items-center bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                            <img class="object-cover w-full lg:w-48 h-96 lg:h-48 rounded-lg"
                                src="{{ asset('storage/' . $product->prod_picture) }}" alt="{{ $product->prod_name }}">
                            <div class="flex flex-col w-full justify-between p-4 leading-normal">
                                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                                    $product->prod_name }}</h5>
                                <p class="font-normal text-green-600 dark:text-green-400">₱{{
                                    number_format($product->prod_price, 2) }}</p>
                                <div class="my-2">
                                    <span
                                        class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                        Category: {{ $product->prod_category }}
                                    </span>
                                    <span
                                        class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                        Condition: {{ $product->prod_condition }}
                                    </span>
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->prod_description
                                    }}</p>
                            </div>
                        </div>
                        @endforeach

                        @foreach($user->services as $service)
                        <div
                            class="flex flex-col lg:flex-row items-center bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                            @if ($service->services_picture)
                            <img class="object-cover w-full lg:w-48 h-96 lg:h-48 rounded-lg"
                                src="{{ asset('storage/' . $service->services_picture) }}"
                                alt="{{ $service->services_title }}">
                            @else
                            <div
                                class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center w-full xl:w-48 h-96 xl:h-48 shadow-soft-xl">
                                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <defs>
                                        <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#EC4899;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#FB923C;stop-opacity:1" />
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#grad2)" fill-rule="evenodd"
                                        d="M12 2a7 7 0 0 0-7 7 3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V9a5 5 0 1 1 10 0v7.083A2.919 2.919 0 0 1 14.083 19H14a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a2 2 0 0 0 1.732-1h.351a4.917 4.917 0 0 0 4.83-4H19a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3 7 7 0 0 0-7-7Zm1.45 3.275a4 4 0 0 0-4.352.976 1 1 0 0 0 1.452 1.376 2.001 2.001 0 0 1 2.836-.067 1 1 0 1 0 1.386-1.442 4 4 0 0 0-1.321-.843Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span
                                    class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                            </div>
                            @endif
                            <div class="flex flex-col w-full justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                                    $service->services_title }}</h5>
                                <p class="font-normal text-green-600 dark:text-green-400">₱{{
                                    number_format($service->services_fee, 2) }}</p>
                                <div class="my-2">
                                    <span
                                        class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                        Category: {{ $service->services_category }}
                                    </span>
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!!
                                    nl2br(e($service->services_description)) !!}</p>
                            </div>
                        </div>
                        @endforeach

                        @foreach($user->posts as $post)
                        <div
                            class="flex flex-col lg:flex-row items-center bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                            @if ($post->post_picture)
                            <img class="object-cover w-full lg:w-48 h-96 lg:h-48 rounded-lg"
                                src="{{ asset('storage/' . $post->post_picture) }}" alt="{{ $post->post_title }}">
                            @else
                            <div
                                class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center w-full lg:w-48 h-96 lg:h-48 shadow-soft-xl">
                                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <defs>
                                        <linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#7e22ce;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#3b82f6;stop-opacity:1" />
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#grad3)" fill-rule="evenodd"
                                        d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span
                                    class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                            </div>
                            @endif
                            <div class="flex flex-col w-full justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                                    $post->post_title }}</h5>
                                <div class="my-2">
                                    <span
                                        class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                        Type: {{ $post->post_list_type }}
                                    </span>
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!!
                                    nl2br(e($post->post_content)) !!}</p>
                            </div>
                        </div>
                        @endforeach

                        @foreach($user->trades as $trade)
                        <div
                            class="flex flex-col lg:flex-row items-center bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                            @if($trade->trade_picture)
                            <img class="object-cover w-full lg:w-48 h-96 lg:h-48 rounded-lg"
                                src="{{ asset('storage/' . $trade->trade_picture) }}" alt="{{ $trade->trade_title }}">
                            @else
                            <div
                                class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center w-full lg:w-48 h-96 lg:h-48 shadow-soft-xl">
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    aria-hidden="true" viewBox="0 0 24 24">
                                    <defs>
                                        <linearGradient id="grad4" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" style="stop-color:#4ade80;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#2563eb;stop-opacity:1" />
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#grad4)"
                                        d="m13,2C13,.895,13.895,0,14.999,0l4.001-.002c1.105,0,2.001.895,2.001,2v2.005c0,1.104-.894,1.999-1.998,2l-2.498.002-2.288,1.87c-.526.336-1.215-.041-1.215-.665l-.002-5.209Zm-2,0C11,.895,10.105,0,9.001,0l-4.001-.002c-1.105,0-2.001.895-2.001,2v2.005c0,1.104.894,1.999,1.998,2l2.498.002,2.288,1.87c.526.336,1.215-.041,1.215-.665l.002-5.209Zm12,9.003c.552,0,1,.448,1,1v7c0,.552-.448,1-1,1h-2.814l-7.188-6.436-2.309,2.142c-.207.208-.493.315-.788.29-.298-.024-.56-.175-.739-.425-.274-.38-.19-.975.181-1.347l3.369-3.302c.667-.627,1.397-.923,2.288-.923.662,0,1.65.297,2.403.594.69.273,1.424.406,2.166.406h3.431Zm-9.993,5.255l4.778,4.279-3.381,2.639c-.687.536-1.533.827-2.404.827h0c-.871,0-1.717-.291-2.404-.827l-2.98-2.326c-.703-.549-1.569-.847-2.461-.847H1c-.552,0-1-.448-1-1v-7c0-.552.448-1,1-1h3.521c.768,0,1.525-.149,2.238-.434s1.578-.566,2.218-.566c.526,0,1.025.126,1.482.34l-2.533,2.473c-1.066,1.068-1.232,2.759-.389,3.926.52.724,1.321,1.179,2.192,1.25.086.008.173.012.259.012.792,0,1.549-.312,2.084-.85l.935-.895Z" />
                                </svg>
                                <span
                                    class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                            </div>
                            @endif
                            <div class="flex flex-col w-full justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{
                                    $trade->trade_title }}</h5>
                                <p class="font-normal text-green-600 dark:text-green-400">₱{{
                                    number_format($trade->trade_value, 2) }}</p>
                                <div class="mt-2">
                                    <span
                                        class="m-2 inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                        Category: {{ $trade->trade_category }}
                                    </span>
                                    <span
                                        class="m-2 inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                        Status: {{ $trade->trade_status }}
                                    </span>
                                    <span
                                        class="m-2 inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                        Type: {{ $trade->trade_type }}
                                    </span>
                                    <span
                                        class="m-2 inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                        Duration: {{ $trade->trade_duration }}
                                    </span>
                                </div>
                                <div class="my-2">
                                    <p class="font-semibold text-gray-700 dark:text-gray-400">Conditions</p>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">{!!
                                        nl2br(e($trade->trade_conditions)) !!}</p>
                                    <p class="font-semibold text-gray-700 dark:text-gray-400">Description</p>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">{!!
                                        nl2br(e($trade->trade_description)) !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
