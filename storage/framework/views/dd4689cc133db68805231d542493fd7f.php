<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('users.layouts.side-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="xl:ml-80 lg:ml-80 md:ml-0 ml-0 flex min-h-screen items-center justify-center bg-gray-200 to-gray-100 dark:bg-gray-700 text-gray-800">
        <div class="container flex h-[87vh] w-full flex-col overflow-hidden bg-gray-100 sm:flex-row mt-20 rounded-lg">
            <!-- List of contacts -->

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('messages.search-contacts');

$__html = app('livewire')->mount($__name, $__params, 'lw-1351944153-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

            <!-- Chat Content -->
            <div class="content flex h-full w-full flex-col sm:w-3/5 lg:w-2/3">
                <?php if(isset($selectedUser)): ?>
                    <!-- Contact Profile -->
                    <div class="flex items-center bg-white dark:bg-gray-900 px-5 py-4">
                        <img src="<?php echo e($selectedUser->profile_picture ? asset('storage/' . $selectedUser->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg')); ?>" alt="Chat Profile" class="h-10 w-10 rounded-full object-cover" />
                        <div class="flex flex-col">
                            <p class="ml-4 dark:text-white"><?php echo e($selectedUser->first_name); ?> <?php echo e($selectedUser->last_name); ?></p>
                            <?php if(empty($selectedUser->department)): ?>
                                <p class="ml-4 text-sm text-gray-600 dark:text-white">
                                    <?php if(!empty($selectedUser->role)): ?>
                                        <?php echo e($selectedUser->role); ?>

                                    <?php endif; ?>
                                </p>
                            <?php else: ?>
                                <p class="ml-4 text-sm text-gray-600 dark:text-white">
                                    <?php echo e($selectedUser->role); ?> • <?php echo e($selectedUser->department); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Messages -->
                    <div class="messages scrollbar-thumb scrollbar-hide flex-1 overflow-y-scroll pt-3 px-5 bg-gray-50 dark:bg-gray-800">
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($message->sender_id == Auth::id()): ?>
                                <!-- Sender section -->
                                <div class="flex justify-end mb-4">
                                    <div class="flex items-start gap-2.5">
                                        <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-200 rounded-bl-xl rounded-tl-xl rounded-br-xl dark:bg-gray-700">
                                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                <span class="text-sm font-semibold text-gray-900 dark:text-white">You</span>
                                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    <?php echo e(\Carbon\Carbon::parse($message->created_at)->diffForHumans()); ?>

                                                </span>
                                            </div>
                                            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">
                                                <?php echo e($message->content); ?>

                                            </p>
                                            <?php if($message->image): ?>
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
                                                    <img src="<?php echo e(asset('storage/'.$message->image)); ?>" class="rounded-lg object-cover w-full" alt="Message image" />
                                                </div>
                                            <?php elseif($message->content_link): ?>
                                                <div class="flex items-start gap-2.5">
                                                    <div class="flex flex-col w-full max-w-[320px] leading-1.5">
                                                        <p class="text-sm font-normal pb-2.5 text-gray-900 dark:text-white">
                                                            <a href="<?php echo e($message->content_link); ?>" class="text-blue-700 dark:text-blue-500 underline hover:no-underline font-medium break-all">
                                                                <?php echo e($message->content_link); ?>

                                                            </a>
                                                        </p>
                                                        <?php if($message->content_link_image): ?>
                                                            <a href="<?php echo e($message->content_link); ?>" class="bg-gray-100 dark:bg-gray-800 rounded-xl p-4 mb-2 hover:bg-gray-300 dark:hover:bg-gray-500">
                                                                <img src="<?php echo e(asset('storage/'.$message->content_link_image)); ?>" alt="Content Image" class="rounded-lg mb-2" />
                                                                <?php if($message->content_link_description): ?>
                                                                    <span class="text-sm font-medium text-gray-900 dark:text-white mb-2">
                                                                        <?php echo e($message->content_link_description); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <!-- Sender profile picture -->
                                        <img class="w-8 h-8 rounded-full" src="<?php echo e($message->sender->profile_picture ? asset('storage/' . $message->sender->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg')); ?>" alt="<?php echo e($message->sender->first_name); ?>'s image">
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- Recipient section -->
                                <div class="flex justify-start mb-4">
                                    <div class="flex items-start gap-2.5">
                                        <!-- Recipient profile picture -->
                                        <img class="w-8 h-8 rounded-full" src="<?php echo e($selectedUser->profile_picture ? asset('storage/' . $selectedUser->profile_picture) : asset('storage/profile_pictures/profile-placeholder.jpg')); ?>" alt="<?php echo e($selectedUser->first_name); ?> <?php echo e($selectedUser->last_name); ?> image">
                                        <div class="flex flex-col gap-1">
                                            <div class="flex flex-col w-full max-w-[326px] leading-1.5 p-4 border-gray-200 bg-gray-200 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                                                <!-- Recipient username and message time -->
                                                <div class="flex items-center space-x-2 rtl:space-x-reverse mb-2">
                                                    <span class="text-sm font-semibold text-gray-900 dark:text-white"><?php echo e($selectedUser->first_name); ?> <?php echo e($selectedUser->last_name); ?></span>
                                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"><?php echo e(\Carbon\Carbon::parse($message->created_at)->diffForHumans()); ?></span>
                                                </div>
                                                <!-- Message content -->
                                                <p class="text-sm font-normal text-gray-900 dark:text-white">
                                                    <?php echo e($message->content); ?>

                                                </p>
                                                <?php if($message->image): ?>
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
                                                        <img src="<?php echo e(asset('storage/' . $message->image)); ?>" class="rounded-lg object-cover w-full" alt="Attached image">
                                                    </div>
                                                <?php elseif($message->content_link): ?>
                                                    <div class="flex items-start gap-2.5">
                                                        <div class="flex flex-col w-full max-w-[320px] leading-1.5">
                                                            <p class="text-sm font-normal pb-2.5 text-gray-900 dark:text-white">
                                                                <a href="<?php echo e($message->content_link); ?>" class="text-blue-700 dark:text-blue-500 underline hover:no-underline font-medium break-all">
                                                                    <?php echo e($message->content_link); ?>

                                                                </a>
                                                            </p>
                                                            <?php if($message->content_link_image): ?>
                                                                <a href="<?php echo e($message->content_link); ?>" class="bg-gray-100 dark:bg-gray-800 rounded-xl p-4 mb-2 hover:bg-gray-300 dark:hover:bg-gray-500">
                                                                    <img src="<?php echo e(asset('storage/'.$message->content_link_image)); ?>" alt="Content Image" class="rounded-lg mb-2" />
                                                                    <?php if($message->content_link_description): ?>
                                                                        <span class="text-sm font-medium text-gray-900 dark:text-white mb-2">
                                                                            <?php echo e($message->content_link_description); ?>

                                                                        </span>
                                                                    <?php endif; ?>
                                                                </a>
                                                            <?php elseif($message->content_link_description): ?>
                                                                <a href="<?php echo e($message->content_link); ?>" class="bg-gray-100 dark:bg-gray-800 rounded-xl p-4 mb-2 hover:bg-gray-300 dark:hover:bg-gray-500">
                                                                    <span class="text-sm font-medium text-gray-900 dark:text-white mb-2">
                                                                        <?php echo e($message->content_link_description); ?>

                                                                    </span>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Message Input -->
                    <div class="relative flex w-full bg-white p-4 dark:bg-gray-900">
                        <form action="<?php echo e(route('messages.reply', $selectedUser->id)); ?>" method="POST" enctype="multipart/form-data" class="w-full px-2">
                            <?php echo csrf_field(); ?>
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
                <?php else: ?>
                    <p class="my-60 text-3xl font-semibold mb-6 text-black text-center">
                        Welcome to messages!
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ZPPSU-E-Marketplace\resources\views/users/messages/index.blade.php ENDPATH**/ ?>