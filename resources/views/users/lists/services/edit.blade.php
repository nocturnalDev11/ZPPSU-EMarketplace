@extends('users.layouts.nav')

@section('content')
    <section class="bg-white mt-24">
        <div class="max-w-2xl px-4 mx-auto">
            <!-- Breadcrumb -->
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
                        <div class="flex items-center">
                            <a href="{{ route('services.show', $service->id) }}" class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">Service details</span>
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">Update trading</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mb-4 text-xl font-bold text-gray-900">Update service</h2>
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <!-- Edit photo -->
                    <div class="sm:col-span-2">
                        <label for="fileInput" class="flex flex-col items-center justify-center w-full h-36 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="services_picture" id="fileInput" type="file" class="hidden" />
                        </label>
                    </div>
                    <!-- Container for uploaded images -->
                    <div id="preview" class="my-2 flex">
                        <!-- Dynamically adds image preview -->
                        @if ($service->services_picture)
                            <img src="{{ asset('storage/' . $service->services_picture) }}" class="flex flex-col items-center justify-center object-cover w-36 h-36 rounded-lg cursor-pointer" alt="Service">
                        @endif
                    </div>
                    <!-- Service title -->
                    <div class="sm:col-span-2">
                        <label for="services_title" class="block mb-2 text-sm font-medium text-gray-900">Service title</label>
                        <input type="text" name="services_title" id="services_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('services_title', $service->services_title) }}" placeholder="Type service name" required="">
                    </div>
                    <!-- Service fee -->
                    <div>
                        <label for="services_fee" class="block mb-2 text-sm font-medium text-gray-900">Service fee</label>
                        <input type="number" name="services_fee" id="services_fee" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('services_fee', $service->services_fee) }}" placeholder="₱299" required="">
                    </div>
                    <!-- Service category -->
                    <div>
                        <label for="services_category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="services_category" name="services_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="" disabled>Select services category</option>
                            <option value="Tutoring services" {{ old('services_category', $service->services_category) == 'Tutoring services' ? 'selected' : '' }}>Tutoring Services</option>
                            <option value="Video editing" {{ old('services_category', $service->services_category) == 'Video editing' ? 'selected' : '' }}>Video Editing</option>
                            <option value="Photo editing" {{ old('services_category', $service->services_category) == 'Photo editing' ? 'selected' : '' }}>Photo editing</option>
                            <option value="Videography" {{ old('services_category', $service->services_category) == 'Videography' ? 'selected' : '' }}>Videography</option>
                            <option value="Photography" {{ old('services_category', $service->services_category) == 'Photography' ? 'selected' : '' }}>Photography</option>
                            <option value="Writing" {{ old('services_category', $service->services_category) == 'Writing' ? 'selected' : '' }}>Writing</option>
                            <option value="Coding services" {{ old('services_category', $service->services_category) == 'Coding services' ? 'selected' : '' }}>Coding services</option>
                            <option value="Drawing" {{ old('services_category', $service->services_category) == 'Drawing' ? 'selected' : '' }}>Drawing</option>
                            <option value="Painting" {{ old('services_category', $service->services_category) == 'Painting' ? 'selected' : '' }}>Painting</option>
                            <option value="Catering" {{ old('services_category', $service->services_category) == 'Catering' ? 'selected' : '' }}>Catering</option>
                            <option value="Troubleshooting" {{ old('services_category', $service->services_category) == 'Troubleshooting' ? 'selected' : '' }}>Troubleshooting</option>
                            <option value="Repair services" {{ old('services_category', $service->services_category) == 'Repair services' ? 'selected' : '' }}>Repair servicesr</option>
                        </select>
                    </div>
                    <!-- Service description -->
                    <div class="sm:col-span-2">
                        <label for="services_description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea id="services_description" name="services_description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Write a service description here...">{{ old('services_description', $service->services_description) }}</textarea>
                    </div>
                </div>
                <div class="grid mb-4 grid-cols-2 space-x-4">
                    <button type="submit" class="text-gray-500 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update service
                    </button>
                    <button type="button" class="text-red-600 hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

