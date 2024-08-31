@extends('users.layouts.menu')

@section('content')
    <div class="mt-24 container xl:ml-80 lg:ml-80 md:ml-0 ml-0 dark:bg-gray-800 font-sans">
        <main>
            <article class="h-screen">
                <h1 class="text-3xl font-semibold mb-6 text-black text-center">{{ __('Personal details | Update') }}</h1>
                <div class="bg-gradient-to-br from-pink-50 via-sky-50 to-teal-50 gap-6 flex xl:flex-row lg:flex-row md:flex-col flex-col shadow w-3/4 mx-auto rounded-lg p-10 mb-6 dark:bg-gray-700">
                    <form action="{{ route('profile.update.picture', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="sm:col-span-2 mx-auto" id="dropzone-container">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-64 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span></p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input name="profile_picture" id="dropzone-file" type="file" class="hidden" />
                            </label>
                        </div>
    
                        @php
                            $baseClasses = 'h-64 w-64 mb-2 justify-center items-center hidden';
                            $additionalClasses = 'flex';
                            $allClasses = $baseClasses . ' ' . $additionalClasses;
                        @endphp
                        <div id="image-preview" class="{{ $allClasses }}">
                            <!-- Dynamically adds image preview -->
                        </div>
    
                        <button type="submit" class="mt-2 text-white inline-flex items-center bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Update Profile Picture
                        </button>
                    </form>
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" class="space-y-4 w-3/4">
                        @csrf
                        @method('POST')
                        <!-- First name -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-1/2">
                                <label for="first_name" class="block text-sm font-medium text-gray-500">{{ __('First name') }}</label>
                                <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('first_name') is-invalid @enderror" value="{{ $user->first_name }}" required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="middle_name" class="block text-sm font-medium text-gray-500">{{ __('Middle name') }}</label>
                                <input type="text" id="middle_name" name="middle_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('middle_name') is-invalid @enderror" value="{{ $user->middle_name }}">
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Last name and suffix -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-3/4">
                                <label for="last_name" class="block text-sm font-medium text-gray-500">{{ __('Last name') }}</label>
                                <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('last_name') is-invalid @enderror" value="{{ $user->last_name }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/4">
                                <label for="suffix" class="block text-sm font-medium text-gray-500">{{ __('Suffix') }}</label>
                                <select id="suffix" name="suffix" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('suffix') is-invalid @enderror">
                                    <option value="N/A" {{ $user->suffix == 'N/A' ? 'selected' : '' }}>N/A</option>
                                    <option value="Jr" {{ $user->suffix == 'Jr' ? 'selected' : '' }}>Jr</option>
                                    <option value="Sr" {{ $user->suffix == 'Sr' ? 'selected' : '' }}>Sr</option>
                                </select>
                                @error('suffix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- DOB and gender -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <!-- DOB -->
                            <div class="w-1/2">
                                <label for="dob" class="block text-sm font-medium text-gray-500">{{ __('Date of birth') }}</label>
                                <input type="date" id="dob" name="dob" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('dob') is-invalid @enderror" value="{{ $user->dob }}">
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Gender -->
                            <div class="w-1/2">
                                <label for="gender" class="block text-sm font-medium text-gray-500">{{ __('Gender') }}</label>
                                <select id="gender" name="gender" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('gender') is-invalid @enderror">
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="about" class="block text-sm font-medium text-gray-500">{{ __('About') }}</label>
                            <textarea id="about" name="about" rows="4" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('about') is-invalid @enderror" value="{{ $user->about }}"></textarea>
                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <!-- Contact number -->
                        <div class="mb-4">
                            <label for="contact_number" class="block text-sm font-medium text-gray-500">{{ __('Contact number') }}</label>
                            <input type="text" id="contact_number" name="contact_number" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('email') is-invalid @enderror" value="{{ $user->contact_number }}">
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-500">{{ __('Email Address') }}</label>
                            <input type="email" id="email" name="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('email') is-invalid @enderror" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Home address -->
                        <div class="mb-4">
                            <label for="home_address" class="block text-sm font-medium text-gray-500">{{ __('Home address') }}</label>
                            <input type="text" id="home_address" name="home_address" class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 @error('email') is-invalid @enderror" value="{{ $user->home_address }}">
                            @error('home_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Update Button -->
                        <div class="flex justify-center mb-4">
                            <button type="submit" class="w-full py-2 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-bl text-white text-lg font-semibold rounded-md hover:bg-yellow transition-colors duration-300">{{ __('Update details') }}</button>
                        </div>
                    </form>
                </div>
            </article>
        </main>
    </div>
    <script>
        const firstNameInput = document.getElementById('first_name');
        const middleNameInput = document.getElementById('middle_name');
        const lastNameInput = document.getElementById('last_name');
        const outputText = document.getElementById('output-text');
    
        function updateOutputText() {
            outputText.textContent = `${firstNameInput.value} ${middleNameInput.value} ${lastNameInput.value}`;
        }
    
        firstNameInput.addEventListener('input', updateOutputText);
        middleNameInput.addEventListener('input', updateOutputText);
        lastNameInput.addEventListener('input', updateOutputText);
    
        document.addEventListener('DOMContentLoaded', function() {
            function setupFileUploadAndPreview(dropzoneId, imagePreviewContainerId, dropzoneContainerId) {
                const dropzone = document.getElementById(dropzoneId);
                const imagePreviewContainer = document.getElementById(imagePreviewContainerId);
                const dropzoneContainer = document.getElementById(dropzoneContainerId);
    
                dropzone.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function(e) {
                            const imgSrc = e.target.result;
    
                            const imgElement = document.createElement('img');
                            imgElement.src = imgSrc;
                            imgElement.className = 'w-full h-full object-cover rounded-lg';
    
                            imagePreviewContainer.innerHTML = '';
                            imagePreviewContainer.appendChild(imgElement);
    
                            imagePreviewContainer.classList.remove('hidden');
    
                            dropzoneContainer.style.display = 'none';
                        };
                    } else {
                        imagePreviewContainer.classList.add('hidden');
                    }
                });
            }
    
            setupFileUploadAndPreview('dropzone-file', 'image-preview', 'dropzone-container');
        });
    </script>
@endsection
