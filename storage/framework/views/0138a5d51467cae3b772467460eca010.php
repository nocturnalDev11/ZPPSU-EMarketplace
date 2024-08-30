<?php $__env->startSection('content'); ?>
<div class="flex h-screen bg-slate-100 dark:bg-slate-800">
    <div class="mx-auto w-1/2 flex items-center justify-center">
        <div class="w-full max-w-md sm:max-w-lg md:max-w-2xl lg:max-w-xl xl:max-w-md bg-white p-4 md:p-8 lg:p-10 rounded-lg shadow-md border dark:bg-slate-700 dark:border-slate-600">
            <div class="flex flex-col">
                <h1 class="text-3xl font-semibold text-slate-600 text-center">
                    <span class="text-red-700 dark:text-red-600">ZPPSU</span>
                    <span class="text-yellow-600 dark:text-yellow-500">E-Marketplace</span>
                </h1>
                <h1 class="text-3xl font-semibold mb-6 text-center dark:text-slate-200">
                    <?php echo e(__('Login')); ?>

                </h1>
            </div>
            <h1 class="text-sm font-semibold mb-6 text-slate-500 text-center dark:text-slate-300">Access your university community anytime, anywhere, for free.</h1>
            <form action="<?php echo e(route('login')); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>
                <!-- University ID -->
                <div class="mb-5">
                    <div class="relative">
                        <input type="university_id" id="university_id" name="university_id" aria-describedby="outlined_error_university_id" class="block px-2.5 pb-2.5 pt-4 w-full text-xl text-slate-900 bg-transparent rounded-lg border border-slate-300 appearance-none dark:text-white dark:border-slate-400 dark:focus:border-orange-400 focus:outline-none focus:ring-0 focus:border-orange-500 peer <?php $__errorArgs = ['university_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=" " value="<?php echo e(old('university_id')); ?>" required />
                        <label for="university_id" class="absolute text-2xl text-slate-500 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-slate-800 px-2 peer-focus:px-2 peer-focus:text-orange-400 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-6 start-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?php echo e(__('University ID')); ?>

                        </label>
                    </div>
                    <?php $__errorArgs = ['university_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p id="outlined_error_university_id" class="mt-2 text-xs text-red-700 dark:text-red-500">
                            <span class="font-medium">
                                <?php echo e($message); ?>

                            </span>
                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <div class="relative">
                        <input type="password" id="password" name="password" aria-describedby="outlined_error_password" class="block px-2.5 pb-2.5 pt-4 w-full text-xl text-slate-900 bg-transparent rounded-lg border-slate-300 appearance-none dark:text-white dark:border-slate-600 dark:focus:border-orange-400 focus:outline-none focus:ring-0 focus:border-orange-500 peer <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder=" " value="<?php echo e(old('password')); ?>" required/>
                        <label for="password" class="absolute text-2xl text-slate-500 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-slate-800 px-2 peer-focus:px-2 peer-focus:text-orange-400 peer-focus:dark:text-orange-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-6 start-3 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                            <?php echo e(__('Password')); ?>

                        </label>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p id="outlined_error_password" class="mt-2 text-xs text-red-700 dark:text-red-500">
                            <span class="font-medium">
                                <?php echo e($message); ?>

                            </span>
                        </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <!-- Login Button -->
                <div class="flex justify-center mb-4">
                    <button type="submit" class="w-full py-3 text-2xl bg-gradient-to-br from-red-500 to-orange-400 hover:bg-gradient-to-bl text-white font-semibold rounded-md transition-colors duration-300"><?php echo e(__('Login')); ?></button>
                </div>
                <div class="text-sm text-slate-600 text-center dark:text-slate-300">
                    <?php echo e(__('No account?')); ?> <a href="<?php echo e(route('register')); ?>" wire:navigate class="text-maroon hover:underline dark:text-yellow-500"><?php echo e(__('Sign Up')); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ZPPSU-E-Marketplace\resources\views/users/auth/login.blade.php ENDPATH**/ ?>