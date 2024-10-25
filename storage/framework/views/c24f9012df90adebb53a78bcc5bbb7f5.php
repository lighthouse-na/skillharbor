<!-- User Profile Section -->
<div class="">
    <div class="rounded-3xl">
        <div class="container mx-auto p-4 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Section -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Address and Payment Method Section -->
                <div class="">
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6 mt-4">
                        <div class="flex flex-col w-full text-gray-900">
                            <!-- Profile Header Image -->
                            <div class="w-full text-gray-900">
                                <!-- Profile Header Image -->
                                <div class="h-32 overflow-hidden border rounded-t-3xl">
                                    <img class="object-cover w-full h-full" src="<?php echo e(asset('assets/images/bg.png')); ?>"
                                        alt="Mountain">
                                </div>
                                <!-- User Profile Card -->
                                <div class="bg-white rounded-b-3xl shadow-md border p-6 -mt-16">
                                    <!-- User Competency Rating -->
                                    <div class="flex justify-center mb-4">
                                        <div class="bg-sky-200 text-sky-700 rounded-full px-4 py-2 border-4 border-white">
                                            <h1 class="text-3xl font-bold"><?php echo e($user->competency_rating); ?></h1>
                                        </div>
                                    </div>
                                    <!-- User Information -->
                                    <div class="text-center bg-white">
                                        <h2 class="text-2xl "><?php echo e($user->first_name); ?>

                                            <?php echo e($user->last_name); ?></h2>
                                        <p class="text-gray-500"><?php echo e($user->email); ?></p>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="flex flex-col shadow-md border bg-white rounded-3xl dark:bg-gray-800">
                            <div class="flex flex-row  justify-between items-center px-6 py-6">
                                <h3 class="leading-none text-gray-900 dark:text-white">My Qualifications</h3>
                                <button wire:click="addQualification" wire:loading.attr="disabled"
                                    class="ml-auto hover:bg-sky-100  rounded-xl p-1 px-2 focus:outline-none focus:shadow-outline-sky">
                                    <div class="flex flex-row items-center justify-center ">
                                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconoir-plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-sky-500 rounded-3xl']); ?>
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
                                        <h1 class="text-sm text-sky-500">Add Qualification</h1>

                                    </div>
                                </button>
                            </div>
                            <ul class="divide-y divide-gray-200 overflow-auto">
                                <?php $__empty_1 = true; $__currentLoopData = $qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li class="p-3 sm:py-4 px-6 dark:hover:bg-gray-700">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm text-gray-900 dark:text-white truncate">
                                                <?php echo e($qualification->qualification_title); ?>

                                            </p>
                                            <button
                                                class="text-red-500 text-xs hover:text-red-700 focus:outline-none focus:shadow-outline-red"
                                                wire:click="deleteQualification(<?php echo e($qualification->id); ?>)">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconoir-xmark-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                                            </button>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="text-base items-center flex justify-center text-sky-900">
                                        <div class="self-center">
                                            <h1 class="">You have not added any qualifications
                                            </h1>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 border rounded-3xl shadow-md overflow-hidden">
                    <div class="flex flex-col h-full">
                        <div class="px-6 py-6 shadow-md-b shadow-md-gray-200 dark:shadow-md-gray-700">
                            <h3 class="text-gray-900 dark:text-white">My Skill Gap</h3>
                        </div>
                        <div class="flex-grow p-6">
                            <canvas id="myChart" class="w-full h-full"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Cart Section -->
                <div class="shadow-md bg-white border w-auto rounded-3xl dark:bg-gray-800 overflow-auto">
                    <div class="flex flex-row justify-between items-center px-6 py-6">
                        <div class="title">
                            <h3 class="leading-none text-gray-900 dark:text-white">Top Skills</h3>
                        </div>
                    </div>
                    <div class="flow-root">
                        <div class="overflow-y-auto sm:rounded-3xl">
                            <table class="w-full text-sm mt-3 text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-900/50 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            Skill Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">

                                            User Rating
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Supervisor Rating
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr
                                            class="shadow-md-b dark:bg-gray-800 dark:shadow-md-gray-700 ">
                                            <td scope="row"
                                                class="px-6 py-6 text-gray-900 whitespace-nowrap dark:text-white text-left">
                                                <?php echo e(Str::limit($skill->skill_title, 30)); ?>

                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div
                                                    class="text-xs text-center inline-block py-1 px-2 my-auto leading-none text-center whitespace-nowrap align-baseline font-bold bg-sky-300 text-sky-900 rounded-3xl">
                                                    <?php echo e($skill->pivot->user_rating); ?>.00
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div
                                                    class="text-xs inline-block py-1 px-2 my-auto leading-none text-center whitespace-nowrap align-baseline font-bold bg-sky-300 text-sky-900 rounded-3xl">
                                                    <?php echo e($skill->pivot->supervisor_rating); ?>.00
                                                </div>
                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="container flex-auto justify-center text-center">
                                            <p class="text-gray-400 text-base m-4">
                                                You have not completed any assessment.
                                            </p>
                                        </div>
                                    <?php endif; ?>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <!-- Add more items similarly as needed -->

            </div>

            <!-- Right Section -->
            <div>

            <div class="flex justify-center items-center">

    <div class=" bg-sky-400 bg-[radial-gradient(#7dd3fc_1px,transparent_1px)] [background-size:16px_16px] p-6 mt-4 rounded-3xl shadow-md space-y-6 w-full max-w-md border border-gray-200">

        <h2 class="text-2xl font-bold text-white text-center">Coming Soon</h2>
        <p class="text-gray-50 text-center">
            We're working on something amazing! Stay tuned for the <span class="font-semibold text-sky-800 shadow-md-sky-200">My Development Plans</span> feature.
        </p>

        <div  class="bg-white bg-opacity-60 backdrop-filter backdrop-blur-3xl p-6 mt-4 rounded-3xl  space-y-3 h-auto overflow-auto grow-0 ">
            <h2 class="leading-none text-gray-900">My Development Plans</h2>
            <div class="flex flex-col divide-y divide-gray-200 items-start mt-4">
                <?php $__currentLoopData = $developmentPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex flex-row items-center  justify-between w-full p-2 divide-y  rounded-l">
            <div>
                <h2 class="text-sm text-sky-950"><?php echo e($plan['name']); ?></h2>
            </div>
            <div>
                <a href="#" class="text-xs text-sky-950 rounded-full">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconoir-google-docs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-4 w-4']); ?>
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

                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>



                </div>


            </div>



        </div>


    </div>
    <div>
        <!-- Add Qualification Modal -->
        <?php if (isset($component)) { $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dialog-modal','data' => ['wire:model' => 'confirmingAddQualification']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dialog-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'confirmingAddQualification']); ?>
             <?php $__env->slot('title', null, []); ?> 
                <?php echo e(__('New Qualification')); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('content', null, []); ?> 
                <!-- Dropdown for Selecting Qualification -->
                <div class="mt-4">
                    <label for="qualification" class="block text-sm font-medium text-gray-700">Select
                        Qualification</label>
                    <select id="qualification" wire:model="qualification_id"
                        class="block w-full pl-3 pr-10 py-2 text-base shadow-md-gray-300 focus:outline-none focus:ring-indigo-500 focus:shadow-md-indigo-500 sm:text-sm rounded-md">
                        <option value="">-- Select Qualification --</option>
                        <?php $__currentLoopData = $dbQual; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($qual->id); ?>"><?php echo e($qual->qualification_title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    <?php $__errorArgs = ['qualification_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('footer', null, []); ?> 
                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['class' => 'm-2','wire:click' => '$set(\'confirmingAddQualification\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'm-2','wire:click' => '$set(\'confirmingAddQualification\', false)']); ?>
                    <?php echo e(__('Cancel')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'm-2','wire:click' => 'addQualificationToUser','wire:loading.attr' => 'disabled']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'm-2','wire:click' => 'addQualificationToUser','wire:loading.attr' => 'disabled']); ?>
                    <?php echo e(__('Add Qualification')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $attributes = $__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__attributesOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f)): ?>
