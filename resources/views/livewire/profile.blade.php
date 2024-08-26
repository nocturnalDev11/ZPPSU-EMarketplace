<div class="bg-white shadow rounded-lg mb-6 w-full dark:bg-gray-700">
    <ul class="flex flex-wrap justify-center text-xl font-medium" role="tablist">
        <li class="p-3" role="presentation">
            <button type="button" wire:click="setActiveTab('products')" class="inline-block px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 @if($activeTab === 'products') bg-gray-100 dark:bg-gray-800 text-purple-600 dark:text-purple-500 @else text-gray-500 dark:text-gray-400 @endif">
                Products
            </button>
        </li>
        <li class="p-3" role="presentation">
            <button type="button" wire:click="setActiveTab('services')" class="inline-block px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 @if($activeTab === 'services') bg-gray-100 dark:bg-gray-800 text-purple-600 dark:text-purple-500 @else text-gray-500 dark:text-gray-400 @endif">
                Services
            </button>
        </li>
        <li class="p-3" role="presentation">
            <button type="button" wire:click="setActiveTab('posts')" class="inline-block px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 @if($activeTab === 'posts') bg-gray-100 dark:bg-gray-800 text-purple-600 dark:text-purple-500 @else text-gray-500 dark:text-gray-400 @endif">
                Posts
            </button>
        </li>
        <li class="p-3" role="presentation">
            <button type="button" wire:click="setActiveTab('trades')" class="inline-block px-4 py-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 @if($activeTab === 'trades') bg-gray-100 dark:bg-gray-800 text-purple-600 dark:text-purple-500 @else text-gray-500 dark:text-gray-400 @endif">
                Trades
            </button>
        </li>
    </ul>
