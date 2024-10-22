@extends('users.layouts.nav')

@section('content')
    <div class="container h-full xl:ml-80 lg:ml-80 md:w-full w-full p-4 pt-20">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('users.home') }}" wire:navigate class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <a href="{{ route('lists.services.index') }}" wire:navigate class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-md font-medium text-gray-700 md:ms-2">All services</span>
                        </div>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">Service details</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="xl:w-full">
            <div class="bg-slate-100 shadow-md rounded-md flex flex-col items-center p-8 xl:flex-row lg:flex-row md:flex-col">
                <!-- Service Image -->
                @if ($service->services_picture)
                    <div class="xl:pt-0 lg:pt-0 md:pt-8 pt-8 xl:w-2/5 lg:w-2/5 md:w-full w-full">
                        <img src="{{ asset('storage/' . $service->services_picture) }}" alt="{{ $service->services_title }}" class="object-cover aspect-square rounded-md shadow-md" />
                    </div>
                @endif

                <!-- Service Details -->
                <div class="xl:w-3/5 lg:w-3/5 md:w-full w-full xl:px-12 lg:px-10 md:px-6 px-6 md:mt-0">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">{{ $service->services_title }}</h1>
                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-300 mt-2">₱{{ number_format($service->services_fee, 2) }}</p>
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Description</h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            {!! nl2br(e($service->services_description)) !!}
                        </p>
                    </div>
                    <div class="mt-6">
                        <span
                            class="inline-block bg-green-100 text-green-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                            Status: {{ $service->services_status }}
                        </span>
                        <span class="inline-block bg-amber-100 text-amber-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                            Category: {{ $service->services_category }}
                        </span>
                    </div>
                    <div class="my-5">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">User information</h2>
                        <div class="flex items-center gap-4 my-2">
                            @if($service->user->profile_picture)
                                <img src="{{ asset('storage/' . $service->user->profile_picture) }}" alt="User Image" class="w-10 h-10 rounded-full me-3">
                            @else
                                <div class="relative inline-flex items-center justify-center w-10 h-10 me-3 overflow-hidden bg-gray-200 rounded-full dark:bg-gray-600">
                                    <span class="font-medium text-gray-600 dark:text-gray-300">
                                        {{ strtoupper(substr($service->user->first_name, 0, 1)) }}{{ strtoupper(substr($service->user->last_name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                            <div class="font-medium dark:text-white">
                                <a href="{{ route('profile.show', ['id' => $service->user->id]) }}" wire:navigate class="cursor-pointer">
                                    <span>{{ $service->user->first_name }} {{ $service->user->last_name }}</span>
                                </a>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Joined in {{ date('M Y', strtotime($service->user->created_at)) }}</div>
                            </div>
                        </div>
                        @if(Auth::check() && Auth::id() !== $service->user->id)
                            <div class="flex gap-2">
                                <a href="{{ route('profile.show', ['id' => $service->user->id]) }}" wire:navigate class="w-[200px] px-3 py-2 text-xs font-medium text-center inline-flex items-center justify-center text-gray-700 dark:text-white bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-0 dark:bg-gray-600 dark:hover:bg-gray-700">
                                    <svg class="w-3 h-3 text-gray-700 dark:text-white me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z">
                                        </path>
                                    </svg>
                                    View profile
                                </a>
                            </div>
                        @endif
                        @if(Auth::id() === $service->user->id)
                            <div class="inline-flex gap-2">
                                @include('users.lists.services.edit')
                                @include('users.lists.services.delete-service')
                            </div>
                        </div>
                        @endif
                    </div>
                    @if(Auth::check() && Auth::id() !== $service->user->id)
                        <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="xl:w-4/5 lg:w-4/5 md:w-full w-full">
                            @csrf
                            <span>Send message to {{ $service->user->first_name }}</span>
                            <input type="hidden" name="recipient_id" value="{{ $service->user->id }}">
                            <input type="hidden" name="content_link" value="{{ route('services.show', $service->id) }}">
                            <input type="hidden" name="content_link_image" value="{{ $service->services_picture }}">
                            <input type="hidden" name="content_link_description" value="{{ $service->services_description }}">
                            <div class="relative mb-4">
                                <textarea id="content" name="content" class="p-2 pb-10 block w-full h-46 bg-gray-200 border-none rounded-lg text-md focus:border-none focus:ring-0 focus:outline-none resize-none" required>Is this available?</textarea>
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
                @if($relatedServices->count() > 0)
                    @foreach ($relatedServices as $relatedService)
                        <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border">
                                @if ($relatedService->services_picture)
                                    <div class="relative">
                                        <a class="block shadow-lg rounded-2xl">
                                            <img src="{{ asset('storage/' . $relatedService->services_picture) }}" alt="{{ $relatedService->services_title }}" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
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
                                    <a href="{{ route('services.show', $relatedService->id) }}" wire:navigate>
                                        <h5 class="dark:text-white">{{ $relatedService->services_title }}</h5>
                                    </a>
                                    <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                                        ₱{{ $relatedService->services_fee }}
                                    </p>
                                    <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate">{!! nl2br(e($relatedService->services_description)) !!}</p>
                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('services.show', $relatedService->id) }}" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                                            View service
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-4 mb-1  pb-0 rounded-t-2xl">
                        <p>No other services in this category.</p>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
