<!-- Main modal -->
<div id="message-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Send message to {{ $user->first_name }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="message-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                @csrf
                <input type="hidden" name="recipient_id" value="{{ $user->id }}">
                <!-- Textarea -->
                <div class="relative">
                    <textarea name="content" id="hs-textarea-ex-2"
                            class="p-4 pb-12 block w-full h-60 bg-gray-100 border-none rounded-lg text-md focus:border-none focus:ring-0 resize-none"
                            placeholder="Write a message..." required></textarea>
                    <!-- Toolbar -->
                    <div class="absolute bottom-0 inset-x-0 p-2 rounded-b-md bg-none">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <label for=""></label>
                                <button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-10 rounded-lg text-gray-500 hover:text-maroon">
                                    <label for="image">
                                        <svg class="flex-shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <input name="image" id="image" type="file" class="hidden" />
                                    </label>
                                </button>
                            </div>
                            <div class="flex items-center gap-x-1">
                                <button type="submit" class="inline-flex flex-shrink-0 justify-center items-center size-10 rounded-lg text-white bg-red-800 hover:bg-maroon focus:z-10 focus:outline-none focus:ring-2">
                                    <svg class="flex-shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
