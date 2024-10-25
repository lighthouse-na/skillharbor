<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="absolute top-0 -z-10 h-full w-full bg-white"><div class="absolute bottom-auto left-auto right-0 top-0 h-[500px] w-[500px] -translate-x-[30%] translate-y-[20%] rounded-full bg-[rgba(14,165,233,0.6)] opacity-50 blur-[80px]"></div>
        <header class="sticky top-0 z-10 bg-white">
            <nav class="container mx-auto p-6 flex justify-between items-center py-3">
                <div class="text-2xl font-medium bg-gradient-to-br from-slate-900 to-sky-600 bg-clip-text text-transparent">Skillharbor.</div>
                <ul class="flex space-x-6">

                    <?php if(Route::has('login')): ?>
                    <nav class="-mx-3 flex flex-1 justify-end">
                        <?php if(auth()->guard()->check()): ?>
                            <a
                                href="<?php echo e(url('/dashboard')); ?>"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-sky-700/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Dashboard
                            </a>
                        <?php else: ?>
                            <a
                                href="<?php echo e(route('login')); ?>"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-sky-700/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Log in
                            </a>

                            <?php if(Route::has('register')): ?>
                                <a
                                    href="<?php echo e(route('register')); ?>"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-sky-700/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Register
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </nav>
                <?php endif; ?>
                </ul>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="p-16">

            <div class="container mx-auto text-center p-24">
                <h1 class="text-7xl font-light text-gray-800">Empower Your Workforce</h1>
                <h1 class="text-7xl font-light pb-3 bg-gradient-to-r from-slate-900 to-sky-900 bg-clip-text text-transparent">with Tailored Training Plans</h1>
                <p class="mt-6 text-gray-600">Skillharbor analyzes job descriptions and qualifications to create personalized training plans for every employee.</p>

            </div>
        </section>

        <!-- Key Features Section -->
        <section class="p-12 px-64">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-light bg-gradient-to-r from-slate-900 to-sky-600 bg-clip-text text-transparent">Why Choose Skillharbor?</h2>
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="border p-8 rounded-3xl shadow-xl bg-white">
                        <div class="flex justify-center align-center">
                            <div class="flex text-sky-800 rounded-full bg-sky-200 h-12 w-12 justify-items-center items-center">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconoir-running'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-auto ']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>


                            </div>
                        </div>

                        <h3 class="mt-6 text-xl font-light">Personalized Training Plans</h3>
                        <p class="mt-4 text-gray-600">Tailor each employee's learning experience based on their job role.</p>
                    </div>

                    <div class="bg-white p-8 rounded-3xl border shadow-xl bg-white">
                        <div class="flex justify-center align-center">
                            <div class="flex text-sky-800 rounded-full bg-sky-200 h-12 w-12 justify-items-center items-center">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconoir-flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-auto']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        </div>
                        </div>

                        <h3 class="mt-6 text-xl font-light">Progress Tracking</h3>
                        <p class="mt-4 text-gray-600">Gain insights into skill development with real-time data analytics.</p>
                    </div>

                    <div class="bg-white p-8 rounded-3xl  border shadow-xl bg-white">
                        <div class="flex justify-center align-center">
                            <div class="flex text-sky-800 rounded-full bg-sky-200 h-12 w-12 justify-items-center items-center">
                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconoir-bright-star'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-auto']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        </div>
                        </div>
                        <h3 class="mt-6 text-xl font-light">Adaptive Learning Paths</h3>
                        <p class="mt-4 text-gray-600">Empower employees with personalized learning paths that adjust dynamically based on their performance and progress.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer Section -->
        <footer class="text-slate-800 bg-gray-50/50 py-8">
            <div class="container mx-auto text-center">
                <p>&copy; 2024 Skillharbor. All Rights Reserved.</p>
                <div class="mt-4">
                    <a href="#" class="text-gray-400 hover:text-gray-200 mx-2">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-gray-200 mx-2">Terms of Service</a>
                </div>
            </div>
        </footer>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/welcome.blade.php ENDPATH**/ ?>