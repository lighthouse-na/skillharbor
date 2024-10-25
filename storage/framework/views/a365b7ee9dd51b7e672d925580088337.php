<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="">
            <?php echo e(__('Reports')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="ml-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md rounded-3xl border">
            <div>
                <header class="">
                    <div class="font-medium py-6 bg-sky-950 text-3xl text-white leading-tight sm:px-6 lg:px-8">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                <li class="inline-flex items-center">
                                    <a href="#" class="inline-flex items-center text-sm font-medium text-white hover:text-sky-200 dark:text-gray-400 dark:hover:text-sky-600">
                                        <h1 class="mr-1"><?php echo e(svg('iconoir-reports')); ?></h1>
                                        Reports
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <a href="#" class="ms-1 text-sm font-medium text-white hover:text-sky-200 md:ms-2 dark:text-gray-400 dark:hover:text-sky-600">
                                            Skills Audit 2024
                                        </a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="ms-1 text-sm font-medium text-white md:ms-2 dark:text-gray-400">
                                            Organisational Report
                                        </span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </header>

                <div class="p-6 bg-gray-50 border-t text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 w-full">
                    <div class="mt-6 h-full">
                        <h3 class="text-lg font-base text-gray-900 dark:text-white mb-2">
                            Report for <?php echo e($assessment->assessment_title); ?>

                        </h3>
                        <div class="container p-4 overflow-auto"></div>
                    </div>
                    <div class="flex justify-between mb-1">
                        <span class="text-base font-medium text-sky-700 dark:text-white">
                            <?php echo e($assessmentProgress["completed"]); ?>/<?php echo e($assessmentProgress["total"]); ?>

                        </span>
                        <span class="text-sm font-medium text-sky-700 dark:text-white">
                            <?php echo e($assessmentProgress["percentage"]); ?>%
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-sky-600 h-2.5 rounded-full" style="width: <?php echo e($assessmentProgress["percentage"]); ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Export Buttons with Descriptions -->
    <div class="h-screen flex flex-col p-4">
        <!-- Export Employees Button -->
        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <div class="w-48">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('reports.loading-button-animation', [
                    'label' => 'Export Employees',
                    'route' => 'reports.employees.export'
                ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1651505125-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
            <div class="flex-1 text-slate-600">
                Export a detailed report of employee data, including names, roles, and other relevant information.
            </div>
        </div>

        <!-- Export Qualifications Button -->
        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <div class="w-48">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('reports.loading-button-animation', [
                    'label' => 'Export Qualifications',
                    'route' => 'reports.qualifications.export'
                ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1651505125-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
            <div class="flex-1 text-slate-600">
                Export a detailed report of employee qualification information.
            </div>
        </div>

        <!-- Export Skills Button -->
        <div class="flex items-center gap-4 p-2 border-b border-slate-200">
            <div class="w-48">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('reports.loading-button-animation', [
                    'label' => 'Export Skills',
                    'route' => 'reports.skills.export'
                ]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1651505125-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
            <div class="flex-1 text-slate-600">
                Export a comprehensive report of skills assessments, detailing individual performance and skill levels.
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<!-- JavaScript for Redirect Handling -->
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('redirect', function (url) {
            window.location.href = url;
        });
    });
</script>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/reports/show.blade.php ENDPATH**/ ?>