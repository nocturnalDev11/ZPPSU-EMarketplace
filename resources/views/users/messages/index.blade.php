@extends('users.layouts.nav')

@section('content')
    <div class="xl:ml-80 lg:ml-80 md:ml-0 ml-0 flex min-h-screen items-center justify-center bg-gray-200 to-gray-100 dark:bg-gray-700 text-gray-800">
        <div class="container flex h-[87vh] w-full flex-col overflow-hidden bg-gray-100 dark:bg-gray-900 sm:flex-row mt-20 rounded-lg">
            <!-- List of contacts -->

            @livewire('messages.search-contact')

            <!-- Chat Content -->
            <div class="content flex h-full w-full flex-col sm:w-3/5 lg:w-2/3">
                @if(isset($selectedUser))
                    <!-- Contact Profile -->
                    <div class="flex-col items-center justify-between bg-white dark:bg-gray-900 px-5 py-4">
                        <div class="flex mb-3">
                            @if($selectedUser->profile_picture)
                                <div class="relative inline-flex items-center justify-center object-cover ml-6 mr-2">
                                    <img src="{{ asset('storage/' . $selectedUser->profile_picture) }}" alt="profile_image" class="object-cover rounded-full shadow-soft-sm h-10 w-10" />
                                </div>
                            @else
                                <div class="h-10 w-10 relative inline-flex items-center justify-center object-cover ml-6 mr-2 rounded-full overflow-hidden bg-gray-200 dark:bg-gray-600">
                                    <span class="p-2 font-medium text-xl text-gray-600 dark:text-gray-300">
                                        {{ strtoupper(substr($selectedUser->first_name, 0, 1)) }}{{ strtoupper(substr($selectedUser->last_name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <a href="{{ route('profile.show', ['id' => $selectedUser]) }}" wire:navigate class="ml-4 dark:text-white hover:underline">{{ $selectedUser->first_name }} {{ $selectedUser->last_name }}</a>
                                @if (empty($selectedUser->department))
                                    <p class="ml-4 text-sm text-gray-600 dark:text-white">
                                        @if (!empty($selectedUser->role))
                                            {{ $selectedUser->role }}
                                        @endif
                                    </p>
                                @else
                                    <p class="ml-4 text-sm text-gray-600 dark:text-white">
                                        {{ $selectedUser->role }} • {{ $selectedUser->department }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="flex w-full gap-2">
                            <div class="w-full">
                                @include('users.messages.create-plan-modal')
                            </div>
                            <button type="button" class="w-full text-gray-600 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                More options
                            </button>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="messages scrollbar-thumb scrollbar-hide flex-1 overflow-y-scroll pt-3 px-5 bg-gray-50 dark:bg-gray-800">
                        @foreach($messages as $message)
                            @if($message->sender_id == Auth::id())
                                <!-- Sender section -->
                                <div class="flex justify-end mb-4">
                                    <div class="flex items-start gap-2.5">
                                        <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-200 rounded-bl-xl rounded-tl-xl rounded-br-xl dark:bg-gray-700">
                                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                <span class="text-sm font-semibold text-gray-900 dark:text-white">You</span>
                                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    {{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}
                                                </span>
                                            </div>
                                            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                                                {{ $message->content }}
                                            </p>
                                            @if($message->image)
                                                <div class="group relative my-2.5">
                                                    <div class="absolute w-full h-full bg-gray-900/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                                                        <button data-tooltip-target="download-image" class="inline-flex items-center justify-center rounded-full h-10 w-10 bg-white/30 hover:bg-white/50 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50">
                                                            <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                                                            </svg>
                                                        </button>
                                                        <div id="download-image" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800">
                                                            Download image
                                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                                        </div>
                                                    </div>
                                                    <img src="{{ asset('storage/'.$message->image) }}" class="rounded-lg object-cover w-full" alt="Message image" />
                                                </div>
                                            @elseif($message->content_link)
                                                <div class="flex items-start gap-2.5">
                                                    <div class="flex flex-col w-full max-w-[320px] leading-1.5">
                                                        <p class="text-sm font-normal pb-2.5 text-gray-900 dark:text-white">
                                                            <a href="{{ $message->content_link }}" class="text-blue-700 dark:text-blue-500 underline hover:no-underline font-medium break-all">
                                                                {{ $message->content_link }}
                                                            </a>
                                                        </p>
                                                        @if($message->content_link_image)
                                                            <a href="{{ $message->content_link }}" class="bg-gray-100 dark:bg-gray-800 rounded-xl p-4 mb-2 hover:bg-gray-300 dark:hover:bg-gray-500">
                                                                <img src="{{ asset('storage/'.$message->content_link_image) }}" alt="Content Image" class="rounded-lg mb-2" />
                                                                @if($message->content_link_description)
                                                                    <span class="text-sm font-medium text-gray-900 dark:text-white mb-2">
                                                                        {{ $message->content_link_description }}
                                                                    </span>
                                                                @endif
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            @elseif($message->plan_meetup)
                                                <div class="flex items-start gap-2.5">
                                                    <div class="flex flex-col w-full max-w-[320px] leading-1.5">
                                                        <div class="flex">
                                                            {{-- <p class="text-lg font-normal pb-2.5 text-gray-900 dark:text-white">
                                                                {{ $message->plan_meetup }}
                                                            </p> --}}
                                                            <p class="text-lg font-normal pb-2.5 text-gray-900 dark:text-white">
                                                                {{ $message->plan_meetup }}
                                                            </p>
                                                        </div>
                                                        @if($message->plan_notes)
                                                            <p class="text-lg font-normal pb-2.5 text-gray-900 dark:text-white">
                                                                {{ $message->plan_notes }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @else
                                <!-- Recipient section -->
                                <div class="flex justify-start mb-4">
                                    <div class="flex items-start gap-2.5">
                                        <!-- Recipient profile picture -->
                                        @if($selectedUser->profile_picture)
                                            <div class="relative inline-flex items-center justify-center overflow-hidden ml-6 mr-2 h-8 w-8 rounded-full">
                                                <img class="object-cover w-full h-full" src="{{ asset('storage/' . $selectedUser->profile_picture) }}" alt="{{ $selectedUser->first_name }} {{ $selectedUser->last_name }} image">
                                            </div>
                                        @else
                                            <div class="h-8 w-8 relative inline-flex items-center justify-center overflow-hidden ml-5 mr-2 rounded-full bg-gray-200 dark:bg-gray-600">
                                                <span class="p-2 font-medium text-sm text-gray-600 dark:text-gray-300">
                                                    {{ strtoupper(substr($selectedUser->first_name, 0, 1)) }}{{ strtoupper(substr($selectedUser->last_name, 0, 1)) }}
                                                </span>
                                            </div>
                                        @endif
                                        <div class="flex flex-col gap-1">
                                            <div class="flex flex-col w-full max-w-[326px] leading-1.5 p-4 border-gray-200 bg-gray-200 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                                <!-- Recipient username and message time -->
                                                <div class="flex items-center space-x-2 rtl:space-x-reverse mb-2">
                                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $selectedUser->first_name }} {{ $selectedUser->last_name }}</span>
                                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</span>
                                                </div>
                                                <!-- Message content -->
                                                <p class="text-sm font-normal text-gray-900 dark:text-white">
                                                    {{ $message->content }}
                                                </p>
                                                @if($message->image)
                                                    <div class="group relative my-2.5">
                                                        <div class="absolute w-full h-full bg-gray-900/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                                                            <button data-tooltip-target="download-image" class="inline-flex items-center justify-center rounded-full h-10 w-10 bg-white/30 hover:bg-white/50 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50">
                                                                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                                                                </svg>
                                                            </button>
                                                            <div id="download-image" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                Download image
                                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                                            </div>
                                                        </div>
                                                        <img src="{{ asset('storage/' . $message->image) }}" class="rounded-lg object-cover w-full" alt="Attached image">
                                                    </div>
                                                @elseif($message->content_link)
                                                    <div class="flex items-start gap-2.5">
                                                        <div class="flex flex-col w-full max-w-[320px] leading-1.5">
                                                            <p class="text-sm font-normal pb-2.5 text-gray-900 dark:text-white">
                                                                <a href="{{ $message->content_link }}" class="text-blue-700 dark:text-blue-500 underline hover:no-underline font-medium break-all">
                                                                    {{ $message->content_link }}
                                                                </a>
                                                            </p>
                                                            @if($message->content_link_image)
                                                                <a href="{{ $message->content_link }}" class="bg-gray-100 dark:bg-gray-800 rounded-xl p-4 mb-2 hover:bg-gray-300 dark:hover:bg-gray-500">
                                                                    <img src="{{ asset('storage/'.$message->content_link_image) }}" alt="Content Image" class="rounded-lg mb-2" />
                                                                    @if($message->content_link_description)
                                                                        <span class="text-sm font-medium text-gray-900 dark:text-white mb-2">
                                                                            {{ $message->content_link_description }}
                                                                        </span>
                                                                    @endif
                                                                </a>
                                                            @elseif($message->content_link_description)
                                                                <a href="{{ $message->content_link }}" class="bg-gray-100 dark:bg-gray-800 rounded-xl p-4 mb-2 hover:bg-gray-300 dark:hover:bg-gray-500">
                                                                    <span class="text-sm font-medium text-gray-900 dark:text-white mb-2">
                                                                        {{ $message->content_link_description }}
                                                                    </span>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @elseif($message->plan_meetup)
                                                    <p>{{ $message->plan_meetup }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Message Input -->
                    <div class="relative flex w-full bg-white p-4 dark:bg-gray-900">
                        <form action="{{ route('messages.reply', $selectedUser->id) }}" method="POST" enctype="multipart/form-data" class="w-full px-2">
                            @csrf
                            <label for="replyContent" class="sr-only">Your message</label>
                            <div class="relative">
                                <div id="preview" class="mb-4"></div>
                                <textarea name="replyContent" id="hs-textarea-ex-2" class="p-4 pb-12 block w-full bg-gray-100 dark:bg-gray-800 dark:text-gray-100 border-none rounded-lg text-md focus:border-none focus:ring-0 focus:outline-none resize-none overflow-hidden" placeholder="Write a message..." required oninput="autoResize(this)"></textarea>
                                <div class="absolute bottom-0 inset-x-0 p-2 rounded-b-md bg-none">
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                        <button type="button" class="inline-flex flex-shrink-0 justify-center items-center size-10 rounded-lg text-gray-500">
                                            <label for="fileInput" class="cursor-pointer">
                                            <svg class="flex-shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"></path>
                                            </svg>
                                            <input name="image" id="fileInput" type="file" class="hidden">
                                            </label>
                                        </button>
                                        </div>
                                        <div class="flex items-center gap-x-1">
                                        <button type="submit" class="inline-flex flex-shrink-0 justify-center items-center size-10 rounded-lg text-white bg-blue-400 hover:bg-blue-600 focus:z-10 focus:outline-none focus:ring-2">
                                            <svg class="flex-shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z"></path>
                                            </svg>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <p class="my-60 text-3xl font-semibold mb-6 text-black text-center">
                        Welcome to messages!
                    </p>
                @endif
            </div>
        </div>
    </div>
    <script>
            const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');

    if (fileInput) {
        fileInput.addEventListener('change', (event) => {
            const files = Array.from(event.target.files);
            preview.innerHTML = ''; // Clear the preview area

            files.forEach((file) => {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(file);

                fileReader.onload = (e) => {
                    const url = e.target.result;
                    const size = file.size > 1024 ? (file.size > 1048576 ? Math.round(file.size / 1048576) + 'mb' : Math.round(file.size / 1024) + 'kb') : file.size + 'b';
                    const previewType = ['jpg', 'jpeg', 'png', 'gif'].includes(file.name.split('.').pop().toLowerCase());

                    const div = document.createElement('div');
                    div.classList.add('relative', 'w-32', 'h-32', 'object-cover', 'rounded', 'mb-2');

                    if (previewType) {
                        div.innerHTML = `
                            <img src="${url}" class="w-32 h-32 object-cover rounded">
                            <button class="remove-btn w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:bg-red-500 rounded-full">
                                <span class="mx-auto my-auto">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                </span>
                            </button>
                            <div class="text-xs text-center pb-3">${size}</div>
                        `;
                    } else {
                        div.innerHTML = `
                            <svg class="fill-current w-32 h-32 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                            </svg>
                            <button class="remove-btn w-6 h-6 absolute text-center flex items-center top-0 right-0 m-2 text-white text-lg bg-red-500 hover:bg-red-500 rounded-full">
                                <span class="mx-auto my-auto">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                    </svg>
                                </span>
                            </button>
                            <div class="text-xs pb-3 text-center">${size}</div>
                        `;
                    }

                    preview.appendChild(div);

                    div.querySelector('.remove-btn').addEventListener('click', () => {
                        div.remove();
                    });
                };
            });
        });
    }
    </script>
@endsection
