@extends('admin.layouts.nav')

@section('content')
    <main class="container w-full mx-auto h-screen pt-20 px-10 dark:bg-gray-900">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}" wire:navigate
                        class="inline-flex items-center text-md font-medium text-gray-700 dark:text-gray-100">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-md font-medium text-gray-500 dark:text-gray-300 md:ms-2">All products</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="grid gap-4 px-4 md:grid-cols-2 xl:grid-cols-3">
            <!-- Total of products available -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <div class="px-4 text-gray-600 dark:text-gray-400">
                    <h3 class="py-3">Total of products available</h3>
                </div>
                <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                    <div class="flex items-center justify-between gap-4">
                        <div class="font-medium text-4xl text-gray-800 dark:text-white">
                            <div>{{ $totalProductsAvailable }}</div>
                        </div>
                        <div class="bg-gradient-to-br from-orange-300 to-orange-500 p-2 rounded-md">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Out of Stock -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <div class="px-4 text-gray-600 dark:text-gray-400">
                    <h3 class="py-3">Out of Stock</h3>
                </div>
                <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                    <div class="flex items-center justify-between gap-4">
                        <div class="font-medium text-4xl text-gray-800 dark:text-white">
                            <div>{{ $totalProductsOS }}</div>
                        </div>
                        <div class="bg-gradient-to-br from-pink-500 to-sky-500 p-2 rounded-md">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Closed -->
            <div class="p-4 bg-gray-50 rounded-lg shadow-md sm:p-6 dark:bg-gray-800">
                <div class="px-4 text-gray-600 dark:text-gray-400">
                    <h3 class="py-3">Closed</h3>
                </div>
                <div class="h-16 px-4 text-gray-400 dark:border-gray-600">
                    <div class="flex items-center justify-between gap-4">
                        <div class="font-medium text-4xl text-gray-800 dark:text-white">
                            <div>{{ $closed }}</div>
                        </div>
                        <div class="bg-gradient-to-br from-green-400 to-sky-400 p-2 rounded-md">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('admin.lists.user-product')
    </main>
@endsection
