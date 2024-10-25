<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="!scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SkillHarbor')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/logo/mainlogo.png')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



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





        <!-- Page Content -->
        <main class="flex-1 bg-gray-50 min-h-screen">

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-menu');

$__html = app('livewire')->mount($__name, $__params, 'lw-2848042222-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <div class=" mx-32">
                 <!-- Page Heading -->
                <?php if(isset($header)): ?>
                    <header class="">
                        <div class="font-medium p-3 pt-6 bg-gray-50 text-xl text-slate-800 leading-tight sm:px-6 lg:px-8">
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
<footer class=" py-4 text-center text-slate-500 bg-gray-50">
    <p class="text-sm">
        SkillHarbor developed by Lighthouse &copy; <?php echo e(date('Y')); ?>

    </p>
</footer>

</html>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/layouts/app.blade.php ENDPATH**/ ?>