@extends('layouts.nav')
@section('content')
    <section class="pt-48 h-screen dark:bg-gray-900">
        <div class="container flex flex-col justify-center mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
            <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left dark:text-gray-300">
                <h1 class="text-5xl font-bold leading-none sm:text-6xl">ZPPSU<br>
                    <span class="light:text-violet-600">E-Marketplace</span>
                </h1>
                <p class="mt-6 mb-8 text-lg sm:mb-12">Empowering Innovation and Entrepreneurship at ZPPSU:
                    <br class="hidden md:inline lg:hidden">Discover the ZPPSU E-Marketplace - Your Hub for Student Creativity and Marketable Solutions."
                </p>
                <div class="flex flex-col space-y-4 sm:items-center sm:justify-center sm:flex-row sm:space-y-0 sm:space-x-4 lg:justify-start">
                    <a href="{{ route('register') }}" wire:navigate class="px-8 py-3 text-lg font-semibold rounded bg-gradient-to-br from-red-600 to-orange-400 hover:bg-gradient-to-bl text-gray-100">
                        Get started
                    </a>
                    {{-- <a rel="noopener noreferrer" href="#" class="px-8 py-3 text-lg font-semibold border rounded border-maroon text-maroon">Ipsum</a> --}}
                </div>
            </div>
            <div class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-65 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                <img src="{{ asset('storage/svg/front-page.svg') }}" alt="image">
            </div>
        </div>
    </section>
@endsection
