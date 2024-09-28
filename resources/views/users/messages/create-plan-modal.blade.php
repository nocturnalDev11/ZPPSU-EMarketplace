{{-- <div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" type="button" class="w-full text-gray-600 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
        Add a plan
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
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800 ">Create a post</h1>

                    <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('messages.createPlan') }}" method="POST" class="mt-5" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="recipient_id" value="{{ $selectedUser->id }}">
                    <div class="grid gap-2 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Select your meetup preference</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-2">
                                <li>
                                    <input type="radio" id="public_meetup" name="plan_meetup" value="Public meetup" class="hidden peer" />
                                    <label for="public_meetup" class="inline-flex items-center justify-center w-full px-5 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="w-full text-md font-semibold">Public meetup</div>
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="campus_meetup" name="plan_meetup" value="Campus meetup" class="hidden peer" />
                                    <label for="campus_meetup" class="inline-flex items-center justify-center w-full px-5 py-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div class="block">
                                            <div class="w-full text-md font-semibold">Campus meetup</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="plan_date" class="block text-sm text-gray-700 dark:text-gray-200">Date</label>
                            <input id="plan_date" name="plan_date" type="date" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="plan_time" class="block text-sm text-gray-700 dark:text-gray-200">Time</label>
                            <input id="plan_time" name="plan_time" type="time" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>

                        <div class="col-span-2">
                            <label for="plan_location" class="block text-sm text-gray-700 dark:text-gray-200">Location</label>
                            <input id="plan_location" name="plan_location" type="text" placeholder="Enter meetup location" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        </div>

                        <div class="col-span-2">
                            <label for="plan_notes" class="block text-sm text-gray-700 dark:text-gray-200">Notes (optional)</label>
                            <textarea id="plan_notes" name="plan_notes" placeholder="Any additional notes..." class="scroll-on w-full resize-none block px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" rows="4"></textarea>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:ring-none">
                            Add plan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div> --}}
