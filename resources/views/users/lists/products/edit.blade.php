@extends('users.layouts.nav')

@section('content')
    <section class="bg-white mt-16">
        <div class="max-w-2xl px-4 py-8 mx-auto">
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
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">Update product</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mb-4 text-xl font-bold text-gray-900">Update product</h2>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input name="prod_picture" id="fileInput" type="file" class="hidden" />
                        </label>
                    </div>
                    <!-- Container for uploaded images -->
                    <div id="preview" class="my-2 flex">
                        <!-- Dynamically adds image preview -->
                        <img src="{{ asset('storage/' . $product->prod_picture) }}" class="flex flex-col items-center justify-center object-cover w-36 h-36 rounded-lg cursor-pointer" alt="Product">
                    </div>
                    <!-- Product name -->
                    <div class="sm:col-span-2">
                        <label for="prod_name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                        <input type="text" name="prod_name" id="prod_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('prod_name', $product->prod_name) }}" placeholder="Type product name" required="">
                    </div>
                    <!-- Product price -->
                    <div class="sm:col-span-2">
                        <label for="prod_price" class="block mb-2 text-sm font-medium text-gray-900">Product price</label>
                        <input type="number" name="prod_price" id="prod_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('prod_price', $product->prod_price) }}" placeholder="₱299" required="">
                    </div>
                    <div>
                        <label for="prod_status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select id="prod_status" name="prod_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="Available" {{ $product->prod_status == 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="Out of Stock" {{ $product->prod_status == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                            <option value="Pre-Order" {{ $product->prod_status == 'Pre-Order' ? 'selected' : '' }}>Pre-Order</option>
                            <option value="Backordered" {{ $product->prod_status == 'Backordered' ? 'selected' : '' }}>Backordered</option>
                            <option value="Discontinued" {{ $product->prod_status == 'Discontinued' ? 'selected' : ''}}>Discontinued</option>
                            <option value="Closed" {{ $product->prod_status == 'Closed' ? 'selected' : ''}}>Closed</option>
                        </select>
                    </div>
                    <!-- Product category -->
                    <div>
                        <label for="prod_category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="prod_category" name="prod_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="Apparel" {{ $product->prod_category == 'Apparel' ? 'selected' : '' }}>Apparel</option>
                            <option value="School supplies" {{ $product->prod_category == 'School supplies' ? 'selected' : '' }}>School Supplies</option>
                            <option value="Stationery" {{ $product->prod_category == 'Stationery' ? 'selected' : '' }}>Stationery</option>
                            <option value="Electronics" {{ $product->prod_category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                            <option value="University merchandise" {{ $product->prod_category == 'University merchandise' ? 'selected' : '' }}>University Merchandise</option>
                        </select>
                    </div>
                    <!-- Product condition -->
                    <div>
                        <label for="prod_condition" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="prod_condition" name="prod_condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option value="New" {{ $product->prod_condition == 'New' ? 'selected' : '' }}>New</option>
                        <option value="Used - like new" {{ $product->prod_condition == 'Used - like new' ? 'selected' : '' }}>Used - Like new</option>
                        <option value="Used - like good" {{ $product->prod_condition == 'Used - like good' ? 'selected' : '' }}>Used - Like good</option>
                        <option value="Used - like fair" {{ $product->prod_condition == 'Used - like fair' ? 'selected' : '' }}>Used - Like fair</option>
                        </select>
                    </div>
                    <!-- Product description -->
                    <div class="sm:col-span-2">
                        <label for="prod_description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea id="prod_description" name="prod_description" rows="7" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Write a product description here...">{{ old('prod_description', $product->prod_description) }}</textarea>
                    </div>
                </div>
                <div class="grid mb-4 grid-cols-2 space-x-4">
                    <button type="submit" class="text-gray-500 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update product
                    </button>
                    <button type="button" class="text-red-600 hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Delete
                    </button>
                </div>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dropzone = document.getElementById('dropzone-file');
                const imagePreviewContainer = document.getElementById('image-preview-container');

                dropzone.addEventListener('change', handleFileUpload);

                function handleFileUpload(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function(e) {
                            const imgSrc = e.target.result;

                            // Create a new image element
                            const imgElement = document.createElement('img');
                            imgElement.src = imgSrc;

                            // Adjust image size as needed
                            imgElement.style.width = '65px'; // Example: set width to 200px
                            imgElement.style.height = '65px'; // Maintain aspect ratio

                            // Create a container for the image
                            const imageBox = document.createElement('div');
                            imageBox.classList.add('relative', 'overflow-hidden', 'aspect-ratio-4/3', 'bg-gray-200', 'rounded-lg', 'mr-4', 'mb-4');
                            imageBox.appendChild(imgElement);

                            // Append the image box to the preview container
                            imagePreviewContainer.appendChild(imageBox);
                        };
                    }
                }
            });
        </script>
    </section>
@endsection
