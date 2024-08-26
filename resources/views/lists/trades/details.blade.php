@extends('user.layouts.nav')
@section('content')
    @include('user.layouts.side-nav')
    @include('lists.trades.delete-modal')
    @include('lists.modals.create-modal')

    {{-- <main class="p-4 w-full container md:mx-auto mt-16 md:mt-32">
        <div class="flex flex-col items-center">
            <!-- Breadcrumb -->
            <nav class="flex mb-5 w-full justify-around" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('user.home') }}" class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">Trading details</span>
                        </div>
                    </li>
                </ol>
                @if(auth()->check() && auth()->user()->id == $trade->user_id)
                    <button type="button" data-modal-target="trade-modal" data-modal-toggle="trade-modal" class="px-3 py-2 ml-5 text-xs font-medium text-center inline-flex items-center text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300">
                        Add trading
                    </button>
                @endif
            </nav>
            <div class="w-3/4 bg-white border border-gray-200 rounded-lg shadow">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select tab</label>
                    <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-lg rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option>Trading information</option>
                        <option>User information</option>
                        <option>Users' other tradings</option>
                    </select>
                </div>
                <ul class="hidden text-xl font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex rtl:divide-x-reverse" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button id="trading-details-tab" data-tabs-target="#trading-details" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-ss-lg hover:bg-gray-50 focus:outline-none">
                            Full details
                        </button>
                    </li>
                    <li class="w-full">
                        <button id="user-information-tab" data-tabs-target="#user-information" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 hover:bg-gray-50 focus:outline-none">
                            User information
                        </button>
                    </li>
                </ul>
                <div id="fullWidthTabContent" class="border-t border-gray-200">
                    <!-- Trade info -->
                    <div class="hidden p-4 bg-white rounded-lg md:p-8" id="trading-details" role="tabpanel" aria-labelledby="trading-details-tab">
                        <div class="flex flex-col items-center bg-white md:flex-row md:max-w-full">
                            @if ($trade->trade_picture)
                                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-64 md:rounded-lg" src="{{ asset('storage/' . $trade->trade_picture) }}" alt="">
                            @endif
                            <div class="flex md:flex-row flex-col md:space-x-5 justify-between p-4 leading-normal md:ml-3">
                                <div class="md:w-1/2">
                                    <div class="flex flex-col">
                                        <div class="space-y-0 mb-5">
                                            <p class="text-3xl font-semibold">{{ $trade->trade_title }}</p>
                                            <span class="bg-gray-100 text-gray-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-20 border-gray-500 ">
                                                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($trade->created_at)->diffForHumans() }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <p class="mb-3 font-normal text-lg text-gray-700">
                                        <span class="flex flex-row font-semibold">Conditions</span>
                                        {!! nl2br(e($trade->trade_conditions)) !!}
                                    </p>
                                    <p class="mb-3 font-normal text-lg text-gray-700">
                                        <span class="flex flex-row font-semibold">Description</span>
                                        {!! nl2br(e($trade->trade_description)) !!}
                                    </p>
                                </div>
                                <div class="md:w-1/2">
                                    <ul class="mt-2 divide-y-2 text-lg text-gray-700">
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Category</span>
                                            <span class="text-gray-700">{{ $trade->trade_category }}</span>
                                        </li>
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Status</span>
                                            <span class="text-gray-700">{{ $trade->trade_status }}</span>
                                        </li>
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Type</span>
                                            <span class="text-gray-700">{{ $trade->trade_type }}</span>
                                        </li>
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Duration</span>
                                            <span class="text-gray-700">{{ $trade->trade_duration }}</span>
                                        </li>
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Value</span>
                                            <span class="text-gray-700">{{ $trade->trade_value }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User info -->
                    <div class="hidden p-4 bg-white rounded-lg md:p-8" id="user-information" role="tabpanel" aria-labelledby="user-information-tab">
                        <div class="flex flex-col items-center bg-white md:flex-row md:max-w-full space-x-2">
                            <img class="object-cover w-56 h-56 rounded-t-lg md:h-auto md:w-48 md:rounded-lg" src="{{ $trade->user->profile_picture ? asset('storage/' . $trade->user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}" alt="">
                            <div class="flex md:flex-row flex-col md:space-x-5 justify-between p-4 leading-normal w-full">
                                <!-- user information section -->
                                @php
                                    $class = auth()->check() && auth()->user()->id == $trade->user_id ? 'md:w-2/3 w-full' : 'md:w-1/3 w-full';
                                @endphp
                                <div class="{{ $class }}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $trade->user->first_name }} {{ $trade->user->last_name }}
                                    </h5>
                                    <ul class="mt-2 divide-y-2 text-lg text-gray-700">
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Joined:</span>
                                            <span class="text-gray-700">{{ date('M d, Y', strtotime($trade->user->created_at)) }}</span>
                                        </li>
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Mobile:</span>
                                            @if (empty($trade->user->contact_number))
                                                <span class="text-gray-700">NULL</span>
                                            @else
                                                <span class="text-gray-700">{{ $trade->user->contact_number }}</span>
                                            @endif
                                        </li>
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Email:</span>
                                            <span class="text-gray-700">{{ $trade->user->email }}</span>
                                        </li>
                                        <li class="flex py-2">
                                            <span class="font-bold w-24">Location:</span>
                                            @if (empty($trade->user->home_address))
                                                <span class="text-gray-700">NULL</span>
                                            @else
                                                <span class="text-gray-700">{{ $trade->user->home_address }}</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                                @php
                                    $class = auth()->check() && auth()->user()->id == $trade->user_id ? 'md:w-1/3 w-full' : 'md:w-2/3 w-full';
                                @endphp
                                <div class="{{ $class }}">
                                    <!-- send message to user section -->
                                    @if(auth()->check() && auth()->user()->id == $trade->user_id)
                                        <div class="flex flex-col mb-3">
                                            <button type="button" onclick="window.location.href='{{ route('user.profile') }}';" class="px-5 py-2.5 text-sm mb-3 font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center">
                                                View your profile
                                            </button>
                                            <button type="button" onclick="window.location.href='{{ route('profile.edit', $user->id) }}';" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center">
                                                Edit your profile
                                            </button>
                                        </div>
                                    @endif
                                    @can('message', $trade->user)
                                        <p class="font-bold text-md">Send message to user</p>
                                        <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="recipient_id" value="{{ $trade->user->id }}">
                                            <input type="hidden" name="content_link" value="{{ route('trades.show', $trade->id) }}">
                                            <input type="hidden" name="content_link_image" value="{{ $trade->trade_picture }}">
                                            <input type="hidden" name="content_link_description" value="{{ $trade->trade_description }}">
                                            <div class="w-full my-3 border border-gray-200 rounded-lg bg-gray-50">
                                                <div class="px-4 py-2 bg-white rounded-t-lg">
                                                    <label for="content" class="sr-only">Your message</label>
                                                    <textarea id="content" name="content" rows="4" class="w-full px-0 text-md text-gray-900 bg-white border-0 focus:ring-0 resize-none" placeholder="Write a message..." required></textarea>
                                                </div>
                                                <div class="flex items-center justify-between px-3 py-2 bg-white rounded-b-lg">
                                                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-md font-medium text-center text-white bg-blue-700 rounded-lg">
                                                        Send
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(auth()->check() && auth()->user()->id == $trade->user_id)
                        <ul class="hidden text-xl font-medium text-center text-gray-500 border-t-2 divide-x divide-gray-200 sm:flex rtl:divide-x-reverse" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                            <li class="w-full">
                                <button id="stats-tab" onclick="window.location.href='{{ route('trades.edit', $trade->id) }}';" type="button" class="inline-block w-full p-4 hover:bg-gray-50 focus:outline-none">
                                    Edit
                                </button>
                            </li>
                            <li class="w-full">
                                <button data-modal-target="delete-trade-modal" data-modal-toggle="delete-trade-modal" type="button" class="inline-block w-full p-4 hover:bg-gray-50 focus:outline-none">
                                    Delete
                                </button>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
            <!-- Related post by category -->
            <div class="w-3/4 mt-6 p-5">
                <h3 class="text-gray-600 text-2xl font-medium">Related tradings</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @if($relatedTrades->count() > 0)
                        @foreach($relatedTrades as $relatedTrade)
                        @if ($relatedTrade->trade_picture)
                            <a href="{{ route('trades.show', $relatedTrade->id) }}" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                <div class="flex items-end justify-end h-56 w-full bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $relatedTrade->trade_picture) }}')">
                                    @switch($relatedTrade->trade_category)
                                        @case('Apparel')
                                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.47a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.47a2 2 0 00-1.34-2.23z"></path>
                                                    </g>
                                                </svg>
                                            </button>
                                            @break
                                        @case('School supplies')
                                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4"/>
                                                </svg>
                                            </button>
                                            @break
                                        @case('Electronics')
                                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v1M9 12H4m8 8V9h8v11h-8Zm0 0H9m8-4a1 1 0 1 0-2 0 1 1 0 0 0 2 0Z"/>
                                                </svg>
                                            </button>
                                            @break
                                        @case('Stationery')
                                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4.988 19.012 5.41-5.41m2.366-6.424 4.058 4.058-2.03 5.41L5.3 20 4 18.701l3.355-9.494 5.41-2.029Zm4.626 4.625L12.197 6.61 14.807 4 20 9.194l-2.61 2.61Z"/>
                                                </svg>
                                            </button>
                                            @break
                                        @default
                                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16h13M4 16l4-4m-4 4 4 4M20 8H7m13 0-4 4m4-4-4-4"/>
                                                </svg>
                                            </button>
                                            @break
                                    @endswitch
                                </div>
                                <div class="px-5 py-3">
                                    <h3 class="text-gray-700 uppercase">{{ $relatedTrade->trade_title }}</h3>
                                    <div class="flex flex-col">
                                        <span class="bg-gray-100 w-fit text-gray-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-20 border-gray-500 ">
                                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($relatedTrade->created_at)->diffForHumans() }}</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('trades.show', $relatedTrade->id) }}" class="w-full max-w-sm mx-auto rounded-md shadow-md border overflow-hidden">
                                <div class="flex flex-col items-start px-5 py-3 h-56 w-full bg-cover">
                                    <div class="justify-between">
                                        <div class="flex flex-col">
                                            <h3 class="text-gray-700 uppercase">{{ $relatedTrade->trade_title }}</h3>
                                            <span class="bg-gray-100 text-gray-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-20 border-gray-500 ">
                                                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($relatedTrade->created_at)->diffForHumans() }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="text-gray-500 mt-2">{!! nl2br(e($relatedTrade->trade_description)) !!}</span>
                                </div>
                                <div class="flex flex-row justify-between items-center px-5 py-3">
                                    <span class="text-gray-500 mt-2">{{ $relatedTrade->trade_status }}</span>
                                    @switch($relatedTrade->trade_category)
                                        @case('Apparel')
                                            <button class="p-2 rounded-full bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M20.38 3.46L16 2a4 4 0 01-8 0L3.62 3.46a2 2 0 00-1.34 2.23l.58 3.47a1 1 0 00.99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 002-2V10h2.15a1 1 0 00.99-.84l.58-3.47a2 2 0 00-1.34-2.23z"></path>
                                                    </g>
                                                </svg>
                                            </button>
                                            @break
                                        @case('School supplies')
                                            <button class="p-2 rounded-full bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4"/>
                                                </svg>
                                            </button>
                                            @break
                                        @case('Electronics')
                                            <button class="p-2 rounded-full bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v1M9 12H4m8 8V9h8v11h-8Zm0 0H9m8-4a1 1 0 1 0-2 0 1 1 0 0 0 2 0Z"/>
                                                </svg>
                                            </button>
                                            @break
                                        @case('Stationery')
                                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4.988 19.012 5.41-5.41m2.366-6.424 4.058 4.058-2.03 5.41L5.3 20 4 18.701l3.355-9.494 5.41-2.029Zm4.626 4.625L12.197 6.61 14.807 4 20 9.194l-2.61 2.61Z"/>
                                                </svg>
                                            </button>
                                            @break
                                        @default
                                            <button class="p-2 rounded-full bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>
                                            </button>
                                            @break
                                    @endswitch
                                </div>
                            </a>
                        @endif
                        @endforeach
                    @else
                        <p>No other trades in this category.</p>
                    @endif
                </div>
            </div>
        </div>
    </main> --}}

    <div class="container h-full xl:ml-80 lg:ml-80 md:ml-0 ml-0 p-4 pt-20">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('user.home') }}" wire:navigate class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <a href="{{ route('lists.trades.index') }}" wire:navigate class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-md font-medium text-gray-700 md:ms-2">All tradings</span>
                        </div>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">Trading details</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col items-center p-8 xl:flex-row lg:flex-row md:flex-col bg-white shadow-md rounded-md xl:w-full">
            <!-- Trade Image -->
            @if($trade->trade_picture)
                <div class="xl:pt-0 lg:pt-0 md:pt-8 pt-8 xl:w-2/5 lg:w-2/5 md:w-full w-full">
                    <img src="{{ asset('storage/' . $trade->trade_picture) }}" alt="{{ $trade->trade_title }}" class="object-cover aspect-square rounded-md shadow-md" />
                </div>
            @endif

            <div class="xl:w-3/5 lg:w-3/5 md:w-full w-full xl:px-12 lg:px-10 md:px-6 px-6 md:mt-0">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ $trade->trade_title }}</h1>
                <p class="text-xl font-semibold text-gray-700 dark:text-gray-300 mt-2">₱{{ number_format($trade->trade_value, 2) }}</p>
                <div class="mt-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Description</h2>
                    <p class="text-gray-600 dark:text-gray-400">{{ $trade->trade_description }}</p>
                </div>
                <div class="mt-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Conditions</h2>
                    <p class="text-gray-600 dark:text-gray-400">{{ $trade->trade_conditions }}</p>
                </div>
                <div class="mt-6">
                    <span class="m-2 inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                        Category: {{ $trade->trade_category }}
                    </span>
                    <span class="m-2 inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                        Status: {{ $trade->trade_status }}
                    </span>
                    <span class="m-2 inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                        Type: {{ $trade->trade_type }}
                    </span>
                    <span class="m-2 inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                        Duration: {{ $trade->trade_duration }}
                    </span>
                </div>
                <div class="my-5">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">User information</h2>
                    <div class="flex items-center gap-4 my-2">
                        @if($trade->user->profile_picture)
                            <img src="{{ asset('storage/' . $trade->user->profile_picture) }}" alt="User Image" class="w-10 h-10 rounded-full me-3">
                        @else
                            <div class="relative inline-flex items-center justify-center w-10 h-10 me-3 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <span class="font-medium text-gray-600 dark:text-gray-300">
                                    {{ strtoupper(substr($trade->user->first_name, 0, 1)) }}{{ strtoupper(substr($trade->user->last_name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                        <div class="font-medium dark:text-white">
                            <a href="{{ route('profile.show', ['id' => $trade->user->id]) }}" wire:navigate class="cursor-pointer">
                                <span>{{ $trade->user->first_name }} {{ $trade->user->last_name }}</span>
                            </a>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Joined in {{ date('M Y', strtotime($trade->user->created_at)) }}</div>
                        </div>
                    </div>
                    @if(Auth::check() && Auth::id() !== $trade->user->id)
                        <div class="flex gap-2">
                            <a href="{{ route('profile.show', ['id' => $trade->user->id]) }}" wire:navigate class="w-[200px] px-3 py-2 text-xs font-medium text-center inline-flex items-center justify-center text-gray-700 dark:text-white bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-0 dark:bg-gray-600 dark:hover:bg-gray-700">
                                <svg class="w-3 h-3 text-gray-700 dark:text-white me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z">
                                    </path>
                                </svg>
                                View profile
                            </a>
                            <button type="button" class="w-[200px] px-3 py-2 text-xs font-medium text-center inline-flex items-center justify-center text-gray-700 dark:text-white bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-0 dark:bg-gray-600 dark:hover:bg-gray-700">
                                <svg class="w-3 h-3 text-gray-700 dark:text-white me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z"></path>
                                </svg>
                                More details
                            </button>
                        </div>
                    @endif
                    @if(Auth::id() === $trade->user->id)
                            <div class="flex gap-2">
                                <a href="{{ route('trades.edit', $trade->id) }}" wire:navigate type="button" class="w-[200px] px-3 py-2 text-xs font-medium text-center inline-flex items-center justify-center text-gray-700 dark:text-white bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-0 dark:bg-gray-600 dark:hover:bg-gray-700">
                                    <svg class="w-3 h-3 text-gray-700 dark:text-white me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7.24264 17.9967H3V13.754L14.435 2.319C14.8256 1.92848 15.4587 1.92848 15.8492 2.319L18.6777 5.14743C19.0682 5.53795 19.0682 6.17112 18.6777 6.56164L7.24264 17.9967ZM3 19.9967H21V21.9967H3V19.9967Z"></path>
                                    </svg>
                                    Edit trading
                                </a>
                                <button data-modal-target="delete-trade-modal" data-modal-toggle="delete-trade-modal" type="button" class="w-[200px] px-3 py-2 text-xs font-medium text-center inline-flex items-center justify-center text-gray-700 dark:text-white bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-0 dark:bg-gray-600 dark:hover:bg-gray-700">
                                    <svg class="w-3 h-3 text-gray-700 dark:text-white me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 6V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7ZM9 4V6H15V4H9Z"></path>
                                    </svg>
                                    Delete trading
                                </button>
                            </div>
                    @endif
                </div>
                @if(Auth::check() && Auth::id() !== $trade->user->id)
                    <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="xl:w-4/5 lg:w-4/5 md:w-full w-full">
                        <span>Send message to {{ $trade->user->first_name }}</span>
                        <input type="hidden" name="recipient_id" value="{{ $trade->user->id }}">
                        <input type="hidden" name="content_link" value="{{ route('trades.show', $trade->id) }}">
                        <input type="hidden" name="content_link_image" value="{{ $trade->trade_picture }}">
                        <input type="hidden" name="content_link_description" value="{{ $trade->trade_description }}">
                        <div class="relative mb-4">
                            <textarea id="content" name="content" class="p-2 pb-10 block w-full h-46 bg-gray-100 border-none rounded-lg text-md focus:border-none focus:ring-0 focus:outline-none resize-none" required>Is this available?</textarea>
                            <div class="absolute bottom-0 inset-x-0 p-2 rounded-b-md bg-none">
                                <div class="flex justify-end items-center">
                                    <div class="flex items-center gap-x-1">
                                        <button type="submit" class="inline-flex flex-shrink-0 justify-center items-center size-10 rounded-lg text-gray-500 focus:none focus:outline-none focus:ring-none">
                                            <svg class="flex-shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <!-- Related services -->
        <div class="container mx-auto my-6 flex flex-col px-6 py-3 min-w-0 mb-6 break-words bg-gradient-to-br from-red-50 via-purple-50 to-gray-100 border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-lg bg-clip-border">
            <div class="p-4 pb-0 mb-0 rounded-t-2xl">
                <h2 class="mb-1 text-xl dark:text-white">Related services</h2>
            </div>
            @if($relatedTrades->count() > 0)
                @foreach ($relatedTrades as $relatedTrade)
                    <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                        <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border">
                            @if ($relatedTrade->services_picture)
                                <div class="relative">
                                    <a class="block shadow-lg rounded-2xl">
                                        <img src="{{ asset('storage/' . $relatedTrade->services_picture) }}" alt="{{ $relatedTrade->services_title }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
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
                                <a href="{{ route('trades.show', $relatedTrade->id) }}" wire:navigate>
                                    <h5 class="dark:text-white">{{ $relatedTrade->trade_title }}</h5>
                                </a>
                                <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                                    ₱{{ $relatedTrade->trade_value }}
                                </p>
                                <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{!! nl2br(e($trade->trade_description)) !!}</p>
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('trades.show', $relatedTrade->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                                        View trading
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="p-4 mb-1  pb-0 mb-0 rounded-t-2xl">
                    <p>No other services in this category.</p>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection
