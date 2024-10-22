@extends('users.layouts.nav')

@section('content')
    <section class="pt-48 h-screen dark:bg-gray-900">
        <div class="container flex flex-col justify-center mx-auto sm:py-12 lg:py-24 lg:flex-row lg:justify-between">
            <div class="flex flex-col justify-center p-6 text-center rounded-sm lg:max-w-md xl:max-w-lg lg:text-left dark:text-gray-300">
                <h1 class="text-5xl font-bold leading-none sm:text-6xl">ZPPSU<br>
                    <span class="light:text-violet-600">E-Marketplace</span>
                </h1>
                <p class="mt-6 mb-8 text-lg sm:mb-12">Empowering Innovation and Entrepreneurship at ZPPSU:
                    <br class="hidden md:inline lg:hidden">Discover the ZPPSU E-Marketplace - Your Hub for Student
                    Creativity and Marketable Solutions."
                </p>
                @include('users.auth.get_started')
            </div>
            <div class="flex items-center justify-center p-6 mt-8 lg:mt-0 h-65 sm:h-80 lg:h-96 xl:h-112 2xl:h-128">
                <img src="{{ asset('storage/svg/front-page.svg') }}" alt="image">
            </div>
        </div>
    </section>
@endsection
