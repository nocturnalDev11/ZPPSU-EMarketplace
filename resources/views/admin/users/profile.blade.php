@extends('admin.layouts.dashboard-nav')

@include('admin.layouts.side-nav')
@section('content')
<div id="main-content" class="flex overflow-hidden bg-gray-50 dark:bg-gray-900 transition-all ml-80 h-full">
    <div class="relative w-full overflow-y-auto pt-16">
        <main>

            <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-6">
                <div class="col-span-full mb-5 xl:mb-0">
                    <nav class="flex mb-5" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2">
                            <li class="inline-flex items-center">
                                <a href="#" class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <a href="#" class="ml-1 md:ml-2 text-sm font-medium text-gray-700 hover:text-gray-900">Users</a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2" aria-current="page">Profile</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
                    Profile
                    </h1>
                </div>

                <div class="col-span-full xl:col-auto">
                    <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6 dark:bg-gray-800 dark:shadow-none">
                        <div class="sm:flex xl:block sm:space-x-4 xl:space-x-0">
                            <img class="mb-2 w-20 h-20 rounded-2xl shadow-lg shadow-gray-300 object-cover" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}" alt="{{ $user->first_name }}'s picture" />
                            <div>
                                <h2 class="text-xl font-bold">{{ $user->first_name }} {{ $user->last_name }}</h2>
                                <ul class="mt-2 space-y-1">
                                    <li class="flex items-center text-md font-normal text-gray-500">
                                        <svg class="mr-2 w-4 h-4 text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                                        </svg>
                                        {{ $user->department }}
                                    </li>
                                    <li class="flex items-center text-md font-normal text-gray-500">
                                        <svg class="mr-2 w-4 h-4 text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
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
                                    <a class="text-md font-medium text-gray-900" href="/cdn-cgi/l/email-protection#9aedfff8f7fbe9eeffe8dafcf6f5edf8f3eeffb4f9f5f7">
                                        <span class="__cf_email__" data-cfemail="3f46504a4d515e525a7f595350485d564b5a115c5052">{{ $user->email }}</span>
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
                            <ul class="mt-2 divide-y-2 text-md text-gray-700 dark:text-white dark:divide-gray-500">
                                <li class="flex py-2">
                                    <span class="font-semibold w-24">Gender:</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $user->gender }}</span>
                                </li>
                                <li class="flex py-2">
                                    <span class="font-semibold w-24">Birthday:</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ date('M d, Y', strtotime($user->dob)) }}</span>
                                </li>
                                <li class="flex py-2">
                                    <span class="font-semibold w-24">Joined:</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ date('M d, Y', strtotime($user->created_at)) }} ({{ \Carbon\Carbon::parse($user->created_at)->diffInDays() }} days ago)</span>
                                </li>
                                <li class="flex py-2">
                                    <span class="font-semibold w-24">ID</span>
                                    <span class="text-gray-700 dark:text-gray-300">{{ $user->university_id }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                        <div class="flow-root">
                            <h3 class="text-xl font-bold">Hobbies</h3>
                            <ul class="flex flex-wrap mt-4">
                                <li class="bg-gradient-to-br from-sky-400 to-sky-600 text-xs font-bold uppercase text-white px-3 py-1.5 rounded-md mb-2 mr-2">
                                    Travelling
                                </li>
                                <li class="bg-gradient-to-br from-sky-400 to-sky-600 text-xs font-bold uppercase text-white px-3 py-1.5 rounded-md mb-2 mr-2">
                                    Surf
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-6">
                    <h3 class="mb-4 text-xl font-bold">General information</h3>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                    <dt class="text-lg font-medium text-gray-900">About me</dt>
                    <dd class="mt-1 space-y-3 max-w-prose text-sm text-gray-500">
                    <p>
                    Dedicated, passionate, and accomplished Full Stack
                    Developer with 9+ years of progressive experience
                    working as an Independent Contractor for Google and
                    developing and growing my educational social network
                    that helps others learn programming, web design, game
                    development, networking.
                    </p>
                    <p>
                    Aside from my job, I like to create and contribute to
                    open source projects. That helps me to learn a ton of
                    new stuff, grow as a developer and support other open
                    source projects.
                    </p>
                    </dd>
                    </div>
                    <div>
                    <dt class="text-sm font-medium text-gray-500">Education</dt>
                    <dd class="text-sm font-semibold text-gray-900">
                    Thomas Jeff High School, Stanford University
                    </dd>
                    </div>
                    <div>
                    <dt class="text-sm font-medium text-gray-500">
                    Work History
                    </dt>
                    <dd class="text-sm font-semibold text-gray-900">
                    Twitch, Google, Apple
                    </dd>
                    </div>
                    <div>
                    <dt class="text-sm font-medium text-gray-500">Join Date</dt>
                    <dd class="text-sm font-semibold text-gray-900">
                    12-09-2021
                    </dd>
                    </div>
                    <div>
                    <dt class="text-sm font-medium text-gray-500">Languages</dt>
                    <dd class="text-sm font-semibold text-gray-900">
                    English, German, Italian, Spanish
                    </dd>
                    </div>
                    <div>
                    <dt class="text-sm font-medium text-gray-500">
                    Organization
                    </dt>
                    <dd class="text-sm font-semibold text-gray-900">
                    Bergside Inc.
                    </dd>
                    </div>
                    <div>
                    <dt class="text-sm font-medium text-gray-500">Role</dt>
                    <dd class="text-sm font-semibold text-gray-900">
                    Graphic Designer
                    </dd>
                    </div>
                    <div>
                    <dt class="text-sm font-medium text-gray-500">
                    Department
                    </dt>
                    <dd class="text-sm font-semibold text-gray-900">
                    Marketing
                    </dd>
                    </div>
                    <div>
                    <dt class="text-sm font-medium text-gray-500">Birthday</dt>
                    <dd class="text-sm font-semibold text-gray-900">
                    15-08-1990
                    </dd>
                    </div>
                    </dl>
                    </div>
                    <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 mb-4">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-16 lg:gap-8 2xl:gap-24">
                    <div class="space-y-6">
                    <div>
                        <div class="mb-1 text-base font-medium text-gray-500">
                            Figma
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-gray-900 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-1 text-base font-medium text-gray-500">
                            HTML
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full">
                            <div class="h-2 bg-gray-900 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                    </div>
                    <div class="space-y-6">
                    <div>
                    <div class="mb-1 text-base font-medium text-gray-500">
                    Vue
                    </div>
                    <div class="w-full h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-gray-900 rounded-full" style="width: 45%"></div>
                    </div>
                    </div>
                    <div>
                    <div class="mb-1 text-base font-medium text-gray-500">
                    Marketing
                    </div>
                    <div class="w-full h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-gray-900 rounded-full" style="width: 90%"></div>
                    </div>
                    </div>
                    <div>
                    <div class="mb-1 text-base font-medium text-gray-500">
                        Product Design
                        </div>
                        <div class="w-full h-2 bg-gray-200 rounded-full">
                        <div class="h-2 bg-gray-900 rounded-full" style="width: 99%"></div>
                        </div>
                    </div>
                    <div>
                    <div class="mb-1 text-base font-medium text-gray-500">
                    Angular
                    </div>
                    <div class="w-full h-2 bg-gray-200 rounded-full">
                    <div class="h-2 bg-gray-900 rounded-full" style="width: 45%"></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
