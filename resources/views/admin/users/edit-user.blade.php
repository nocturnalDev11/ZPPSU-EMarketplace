@extends('admin.layouts.dashboard-nav')

@include('admin.layouts.side-nav')
@section('content')
<div id="main-content" class="flex overflow-hidden bg-gray-50 dark:bg-gray-900 transition-all ml-80 h-full">
    <div class="relative w-full overflow-y-auto pt-24">
        <main>
            <article class="h-screen">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.dashboard') }}" wire:navigate class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2" aria-current="page">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('admin.users.list') }}" wire:navigate class="ml-1 md:ml-2 text-sm font-medium text-gray-400 hover:text-gray-900">Users</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('admin.users.profile.show', ['id' => $user->id]) }}" class="ml-1 md:ml-2 text-sm font-medium text-gray-400 hover:text-gray-900">View user</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 md:ml-2 text-sm font-medium text-gray-700 hover:text-gray-900">Edit user</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="bg-gradient-to-br from-pink-50 via-sky-50 to-teal-50 shadow w-3/4 mx-auto rounded-lg p-10 mb-6 dark:bg-gray-700">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-row gap-5">
                            <div>
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

                                <div id="image-preview" class="h-64 w-64 mb-2 justify-center items-center hidden">
                                    <!-- Dynamically adds image preview -->
                                </div>
                            </div>
                            <div>
                                    <h3 class="mb-4 text-xl font-bold">{{  $user->first_name }} {{  $user->last_name }}</h3>
                                    <dl class="grid grid-cols-1 gap-x-8 gap-y-4 sm:grid-cols-2">
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Join Date</dt>
                                            <dd class="text-sm font-semibold text-gray-900">
                                                {{ date('M d, Y', strtotime($user->created_at)) }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Role</dt>
                                            <dd class="text-sm font-semibold text-gray-900">
                                                {{ $user->role }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">
                                                Department
                                            </dt>
                                            <dd class="text-sm font-semibold text-gray-900">
                                                {{ $user->department }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">University ID</dt>
                                            <dd class="text-sm font-semibold text-gray-900">
                                                {{ $user->university_id }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">
                                                User name
                                            </dt>
                                            <dd class="text-sm font-semibold text-gray-900">
                                                {{ $user->username }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                                            <dd class="text-sm font-semibold text-gray-900">
                                                {{ $user->email }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">
                                                Phone number
                                            </dt>
                                            <dd class="text-sm font-semibold text-gray-900">
                                                {{ $user->contact_number }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Birthday</dt>
                                            <dd class="text-sm font-semibold text-gray-900">
                                                {{ date('M d, Y', strtotime($user->dob)) }}
                                            </dd>
                                        </div>
                                    </dl>
                            </div>
                        </div>
                        <!-- First name -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-1/2">
                                <label for="first_name" class="block text-sm font-medium text-gray-500">{{ __('First name') }}</label>
                                <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('first_name') is-invalid @enderror" value="{{ old('first_name', $user->first_name) }}" required>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w-1/2">
                                <label for="middle_name" class="block text-sm font-medium text-gray-500">{{ __('Middle name') }}</label>
                                <input type="text" id="middle_name" name="middle_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('middle_name') is-invalid @enderror" value="{{ old('middle_name', $user->middle_name) }}">
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
                                <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('last_name') is-invalid @enderror" value="{{ old('last_name', $user->last_name) }}" required>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/4">
                                <label for="suffix" class="block text-sm font-medium text-gray-500">{{ __('Suffix') }}</label>
                                <select id="suffix" name="suffix" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('suffix') is-invalid @enderror">
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
                            <div class="w-1/2">
                                <label for="dob" class="block text-sm font-medium text-gray-500">{{ __('Date of birth') }}</label>
                                <input type="date" id="dob" name="dob" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('dob') is-invalid @enderror" value="{{ old('dob', $user->dob) }}" required>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="gender" class="block text-sm font-medium text-gray-500">{{ __('Gender') }}</label>
                                <select id="gender" name="gender" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('gender') is-invalid @enderror">
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

                        <!-- Role and department -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-1/2">
                                <label for="role" class="block text-sm font-medium text-gray-500">{{ __('Role') }}</label>
                                <input type="text" id="role" name="role" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('role') is-invalid @enderror" value="{{ old('role', $user->role) }}" required>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="department" class="block text-sm font-medium text-gray-500">{{ __('Department') }}</label>
                                <input type="text" id="department" name="department" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('department') is-invalid @enderror" value="{{ old('department', $user->department) }}" required>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- University ID and username -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-1/2">
                                <label for="university_id" class="block text-sm font-medium text-gray-500">{{ __('University ID') }}</label>
                                <input type="text" id="university_id" name="university_id" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('university_id') is-invalid @enderror" value="{{ old('university_id', $user->university_id) }}" required>
                                @error('university_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="username" class="block text-sm font-medium text-gray-500">{{ __('Username') }}</label>
                                <input type="text" id="username" name="username" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" required>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact number and email -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-1/2">
                                <label for="contact_number" class="block text-sm font-medium text-gray-500">{{ __('Contact number') }}</label>
                                <input type="text" id="contact_number" name="contact_number" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('contact_number') is-invalid @enderror" value="{{ old('contact_number', $user->contact_number) }}">
                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="email" class="block text-sm font-medium text-gray-500">{{ __('Email') }}</label>
                                <input type="email" id="email" name="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Home address -->
                        <div class="mb-4">
                            <label for="home_address" class="block text-sm font-medium text-gray-500">{{ __('Home address') }}</label>
                            <input type="text" id="home_address" name="home_address" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('home_address') is-invalid @enderror" value="{{ old('home_address', $user->home_address) }}">
                            @error('home_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password and Confirm Password -->
                        <div class="flex flex-row space-x-4 mb-4">
                            <div class="w-1/2">
                                <label for="password" class="block text-sm font-medium text-gray-500">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-500">{{ __('Confirm Password') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 p-2 w-full border border-gray-300 rounded-md @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Update Profile') }}</button>
                        </div>
                    </form>
                </div>
            </article>
        </main>
    </div>
</div>

<script>
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