</div>
<div id="lists-tab-content">
    <!-- Products section -->
    @if ($activeTab === 'products')
        <div>
            <div class="bg-white shadow rounded-lg dark:bg-gray-700" >
                <!-- Header -->
                <div class="flex flex-row items-center px-2 py-3 mx-3 border-b-2 dark:border-gray-500">
                    <div class="w-auto h-auto rounded-full">
                        <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                    </div>
                    <div class="flex flex-col mb-2 ml-4 mt-1">
                        <div class="text-gray-600 dark:text-gray-200 text-xl font-semibold">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </div>
                        <div class="flex w-full mt-1">
                            @if (($user->department) == 'N/A')
                                <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                    @if (!empty($user->role))
                                        {{ $user->role }}
                                    @endif
                                </div>
                            @else
                                <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                    {{ $user->role }}
                                </div>
                                <div class="text-gray-400 font-thin text-md">
                                    • {{ $user->department }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 p-2">
                    @if ($products->isEmpty())
                        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                            <div class="mx-auto max-w-screen-sm text-center">
                                <img src="{{ asset('storage/svg/products_section.svg') }}" alt="Illustration of empty products section" class="mx-auto block w-80 h-80 mb-4">
                                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Products section empty</p>
                                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-200">There are no products available in this section. Add some products to continue.</p>
                                @can('create', \App\Models\Product::class)
                                    <button type="button" data-modal-target="product-modal" data-modal-toggle="product-modal" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">
                                        Add products
                                    </button>
                                @endcan
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-2 mb-6">
                            @foreach($user->products as $product)
                                <a href="{{ route('products.show', $product->id) }}" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden dark:bg-gray-800">
                                    <div class="flex items-end justify-end h-56 w-full bg-cover center" style="background-image: url('{{ asset('storage/' . $product->prod_picture) }}')">
                                        <button class="px-2 rounded-md bg-green-600 text-white mx-5 -mb-4 hover:bg-green-500 focus:outline-none focus:bg-green-500">
                                            ₱{{ $product->prod_price }}
                                        </button>
                                    </div>
                                    <div class="px-5 py-3">
                                        <h3 class="text-gray-700 uppercase dark:text-white">{{ $product->prod_name }}</h3>
                                        <span class="block text-gray-500 mt-2 truncate dark:text-gray-300">{{ $product->prod_description }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

    <!-- Service section -->
    @elseif ($activeTab === 'services')
        <div id="service" role="tabpanel" aria-labelledby="services-tab">
            @if ($services->isEmpty())
                <div class="bg-white shadow rounded-lg dark:bg-gray-700" >
                    <!-- Header -->
                    <div class="flex flex-row items-center px-2 py-3 mx-3 border-b-2 dark:border-gray-500">
                        <div class="w-auto h-auto rounded-full">
                            <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                        </div>
                        <div class="flex flex-col mb-2 ml-4 mt-1">
                            <div class="text-gray-600 dark:text-gray-200 text-xl font-semibold">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </div>
                            <div class="flex w-full mt-1">
                                @if (($user->department) == 'N/A')
                                    <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                        @if (!empty($user->role))
                                            {{ $user->role }}
                                        @endif
                                    </div>
                                @else
                                    <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                        {{ $user->role }}
                                    </div>
                                    <div class="text-gray-400 font-thin text-md">
                                        • {{ $user->department }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 p-2">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                            <div class="mx-auto max-w-screen-sm text-center">
                                <img src="{{ asset('storage/svg/services_section.svg') }}" alt="Illustration of empty products section" class="mx-auto block w-80 h-80 mb-4">
                                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Services section empty</p>
                                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-200">There are no services available in this section. Add some services to continue.</p>
                                @can('create', \App\Models\Services::class)
                                    <button type="button" data-modal-target="service-modal" data-modal-toggle="service-modal" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">
                                        Add services
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach($user->services as $service)
                    <div class="bg-white shadow rounded-lg mb-6 pb-3 dark:bg-gray-700" >
                        <!-- Header -->
                        <div class="flex flex-row items-center px-2 py-3 mx-3 border-b-2 dark:border-gray-500">
                            <div class="w-auto h-auto rounded-full">
                                <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                            </div>
                            <div class="flex flex-col mb-2 ml-4 mt-1">
                                <div class="text-gray-600 dark:text-gray-200 text-xl font-semibold">
                                    {{ $service->user->first_name }}
                                    {{ $service->user->last_name }}
                                </div>
                                <div class="flex w-full mt-1">
                                    @if (($service->user->department) == 'N/A')
                                        <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                            @if (!empty($service->user->role))
                                                {{ $service->user->role }}
                                            @endif
                                        </div>
                                    @else
                                        <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                            {{ $service->user->role }} | {{ $service->user->department }}
                                        </div>
                                    @endif
                                    <div class="text-gray-400 font-thin text-md">
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
                        <div class="text-gray-500 text-2xl font-semibold mb-2 mx-3 px-2 dark:text-gray-200">{{ $service->services_title }}</div>
                        <div class="text-gray-500 text-lg mx-3 px-2 dark:text-gray-200">{!! nl2br(e($service->services_description)) !!}</div>
                        <div class="text-gray-500 text-md mb-6 mx-3 px-2 dark:text-gray-200">
                            Service fee:
                            <span class="font-semibold text-green-600 dark:text-green-500">{{ $service->services_fee }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    <!-- Post section -->
    @elseif ($activeTab === 'posts')
        <div id="post" role="tabpanel" aria-labelledby="posts-tab">
            @if ($posts->isEmpty())
                <div class="bg-white shadow rounded-lg dark:bg-gray-700" >
                    <!-- Header -->
                    <div class="flex flex-row items-center px-2 py-3 mx-3 border-b-2 dark:border-gray-500">
                        <div class="w-auto h-auto rounded-full">
                            <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                        </div>
                        <div class="flex flex-col mb-2 ml-4 mt-1">
                            <div class="text-gray-600 dark:text-gray-200 text-xl font-semibold">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </div>
                            <div class="flex w-full mt-1">
                                @if (($user->department) == 'N/A')
                                    <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                        @if (!empty($user->role))
                                            {{ $user->role }}
                                        @endif
                                    </div>
                                @else
                                    <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                        {{ $user->role }}
                                    </div>
                                    <div class="text-gray-400 font-thin text-md">
                                        • {{ $user->department }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 p-2">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                            <div class="mx-auto max-w-screen-sm text-center">
                                <img src="{{ asset('storage/svg/post_section.svg') }}" alt="Illustration of empty posts section" class="mx-auto block w-80 h-80 mb-4">
                                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Posts section empty</p>
                                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-200">There are no posts available in this section. Add some posts to continue.</p>
                                @can('create', \App\Models\Post::class)
                                    <button type="button" data-modal-target="post-modal" data-modal-toggle="post-modal" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-mg px-5 py-2.5 text-center me-2 mb-2">
                                        Add posts
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach($user->posts as $post)
                    <div class="bg-white shadow rounded-lg mb-6 pb-3 dark:bg-gray-700" >
                        <!-- Header -->
                        <div class="flex flex-row items-center px-2 py-3 mx-3 border-b-2 dark:border-gray-500">
                            <div class="w-auto h-auto rounded-full">
                                <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                            </div>
                            <div class="flex flex-col mb-2 ml-4 mt-1">
                                <div class="text-gray-600 dark:text-gray-200 text-xl font-semibold">
                                    {{ $post->user->first_name }}
                                    {{ $post->user->last_name }}
                                </div>
                                <div class="flex w-full mt-1">
                                    @if (($post->user->department) == 'N/A')
                                        <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                            @if (!empty($post->user->role))
                                                {{ $post->user->role }}
                                            @endif
                                        </div>
                                    @else
                                        <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                            {{ $post->user->role }} | {{ $post->user->department }}
                                        </div>
                                    @endif
                                    <div class="text-gray-400 font-thin text-md">
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
                        <div class="text-gray-500 text-2xl font-semibold mb-2 mx-3 px-2 dark:text-gray-200">{{ $post->post_title }}</div>
                        <div class="text-gray-500 text-lg mx-3 px-2 dark:text-gray-200">{!! nl2br(e($post->post_content)) !!}</div>
                        <div class="text-gray-500 text-md mb-6 mx-3 px-2 dark:text-gray-200">
                            List type:
                            <span class="font-semibold text-green-600 dark:text-green-500">{{ $post->post_list_type }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    <!-- Trading section -->
    @elseif ($activeTab === 'trades')
        <div id="trade" role="tabpanel" aria-labelledby="trades-tab">
            @if ($trades->isEmpty())
                <div class="bg-white shadow rounded-lg dark:bg-gray-700" >
                    <!-- Header -->
                    <div class="flex flex-row items-center px-2 py-3 mx-3 border-b-2 dark:border-gray-500">
                        <div class="w-auto h-auto rounded-full">
                            <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                        </div>
                        <div class="flex flex-col mb-2 ml-4 mt-1">
                            <div class="text-gray-600 dark:text-gray-200 text-xl font-semibold">
                                {{ $user->first_name }} {{ $user->last_name }}
                            </div>
                            <div class="flex w-full mt-1">
                                @if (($user->department) == 'N/A')
                                    <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                        @if (!empty($user->role))
                                            {{ $user->role }}
                                        @endif
                                    </div>
                                @else
                                    <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                        {{ $user->role }}
                                    </div>
                                    <div class="text-gray-400 font-thin text-md">
                                        • {{ $user->department }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="text-gray-400 font-medium text-sm mb-7 mt-6 mx-3 p-2">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                            <div class="mx-auto max-w-screen-sm text-center">
                                <img src="{{ asset('storage/svg/trading_section.svg') }}" alt="Illustration of empty posts section" class="mx-auto block w-80 h-80 mb-4">
                                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Trading section empty</p>
                                <p class="mb-4 text-lg font-light text-gray-200">There are no tradings available in this section. Add some tradings to continue.</p>
                                @can('create', \App\Models\Trade::class)
                                    <button type="button" data-modal-target="trade-modal" data-modal-toggle="trade-modal" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-mg px-5 py-2.5 text-center me-2 mb-2">
                                        Add trading
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach($user->trades as $trade)
                    <div class="bg-white shadow rounded-lg mb-6 pb-3 dark:bg-gray-700" >
                        <!-- Header -->
                        <div class="flex flex-row items-center px-2 py-3 mx-3 border-b-2 dark:border-gray-500">
                            <div class="w-auto h-auto rounded-full">
                                <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg') }}">
                            </div>
                            <div class="flex flex-col mb-2 ml-4 mt-1">
                                <div class="text-gray-600 dark:text-gray-200 text-xl font-semibold">
                                    {{ $trade->user->first_name }}
                                    {{ $trade->user->last_name }}
                                </div>
                                <div class="flex w-full mt-1">
                                    @if (($trade->user->department) == 'N/A')
                                        <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                            @if (!empty($trade->user->role))
                                                {{ $trade->user->role }}
                                            @endif
                                        </div>
                                    @else
                                        <div class="text-sky-700 font-base text-md mr-1 cursor-pointer dark:text-sky-400">
                                            {{ $trade->user->role }} | {{ $trade->user->department }}
                                        </div>
                                    @endif
                                    <div class="text-gray-400 font-thin text-md">
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
                        <div class="text-gray-500 text-2xl font-semibold mb-2 mx-3 px-2 dark:text-gray-200">{{ $trade->trade_title }}</div>
                        <div class="text-gray-500 text-lg mx-3 px-2 dark:text-gray-200">{!! nl2br(e($trade->trade_conditions)) !!}</div>
                        <div class="text-gray-500 text-lg mx-3 px-2 dark:text-gray-200">{!! nl2br(e($trade->trade_description)) !!}</div>
                        <div class="text-gray-500 text-md mb-6 mx-3 px-2 dark:text-gray-200">
                            Trade value:
                            <span class="font-semibold text-green-600 dark:text-green-500">₱{{ $trade->trade_value }}</span>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endif
</div>
