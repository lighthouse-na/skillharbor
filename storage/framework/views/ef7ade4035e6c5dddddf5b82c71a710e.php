<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/logo/logo.png')); ?>">


    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</head>

<body class="font-rubik antialiased bg-white">
    <div class="relative min-h-screen md:flex " x-data="{ open: false }">
        <!--Sidebar -->
        <aside :class="{ '-translate-x-full': !open }" class="z-100 bg-gradient-to-br from-fuchsia-950 to-slate-800 lg:fixed sm:fixed text-gray-900 w-56 px-2 py-4  absolute inset-y-0 left-0 top-20 bottom-0 transform md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-lg">
            <!--logo-->
            <div class="flex items-center mx-auto justify-between px-2" >
                    <!-- Settings Dropdown -->
                    <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right','width' => '32']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '32']); ?>
                         <?php $__env->slot('trigger', null, []); ?> 

                            <div class="container mb-6 rounded-lg hover:bg-gray-900/50 ">
                                <div class="flex justify-between items-center px-3 py-2 cursor-pointer">
                                    <div class="icon">
                                        <img class="h-8 w-8 rounded-lg object-cover" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="<?php echo e(Auth::user()->first_name); ?>" />
                                    </div>

                                    <div class="overflow-hidden ">
                                        <h1 class="text-white pl-3 truncate ..."><?php echo e(Auth()->user()->first_name); ?> <?php echo e(Auth()->user()->last_name); ?></h1>
                                        <p class="text-white text-xs pl-3 truncate ..."><?php echo e(Auth()->user()->email); ?></p>
                                    </div>
                                </div>

                            </div>
                         <?php $__env->endSlot(); ?>
                         <?php $__env->slot('content', null, []); ?> 

                            <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => ''.e(route('profile.show')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('profile.show')).'']); ?>
                                <?php echo e(__('Profile')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>

                            <div class="border-t border-gray-200 dark:border-gray-800"></div>
                            <!-- Authentication -->
                            <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                                <?php echo csrf_field(); ?>
                                <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => ''.e(route('logout')).'','@click.prevent' => '$root.submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('logout')).'','@click.prevent' => '$root.submit();']); ?>
                                    <?php echo e(__('Log Out')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                            </form>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>

            </div>


            <!--Nav Links-->
            <nav>
                <div class="mb-6">
                    <?php if (isset($component)) { $__componentOriginal2e340925a8bf40d3894bf118093fdd54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e340925a8bf40d3894bf118093fdd54 = $attributes; } ?>
<?php $component = App\View\Components\SideNavLink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('side-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SideNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('dashboard')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard')),'icon' => 'iconoir-dashboard-dots']); ?>
                        Dashboard
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $attributes = $__attributesOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $component = $__componentOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__componentOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal2e340925a8bf40d3894bf118093fdd54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e340925a8bf40d3894bf118093fdd54 = $attributes; } ?>
<?php $component = App\View\Components\SideNavLink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('side-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SideNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('user-assessment',['user' => Crypt::encrypt(Auth::user()->id)])).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('user-assessment')),'icon' => 'iconoir-google-docs']); ?>
                        My Assessments
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $attributes = $__attributesOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $component = $__componentOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__componentOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
                </div>
                <div class="mb-3">
                    <?php if (isset($component)) { $__componentOriginal2e340925a8bf40d3894bf118093fdd54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e340925a8bf40d3894bf118093fdd54 = $attributes; } ?>
<?php $component = App\View\Components\SideNavLink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('side-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SideNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('supervise.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('supervise.index')),'icon' => 'iconoir-user-badge-check']); ?>
                        Supervise
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $attributes = $__attributesOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $component = $__componentOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__componentOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal2e340925a8bf40d3894bf118093fdd54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e340925a8bf40d3894bf118093fdd54 = $attributes; } ?>
<?php $component = App\View\Components\SideNavLink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('side-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SideNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('discover.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('discover.index')),'icon' => 'iconoir-planet-alt']); ?>
                        Discover
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $attributes = $__attributesOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $component = $__componentOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__componentOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal2e340925a8bf40d3894bf118093fdd54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e340925a8bf40d3894bf118093fdd54 = $attributes; } ?>
<?php $component = App\View\Components\SideNavLink::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('side-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SideNavLink::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('reports.index')).'','active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('reports.index')),'icon' => 'iconoir-reports']); ?>
                        Reports
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $attributes = $__attributesOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__attributesOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e340925a8bf40d3894bf118093fdd54)): ?>
<?php $component = $__componentOriginal2e340925a8bf40d3894bf118093fdd54; ?>
<?php unset($__componentOriginal2e340925a8bf40d3894bf118093fdd54); ?>
<?php endif; ?>

                </div>






            </nav>
        </aside>




        <!-- Page Content -->
        <main class="flex-1 bg-white min-h-screen">

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-menu');

$__html = app('livewire')->mount($__name, $__params, 'lw-2133831332-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <div class="px-0 sm:ml-52">
                 <!-- Page Heading -->
                <?php if(isset($header)): ?>
                    <header class="">
                        <div class="font-medium py-6 bg-gray-50 border text-3xl text-gray-800 leading-tight sm:px-6 lg:px-8">
                            <?php echo e($header); ?>

                        </div>
                    </header>
                <?php endif; ?>
                <div class="px-0">
                    <?php echo e($slot); ?>

                </div>
                
            </div>

        </main>
    </div>

</body>
<footer class=" py-4 text-center text-slate-800">
    <p class="text-sm">
        SkillHarbor developed by Lighthouse &copy; <?php echo e(date('Y')); ?>

    </p>
</footer>

</html>
<?php /**PATH /home/hubert/Desktop/lighthouse/projects/skillharbor-open/resources/views/layouts/app.blade.php ENDPATH**/ ?>