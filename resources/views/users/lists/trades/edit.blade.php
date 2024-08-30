@extends('users.layouts.nav')

@section('content')
<section class="bg-white mt-16">
    <div class="max-w-2xl px-4 py-8 mx-auto">
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
                        <a href="{{ route('trades.show', $trade->id) }}" class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">Trading details</span>
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
        <h2 class="mb-4 text-xl font-bold text-gray-900">Update trading</h2>
        <form action="{{ route('trades.update', $trade->id) }}" method="POST" enctype="multipart/form-data">
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
                        <input name="trade_picture" id="fileInput" type="file" class="hidden" multiple>
                    </label>
                </div>
                <!-- Container for uploaded images -->
                <div id="preview" class="my-2 flex">
                    <!-- Dynamically adds image preview -->
                    @if ($trade->trade_picture)
                        <img src="{{ asset('storage/' . $trade->trade_picture) }}" class="flex flex-col items-center justify-center object-cover w-36 h-36 rounded-lg cursor-pointer" alt="trade">
                    @endif
                </div>
                <!-- trade title -->
                <div class="sm:col-span-2">
                    <label for="trade_title" class="block mb-2 text-sm font-medium text-gray-900">Trade Name</label>
                    <input type="text" name="trade_title" id="trade_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('trade_title', $trade->trade_title) }}" placeholder="Type trade name" required="">
                </div>
                <!-- trade category -->
                <div class="sm:col-span-2">
                    <label for="trade_category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <select id="trade_category" name="trade_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value="Apparel" {{ $trade->trade_category == 'Apparel' ? 'selected' : '' }}>Apparel</option>
                        <option value="School supplies" {{ $trade->trade_category == 'School supplies' ? 'selected' : '' }}>School Supplies</option>
                        <option value="Stationery" {{ $trade->trade_category == 'Stationery' ? 'selected' : '' }}>Stationery</option>
                        <option value="Electronics" {{ $trade->trade_category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                        <option value="University merchandise" {{ $trade->trade_category == 'University merchandise' ? 'selected' : '' }}>University Merchandise</option>
                    </select>
                </div>
                <!-- trade description -->
                <div class="sm:col-span-2">
                    <label for="trade_description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea id="trade_description" name="trade_description" rows="7" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Write a trade description here...">{{ old('trade_description', $trade->trade_description) }}</textarea>
                </div>
                <!-- trade status -->
                <div>
                    <label for="trade_status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                    <select id="trade_status" name="trade_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value="Available" {{ $trade->trade_status == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Pending" {{ $trade->trade_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In-Progress" {{ $trade->trade_status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ $trade->trade_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Cancelled" {{ $trade->trade_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="Expired" {{ $trade->trade_status == 'Expired' ? 'selected' : '' }}>Expired</option>
                        <option value="Negotiating" {{ $trade->trade_status == 'Negotiating' ? 'selected' : '' }}>Negotiating</option>
                        <option value="Closed" {{ $trade->trade_status == 'Closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>
                <!-- trade type -->
                <div>
                    <label for="trade_type" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                    <select id="trade_type" name="trade_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value="Buy" {{ $trade->trade_type == 'Buy' ? 'selected' : '' }}>Buy</option>
                        <option value="Sell" {{ $trade->trade_type == 'Sell' ? 'selected' : '' }}>Sell</option>
                        <option value="Exchange" {{ $trade->trade_type == 'Exchange' ? 'selected' : '' }}>Exchange</option>
                        <option value="Donation" {{ $trade->trade_type == 'Donation' ? 'selected' : '' }}>Donation</option>
                        <option value="Rental" {{ $trade->trade_type == 'Rental' ? 'selected' : '' }}>Rental</option>
                        <option value="Service offering" {{ $trade->trade_type == 'Service offering' ? 'selected' : '' }}>Service Offering</option>
                        <option value="Service request" {{ $trade->trade_type == 'Service request' ? 'selected' : '' }}>Service Request</option>
                        <option value="Barter" {{ $trade->trade_type == 'Barter' ? 'selected' : '' }}>Barter</option>
                    </select>
                </div>
                <!-- trade value -->
                <div class="sm:col-span-2">
                    <label for="trade_value" class="block mb-2 text-sm font-medium text-gray-900">Trade value</label>
                    <input type="number" name="trade_value" id="trade_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('trade_value', $trade->trade_value) }}" placeholder="₱299" required="">
                </div>
                <!-- trade conditions -->
                <div class="sm:col-span-2">
                    <label for="trade_conditions" class="block mb-2 text-sm font-medium text-gray-900">Conditions</label>
                    <textarea id="trade_conditions" name="trade_conditions" rows="7" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Write trade conditions here...">{{ old('trade_conditions', $trade->trade_conditions) }}</textarea>
                </div>
            </div>
            <div class="grid mb-4 grid-cols-2 space-x-4">
                <button type="submit" class="text-gray-500 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update trading
                </button>
                <button type="button" class="text-red-600 hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Delete
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
