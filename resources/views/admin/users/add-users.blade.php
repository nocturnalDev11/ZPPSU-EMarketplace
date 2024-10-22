<div x-data="{ modelOpen:false }">
    <button @click="modelOpen =!modelOpen" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:text-white dark:bg-gray-800 dark:border-none">
        Create user
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-[500] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-auto sm:my-24 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
            >
                <div class="flex items-center justify-end space-x-4">
                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('create.user') }}" method="POST" class="w-full">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-6">
                        <!-- First name and middle name -->
                        <div class="sm:col-span-2 flex space-x-4 w-full">
                            <div class="w-1/2">
                                <label for="first_name" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('First name') }}</label>
                                <input type="text" id="first_name" name="first_name" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('first_name') is-invalid @enderror" required>
                                @error('first_name')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <label for="middle_name" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Middle name') }}</label>
                                <input type="text" id="middle_name" name="middle_name" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('middle_name') is-invalid @enderror">
                                @error('middle_name')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Last name and suffix -->
                        <div class="sm:col-span-2 flex space-x-4 w-full">
                            <div class="w-3/4">
                                <label for="last_name" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Last name') }}</label>
                                <input type="text" id="last_name" name="last_name" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('last_name') is-invalid @enderror" required>
                                @error('last_name')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="w-1/4">
                                <label for="suffix" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Suffix') }}</label>
                                <select id="suffix" name="suffix" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('suffix') is-invalid @enderror">
                                    <option value="">Select suffix</option>
                                    <option value="N/A">N/A</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                </select>
                                @error('suffix')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- DOB and gender -->
                        <div class="sm:col-span-2 flex space-x-4 w-full">
                            <!-- DOB -->
                            <div class="w-1/2">
                                <label for="dob" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Date of birth') }}</label>
                                <input type="date" id="dob" name="dob" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('dob') is-invalid @enderror">
                                @error('dob')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Gender -->
                            <div class="w-1/2">
                                <label for="gender" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Gender') }}</label>
                                <select id="gender" name="gender" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('gender') is-invalid @enderror">
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Role and department -->
                        <div class="sm:col-span-2 flex space-x-4 w-full">
                            <!-- role -->
                            <div class="w-1/2">
                                <label for="role" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Role') }}</label>
                                <select id="role" name="role" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('role') is-invalid @enderror">
                                    <option value="">Select role</option>
                                    <option value="Student">Student</option>
                                    <option value="Faculty">Faculty</option>
                                    <option value="Staff">Staff</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Department -->
                            <div class="w-1/2">
                                <label for="department" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Department') }}</label>
                                <select id="department" name="department" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('department') is-invalid @enderror">
                                    <option value="">Select department</option>
                                    <option value="CICS">CICS</option>
                                    <option value="CME">CME</option>
                                    <option value="CTE">CTE</option>
                                    <option value="CET">CET</option>
                                    <option value="CAHSS">CAHSS</option>
                                    <option value="SBA">SBA</option>
                                    <option value="SHS">SHS</option>
                                    <option value="DRRMO">DRRMO</option>
                                    <option value="Registrar">Registrar</option>
                                    <option value="Admissions Office">Admissions Office</option>
                                    <option value="Guidance and Couseling">Guidance and Couseling</option>
                                    <option value="Medical-Dental Health Services">Medical-Dental Health Services</option>
                                    <option value="Learning Commons Center">Learning Commons Center</option>
                                </select>
                                @error('department')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- University id and Username -->
                        <div class="sm:col-span-2 flex space-x-4 w-full">
                            <!-- University ID -->
                            <div class="w-1/2">
                                <label for="university_id" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('University ID') }}</label>
                                <input type="text" id="university_id" name="university_id" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('university_id') is-invalid @enderror">
                                @error('university_id')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Username -->
                            <div class="w-1/2">
                                <label for="username" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Username') }}</label>
                                <input type="text" id="username" name="username" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('username') is-invalid @enderror">
                                @error('username')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-2 flex space-x-4 w-full">
                            <!-- Contact number -->
                            <div class="w-1/2">
                                <label for="contact_number" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Contact number') }}</label>
                                <input type="text" id="contact_number" name="contact_number" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('email') is-invalid @enderror">
                                @error('contact_number')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="w-1/2">
                                <label for="email" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Email Address') }}</label>
                                <input type="email" id="email" name="email" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Home address -->
                        <div class="sm:col-span-2">
                            <label for="home_address" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Home address') }}</label>
                            <input type="text" id="home_address" name="home_address" class="mt-1 p-2 w-full text-gray-800 text-sm border px-4 py-3 rounded-md border-gray-300 focus:border-gray-200 focus:ring-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('email') is-invalid @enderror">
                            @error('home_address')
                                <span class="invalid-feedback text-red-700 dark:text-red-500" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Password -->
                        <div class="sm:col-span-2" x-data="{ showPassword: false }">
                            <label for="password" class="block text-sm font-medium text-gray-500 dark:text-white">{{ __('Password') }}</label>
                            <div class="relative flex items-center">
                                <input :type="showPassword ? 'text' : 'password'" name="password" id="password" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50 @error('password') is-invalid @enderror" placeholder="Enter new password" required/>
                                <svg @click="showPassword = !showPassword" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                    <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                                </svg>
                            </div>
                            @error('password')
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- Confirm Password -->
                        <div class="sm:col-span-2" x-data="{ showPassword: false }">
                            <label for="password-confirm" class="text-gray-800 text-sm mb-2 block dark:text-gray-200">Confirm password</label>
                            <div class="relative flex items-center">
                                <input :type="showPassword ? 'text' : 'password'" name="password_confirmation" id="password-confirm" class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300 dark:text-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:focus:border-gray-500 dark:focus:ring-2 dark:focus:ring-gray-500 dark:focus:ring-offset-0 dark:focus:ring-opacity-50" placeholder="Enter confirm password" required/>
                                <svg @click="showPassword = !showPassword" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                    <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center my-3">
                        <button type="submit" class="w-full py-2 bg-gradient-to-r from-gray-100 to-gray-200 hover:bg-gradient-to-bl text-gray-500 text-lg font-semibold rounded-md hover:bg-yellow transition-colors duration-300">{{ __('Add user') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
