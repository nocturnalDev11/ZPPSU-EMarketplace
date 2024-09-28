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
                            <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">Update post</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mb-4 text-xl font-bold text-gray-900">Update post</h2>
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <!-- Post title -->
                    <div class="sm:col-span-2">
                        <label for="post_title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                        <input type="text" name="post_title" id="post_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" value="{{ old('prod_name', $post->post_title) }}" placeholder="Type title here" required="">
                    </div>
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
                            <input name="post_picture" id="fileInput" type="file" class="hidden" />
                        </label>
                    </div>
                    <!-- Container for uploaded images -->
                    <div id="preview" class="my-2 flex">
                        <!-- Dynamically adds image preview -->
                        @if ($post->post_picture)
                            <img src="{{ asset('storage/' . $post->post_picture) }}" class="flex flex-col items-center justify-center object-cover w-36 h-36 rounded-lg cursor-pointer" alt="Post">
                        @endif
                    </div>
                    <!-- List type -->
                    <div class="sm:col-span-2">
                        <label for="post_list_type" class="block mb-2 text-sm font-medium text-gray-900">List type</label>
                        <select id="post_list_type" name="post_list_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="Product" {{ $post->post_list_type == 'Product' ? 'selected' : '' }}>Looking for a product</option>
                            <option value="Services" {{ $post->post_list_type == 'Services' ? 'selected' : '' }}>Looking for a services</option>
                            <option value="Trades" {{ $post->post_list_type == 'Trades' ? 'selected' : '' }}>Looking for trading</option>
                        </select>
                    </div>
                    <!-- Content -->
                    <div class="sm:col-span-2">
                        <label for="post_content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                        <textarea id="post_content" name="post_content" rows="7" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Write a content here...">{{ old('post_content', $post->post_content) }}</textarea>
                    </div>
                </div>
                <div class="grid mb-4 grid-cols-2 space-x-4">
                    <button type="submit" class="text-gray-500 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update post
                    </button>
                    <button data-modal-target="delete-post-modal" data-modal-toggle="delete-post-modal" type="button" class="text-red-600 hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
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
