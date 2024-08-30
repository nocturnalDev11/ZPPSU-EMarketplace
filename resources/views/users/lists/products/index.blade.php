@extends('users.layouts.nav')

@section('content')
    @include('users.layouts.side-nav')
    <main class="container xl:ml-80 lg:ml-80 md:ml-0 ml-0 mx-auto h-auto mt-20">
        <!-- Breadcrumb -->
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('users.home') }}" class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
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
                        <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">All products</span>
                    </div>
                </li>
            </ol>
        </nav>

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
        </div>
    </main>
@endsection
