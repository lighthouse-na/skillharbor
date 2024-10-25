<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
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
    <body>

        <div class="font-rubik text-gray-900 dark:text-gray-100 antialiased">
            <?php echo e($slot); ?>

        </div>

    </body>
</html>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/layouts/guest.blade.php ENDPATH**/ ?>