<?php $component = $__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f; ?>
<?php unset($__componentOriginal49bd1c1dd878e22e0fb84faabf295a3f); ?>
<?php endif; ?>


    </div>


        <?php
        $__scriptKey = '781448859-0';
        ob_start();
    ?>
        <script>
            const ctx = document.getElementById('skillGapChart');

            const jcpRating = $wire.jcpRating;
            const myRating = $wire.myRating;
            const supervisorRating = $wire.supervisorRating;

            const labels = jcpRating.map(item => item.category);
            const values = jcpRating.map(item => item.value);
            const values2 = myRating.map(item => item.value);
            const values3 = supervisorRating.map(item => item.value);

            console.log(labels, values);
            // Radar Chart
new Chart(ctx, {
    type: 'radar',
    data: {
        labels: labels,
        datasets: [{
                label: 'JCP Requirement',
                data: values,
                borderWidth: 3,
                fill: true,
                backgroundColor: 'rgba(86, 203, 249, 0.2)',  // Dark blue with opacity
                borderColor: 'rgb(86, 203, 249)',  // Dark blue
                pointBackgroundColor: 'rgb(86, 203, 249)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(86, 203, 249)'
            },
            {
                label: 'My Skill Level',
                data: values2,
                fill: true,
                backgroundColor: 'rgba(139, 135, 244, 0.2)',  // Turquoise with opacity
                borderColor: 'rgb(139, 135, 244)',  // Turquoise
                pointBackgroundColor: 'rgb(139, 135, 244)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(139, 135, 244)'
            },
            {
                label: 'Supervisor Rating',
                data: values3,
                fill: true,
                backgroundColor: 'rgba(0, 102, 204, 0.2)',  // Darker blue with opacity
                borderColor: 'rgb(0, 102, 204)',  // Darker blue
                pointBackgroundColor: 'rgb(0, 102, 204)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(0, 102, 204)'
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
            r: {
                beginAtZero: true
            }
        }
    }
});

// Bar and Line Chart Combo
const cty = document.getElementById('myChart');
new Chart(cty, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            type: 'line',
            label: 'My Level',
            data: values2,
            backgroundColor: 'rgba(139, 135, 244, 0.2)',  // Turquoise with opacity
            borderColor: 'rgb(139, 135, 244)',  // Turquoise
            borderWidth: 1
        }, {
            type: 'line',
            label: 'Supervisor Rating',
            data: values3,
            backgroundColor: 'rgba(0, 102, 204, 0.2)',  // Darker blue with opacity
            borderColor: 'rgb(0, 102, 204)',  // Darker blue
            borderWidth: 1
        }, {
            type: 'bar',
            label: 'JCP Requirement',
            data: values,
            fill: false,
            backgroundColor: 'rgba(86, 203, 249,0.2)',  // Dark blue with opacity
            borderColor: 'rgb(86, 203, 249)',  // Dark blue
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

        </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

</div>
</div>
</div>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/livewire/dashboard/dash-info.blade.php ENDPATH**/ ?>