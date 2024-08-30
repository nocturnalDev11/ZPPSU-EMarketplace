<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('users.layouts.side-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="container xl:ml-80 lg:ml-80 md:ml-0 ml-0 mx-auto h-auto mt-20">
        <!-- Breadcrumb -->
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="<?php echo e(route('users.home')); ?>" class="inline-flex items-center text-md font-medium text-gray-700 hover:text-maroon">
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
                        <span class="ms-1 text-md font-medium text-gray-500 md:ms-2">All services</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="relative px-6 py-3 flex flex-col min-w-0 mb-6 break-words bg-gradient-to-br from-red-50 via-purple-50 to-gray-100 border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-lg bg-clip-border">
            <div class="p-4 pb-0 mb-0 rounded-t-2xl">
                <h2 class="mb-1 text-xl dark:text-white">Services</h2>
            </div>
            <?php if($services->isEmpty()): ?>
                <div class="mx-auto max-w-screen-sm text-center">
                    <img src="<?php echo e(asset('storage/svg/services_section.svg')); ?>" alt="Illustration of empty services section" class="mx-auto block w-80 h-80 mb-4">
                    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl">Services section empty</p>
                    <p class="mb-4 text-lg font-light text-gray-500">There are no services available in this section. Add some services to continue.</p>
                </div>
            <?php else: ?>
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <!-- Product Item -->
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none dark:shadow-soft-dark-lg rounded-2xl bg-clip-border">
                                    <?php if($service->services_picture): ?>
                                        <div class="relative">
                                            <a class="block shadow-lg rounded-2xl">
                                                <img src="<?php echo e(asset('storage/' . $service->services_picture)); ?>" alt="<?php echo e($service->services_title); ?>" class="object-cover bg-center h-44 w-full shadow-soft-xl rounded-2xl" />
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="relative flex items-center justify-center overflow-hidden rounded-2xl bg-cover bg-center h-44 shadow-soft-xl">
                                            <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <defs>
                                                    <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                                        <stop offset="0%" style="stop-color:#EC4899;stop-opacity:1" />
                                                        <stop offset="100%" style="stop-color:#FB923C;stop-opacity:1" />
                                                    </linearGradient>
                                                </defs>
                                                <path fill="url(#grad2)" fill-rule="evenodd" d="M12 2a7 7 0 0 0-7 7 3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V9a5 5 0 1 1 10 0v7.083A2.919 2.919 0 0 1 14.083 19H14a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a2 2 0 0 0 1.732-1h.351a4.917 4.917 0 0 0 4.83-4H19a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3 7 7 0 0 0-7-7Zm1.45 3.275a4 4 0 0 0-4.352.976 1 1 0 0 0 1.452 1.376 2.001 2.001 0 0 1 2.836-.067 1 1 0 1 0 1.386-1.442 4 4 0 0 0-1.321-.843Z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="absolute inset-y-0 w-full h-full bg-gradient-to-tl from-sky-200/50 via-purple-200/50 to-pink-200/50 opacity-60"></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="flex-auto px-1 pt-6">
                                        <a href="<?php echo e(route('services.show', $service->id)); ?>" wire:navigate>
                                            <h5 class="dark:text-white"><?php echo e($service->services_title); ?></h5>
                                        </a>
                                        <p class="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-gray-800 text-sm bg-clip-text dark:text-white dark:opacity-80">
                                            ₱<?php echo e($service->services_fee); ?>

                                        </p>
                                        <p class="mb-6 leading-normal text-sm dark:text-white dark:opacity-60 text-truncate"><?php echo nl2br(e($service->services_description)); ?></p>
                                        <div class="flex items-center justify-between">
                                            <a href="<?php echo e(route('services.show', $service->id)); ?>" wire:navigate class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">
                                                View service
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ZPPSU-E-Marketplace\resources\views/users/lists/services/index.blade.php ENDPATH**/ ?>