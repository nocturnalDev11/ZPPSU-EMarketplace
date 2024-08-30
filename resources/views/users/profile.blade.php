@extends('users.layouts.nav')

@section('content')
    @include('users.layouts.side-nav')
    <div class="xl:ml-80 lg:ml-80 md:ml-0 ml-0 bg-gray-100 dark:bg-gray-800 font-sans pb-10">
        @php
            $baseClasses = 'grid grid-cols-1 lg:grid-cols-2 gap-6 w-2xl container px-2';
            $additionalClasses = 'mx-auto';
            $allClasses = $baseClasses . ' ' . $additionalClasses;
        @endphp
        <main class="{{ $allClasses }}">
            <aside class="mt-24">
                <div class="flex-1 px-6">
                    <div class="relative flex items-center overflow-hidden rounded-2xl bg-cover bg-center" style="height: 245px;">
                        <span class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                    </div>
                    <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-12 overflow-hidden break-words border-0 shadow-md rounded-2xl bg-white/80 backdrop-blur-2xl backdrop-saturate-200">
                        <div class="flex flex-wrap -mx-3">
                            <div class="flex-none w-auto max-w-full px-3">
                                @if($user->profile_picture)
                                    <div class="relative inline-flex items-center justify-center rounded-xl overflow-hidden h-24 w-24">
                                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="profile_image" class="h-full w-full object-cover shadow-soft-sm rounded-xl" />
                                    </div>
                                @else
                                    <div class="relative inline-flex items-center justify-center rounded-xl overflow-hidden bg-gray-200 dark:bg-gray-600 h-24 w-24">
                                        <span class="p-2 font-medium text-4xl text-gray-600 dark:text-gray-300">
                                            {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-none w-auto max-w-full px-3 my-auto">
                                <div class="h-full">
                                    <h5 class="mb-1e">{{ $user->first_name }} {{ $user->last_name }}</h5>
                                    <p class="mb-0 font-semibold leading-normal text-sm dark:opacity-60">
                                        @if (($user->department) == 'N/A')
                                            @if (!empty($user->role))
                                                {{ $user->role }}
                                            @endif
                                        @else
                                            {{ $user->role }} | {{ $user->department }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                                <div class="relative right-0">
                                    <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl">
                                        @if(Auth::id() === $user->id)
                                            <li class="z-30 flex-auto text-center">
                                                <a href="{{ route('profile.edit', $user->id) }}" wire:navigate class="bg-gray-200 block w-full px-0 py-1 mb-0 transition-all rounded-lg text-gray-700" role="tab" aria-selected="false">
                                                    <span class="ml-1">Settings</span>
                                                </a>
                                            </li>
                                        @endif
                                        @if(Auth::check() && Auth::id() !== $user->id)
                                            <li class="z-30 flex-auto text-center">
                                                <button class="bg-gray-200 block w-full px-0 py-1 mb-0 transition-all rounded-lg bg-inherit text-gray-700" href="javascript:;">
                                                    <span class="ml-1">Messages</span>
                                                </button>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 bg-white shadow mt-4 p-8 rounded-lg dark:bg-gray-700">
                    <div class="flex justify-center items-center gap-x-16">
                        <div class="font-semibold text-center">
                            <p class="text-black dark:text-white">{{ $productCount }}</p>
                            <span class="text-gray-400">Products</span>
                        </div>
                        <div class="font-semibold text-center">
                            <p class="text-black dark:text-white">{{ $serviceCount }}</p>
                            <span class="text-gray-400">Services</span>
                        </div>
                        <div class="font-semibold text-center">
                            <p class="text-black dark:text-white">{{ $postCount }}</p>
                            <span class="text-gray-400">Posts</span>
                        </div>
                        <div class="font-semibold text-center">
                            <p class="text-black dark:text-white">{{ $tradeCount }}</p>
                            <span class="text-gray-400">Tradings</span>
                        </div>
                    </div>
                </div>

                <div class="flex-1 bg-white shadow mt-4 p-8 rounded-lg dark:bg-gray-700">
                    <h3 class="text-gray-600 text-xl font-semibold mb-4 dark:text-gray-300">
                        {{ $user->first_name }}s' information
                    </h3>
                    <p class="text-gray-600 text-lg my-2 dark:text-gray-300">
                        {{ $user->about }}
                    </p>
                    <ul class="mt-2 divide-y text-lg text-gray-700 dark:text-white dark:divide-gray-500">
                        <li class="flex py-2">
                            <span class="font-semibold w-24">Full name:</span>
                            <span class="text-gray-700 dark:text-gray-300">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
                        </li>
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
                            <span class="text-gray-700 dark:text-gray-300">{{ date('M d, Y', strtotime($user->created_at)) }}</span>
                        </li>
                        <li class="flex py-2">
                            <span class="font-semibold w-24">Mobile:</span>
                            <span class="text-gray-700 dark:text-gray-300">{{ $user->contact_number }}</span>
                        </li>
                        <li class="flex py-2">
                            <span class="font-semibold w-24">Email:</span>
                            <span class="text-gray-700 dark:text-gray-300">{{ $user->email }}</span>
                        </li>
                        <li class="flex py-2">
                            <span class="font-semibold w-24">Location:</span>
                            <span class="text-gray-700 dark:text-gray-300">{{ $user->home_address }}</span>
                        </li>
                    </ul>
                </div>

                <div class="flex-1 bg-white shadow mt-4 p-8 rounded-lg dark:bg-gray-700">
                    <h3 class="text-gray-600 text-xl font-semibold mb-4 dark:text-gray-300">
                        {{ $user->first_name }}s' Activity log
                    </h3>
                    <div class="relative px-4">
                        @if ($activities->isEmpty())
                            <div class="flex items-center w-full my-6 justify-center">
                                <p class="text-gray-400">No activities found.</p>
                            </div>
                        @else
                            <div class="absolute h-full border-dashed border-2 border-opacity-20 border-gray-400 dark:border-gray-200"></div>
                            @foreach($activities as $activity)
                                <!-- start::Timeline item -->
                                <div class="flex items-center w-full my-6 -ml-1.5">
                                    <div class="w-1/12 z-10">
                                        <div class="w-3.5 h-3.5 bg-green-500 dark:bg-green-400 rounded-full"></div>
                                    </div>
                                    <div class="w-11/12">
                                        <p class="text-sm dark:text-white">
                                            @if($activity['type'] === 'Post')
                                                Post created: <a href="#" class="text-green-400 dark:text-green-300 font-bold">{{ $activity['title'] }}</a>
                                            @elseif($activity['type'] === 'Product')
                                                Product listed: <a href="#" class="text-green-400 dark:text-green-300 font-bold">{{ $activity['title'] }}</a>
                                            @elseif($activity['type'] === 'Service')
                                                Service offered: <a href="#" class="text-green-400 dark:text-green-300 font-bold">{{ $activity['title'] }}</a>
                                            @elseif($activity['type'] === 'Trade')
                                                Trade initiated: <a href="#" class="text-green-400 dark:text-green-300 font-bold">{{ $activity['title'] }}</a>
                                            @endif

                                            <p class="text-xs text-gray-500 dark:text-gray-300">{{ \Carbon\Carbon::parse($activity['created_at'])->diffForHumans() }}</p>
                                        </p>
                                    </div>
                                </div>
                                <!-- end::Timeline item -->
                            @endforeach
                        @endif
                    </div>
                </div>
            </aside>

            <article class="xl:mt-24 sm:mt-1">
                <div>
                    <!-- Products section -->
                    <div>
                        @foreach($user->products as $product)
                            <div class="bg-white shadow rounded-lg mb-6 pb-3 dark:bg-gray-700" >
                                <!-- Header -->
                                <div class="flex flex-row items-center px-2 py-3 mx-3 border-b dark:border-gray-500">
                                    <div class="w-auto h-auto rounded-full">
                                        <img class="w-10 h-10 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                                    </div>
                                    <div class="flex flex-col ml-4">
                                        <div class="text-gray-600 dark:text-gray-200 text-lg font-semibold">
                                            {{ $product->user->first_name }}
                                            {{ $product->user->last_name }}
                                        </div>
                                        <div class="flex w-full">
                                            @if (($product->user->department) == 'N/A')
                                            <div class="text-sky-700 font-base text-sm mr-1 cursor-pointer dark:text-sky-400">
                                                @if (!empty($product->user->role))
                                                    {{ $product->user->role }}
                                                @endif
                                            </div>
                                            @else
                                            <div class="text-sky-700 font-base text-sm mr-1 cursor-pointer dark:text-sky-400">
                                                {{ $product->user->role }} | {{ $product->user->department }}
                                            </div>
                                            @endif
                                            <div class="text-gray-400 font-thin text-sm">
                                                • {{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2">
                                    @if ($product->prod_picture)
                                        <img class="rounded w-full h-96 object-cover" src="{{ asset('storage/' . $product->prod_picture) }}">
                                    @endif
                                </div>
                                <div class="mx-3 px-2">
                                    <div class="text-gray-500 text-2xl font-semibold mb-2 dark:text-gray-200">
                                        {{ $product->prod_name }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                            Category: {{ $product->prod_category }}
                                        </span>
                                        <span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                            Condition: {{ $product->prod_condition }}
                                        </span>
                                    </div>
                                    <div class="text-gray-500 text-md dark:text-gray-200">
                                        {!! nl2br(e($product->prod_description)) !!}
                                    </div>
                                    <div class="text-gray-500 text-md my-3 dark:text-gray-200">
                                        <span class="font-semibold text-green-600 dark:text-green-500">₱{{ $product->prod_price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Service section -->
                    <div>
                        @foreach($user->services as $service)
                            <div class="bg-white shadow rounded-lg mb-6 pb-3 dark:bg-gray-700" >
                                <!-- Header -->
                                <div class="flex flex-row items-center px-2 py-3 mx-3 border-b dark:border-gray-500">
                                    <div class="w-auto h-auto rounded-full">
                                        <img class="w-10 h-10 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                                    </div>
                                    <div class="flex flex-col ml-4">
                                        <div class="text-gray-600 dark:text-gray-200 text-lg font-semibold">
                                            {{ $service->user->first_name }}
                                            {{ $service->user->last_name }}
                                        </div>
                                        <div class="flex w-full mt-1">
                                            @if (($service->user->department) == 'N/A')
                                            <div class="text-sky-700 font-base text-sm mr-1 cursor-pointer dark:text-sky-400">
                                                @if (!empty($service->user->role))
                                                {{ $service->user->role }}
                                                @endif
                                            </div>
                                            @else
                                            <div class="text-sky-700 font-base text-sm mr-1 cursor-pointer dark:text-sky-400">
                                                {{ $service->user->role }} | {{ $service->user->department }}
                                            </div>
                                            @endif
                                            <div class="text-gray-400 font-thin text-sm">
                                                • {{ \Carbon\Carbon::parse($service->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2">
                                    @if ($service->services_picture)
                                    <img class="rounded w-full h-96 object-cover" src="{{ asset('storage/' . $service->services_picture) }}">
                                    @endif
                                </div>
                                <div class="mx-3 px-2">
                                    <div class="text-gray-500 text-2xl font-semibold mb-2 dark:text-gray-200">
                                        {{ $service->services_title }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                            Category: {{ $service->services_category }}
                                        </span>
                                    </div>
                                    <div class="text-gray-500 text-md dark:text-gray-200">
                                        {!! nl2br(e($service->services_description)) !!}
                                    </div>
                                    <div class="text-gray-500 text-md my-3 dark:text-gray-200">
                                        Service fee:
                                        <span class="font-semibold text-green-600 dark:text-green-500">₱{{ $service->services_fee }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Post section -->
                    <div id="post" role="tabpanel" aria-labelledby="posts-tab">
                        @foreach($user->posts as $post)
                            <div class="bg-white shadow rounded-lg mb-6 pb-3 dark:bg-gray-700" >
                                <!-- Header -->
                                <div class="flex flex-row items-center px-2 py-3 mx-3 border-b dark:border-gray-500">
                                    <div class="w-auto h-auto rounded-full">
                                        <img class="w-10 h-10 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                                    </div>
                                    <div class="flex flex-col ml-4">
                                        <div class="text-gray-600 dark:text-gray-200 text-lg font-semibold">
                                            {{ $post->user->first_name }}
                                            {{ $post->user->last_name }}
                                        </div>
                                        <div class="flex w-full mt-1">
                                            @if (($post->user->department) == 'N/A')
                                            <div class="text-sky-700 font-base text-sm mr-1 cursor-pointer dark:text-sky-400">
                                                @if (!empty($post->user->role))
                                                {{ $post->user->role }}
                                                @endif
                                            </div>
                                            @else
                                            <div class="text-sky-700 font-base text-sm mr-1 cursor-pointer dark:text-sky-400">
                                                {{ $post->user->role }} | {{ $post->user->department }}
                                            </div>
                                            @endif
                                            <div class="text-gray-400 font-thin text-sm">
                                                • {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 px-2">
                                    @if ($post->post_picture)
                                    <img class="rounded w-full h-96 object-cover" src="{{ asset('storage/' . $post->post_picture) }}">
                                    @endif
                                </div>
                                <div class="mx-3 px-2">
                                    <div class="text-gray-500 text-2xl font-semibold mb-2 dark:text-gray-200">
                                        {{ $post->post_title }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                            List type: {{ $post->post_list_type }}
                                        </span>
                                    </div>
                                    <div class="text-gray-500 text-md dark:text-gray-200">
                                        {!! nl2br(e($post->post_content)) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Trading section -->
                    <div id="trade" role="tabpanel" aria-labelledby="trades-tab">
                        @foreach($user->trades as $trade)
                            <div class="bg-white shadow rounded-lg mb-6 pb-3 dark:bg-gray-700" >
                                <!-- Header -->
                                <div class="flex flex-row items-center px-2 py-3 mx-3 border-b dark:border-gray-500">
                                    <div class="w-auto h-auto rounded-full">
                                        <img class="w-10 h-10 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                                    </div>
                                    <div class="flex flex-col ml-4">
                                        <div class="text-gray-600 dark:text-gray-200 text-lg font-semibold">
                                            {{ $trade->user->first_name }}
                                            {{ $trade->user->last_name }}
                                        </div>
                                        <div class="flex w-full mt-1">
                                            @if (($trade->user->department) == 'N/A')
                                            <div class="text-sky-700 font-base text-sm mr-1 cursor-pointer dark:text-sky-400">
                                                @if (!empty($trade->user->role))
                                                {{ $trade->user->role }}
                                                @endif
                                            </div>
                                            @else
                                            <div class="text-sky-700 font-base text-sm mr-1 cursor-pointer dark:text-sky-400">
                                                {{ $trade->user->role }} | {{ $trade->user->department }}
                                            </div>
                                            @endif
                                            <div class="text-gray-400 font-thin text-sm">
                                                • {{ \Carbon\Carbon::parse($trade->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-7 mt-6 mx-3 px-2">
                                    @if ($trade->trade_picture)
                                    <img class="rounded w-full h-96 object-cover" src="{{ asset('storage/' . $trade->trade_picture) }}">
                                    @endif
                                </div>
                                <div class="mx-3 px-2">
                                    <div class="text-gray-500 text-2xl font-semibold mb-2 dark:text-gray-200">{{ $trade->trade_title }}</div>
                                    <div class="mb-2">
                                        <span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                            Category: {{ $trade->trade_category }}
                                        </span>
                                        <span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                            Type: {{ $trade->trade_type }}
                                        </span>
                                        <span class="inline-block bg-gray-100 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold dark:bg-gray-600 dark:text-gray-300">
                                            Status: {{ $trade->trade_status }}
                                        </span>
                                    </div>
                                    <div class="text-gray-500 text-md dark:text-gray-200">{!! nl2br(e($trade->trade_conditions)) !!}</div>
                                    <div class="text-gray-500 text-m dark:text-gray-200">{!! nl2br(e($trade->trade_description)) !!}</div>
                                    <div class="text-gray-500 text-md mb-6 dark:text-gray-200">
                                        Trade value:
                                        <span class="font-semibold text-green-600 dark:text-green-500">₱{{ $trade->trade_value }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </article>
        </main>
    </div>
@endsection
