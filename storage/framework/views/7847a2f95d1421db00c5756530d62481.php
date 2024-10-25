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
    <div class="flex-1 justify-start pb-24 mb-6">
        <div class="container mx-auto p-12 ">
            <div class="bg-sky-950 p-6 rounded-3xl shadow-md">
                <nav class="flex border-b border-white " aria-label="Breadcrumb ">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3 mb-3">
                        <li class="inline-flex items-center">
                            <a href="/"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-sky-200 ">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="<?php echo e(route('user.assessment', ['user' => Crypt::encrypt($user->id)])); ?>"
                                    class="ml-1 text-sm font-medium text-white hover:text-sky-200 md:ml-2 ">My
                                    Assessments</a>
                            </div>
                        </li>

                    </ol>
                </nav>


                <div class="flex mx-auto ">


                    <div class="mt-3 mx-4 flex">

                        <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-white mb-10">
                            <div class="grow-1 shrink-0 basis-auto w-10/12 md:pl-6 mt-6">
                                <h4 class="text-2xl font-bold text-sky-500 mb-4">
                                    Job Competency Profile Details
                                </h4>

                                <div class="space-y-3">
                                    <p class="text-white text-lg">
                                        <strong class="text-sky-500">Employee Name:
                                        </strong><?php echo e($user->first_name . ' ' . $user->last_name); ?>

                                    </p>
                                    <p class="text-white text-lg">
                                        <strong class="text-sky-500">Job Title: </strong><?php echo e($jcp->position_title); ?>

                                    </p>
                                    <p class="text-white text-lg">
                                        <strong class="text-sky-500">Job Purpose: </strong><?php echo e($jcp->job_purpose); ?>

                                    </p>
                                    <p class="text-white text-lg">
                                        <strong class="text-sky-500">Job Grade: </strong><?php echo e($jcp->job_grade); ?>

                                    </p>
                                </div>


                            </div>
                        </div>

                        <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-white mb-10">
                            <div class="grow-1 shrink-0 basis-auto w-10/12 md:pl-6 mt-6">
                                <h4 class="text-dark mb-2 text-2xl font-bold text-sky-500">Required Qualifications
                                </h4>

                                <div class="flex">

                                    <div class="h-auto">



                                        <?php $__currentLoopData = $qualificationsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualificationData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="flex border-b my-3 mx-auto items-center p-2">
                                                <h3><?php echo e($qualificationData['name']); ?></h3>
                                                <?php if($qualificationData['attained']): ?>
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconoir-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-green-500 ml-3']); ?>
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
                                                    <!-- Green tick icon for attained -->
                                                <?php else: ?>
                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('iconoir-xmark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-500 ml-3']); ?>
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
                                                    <!-- Red X icon for not attained -->
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </div>



                                </div>
                            </div>

                        </div>
                        <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-white mb-10">
                            <div class="grow-0 shrink-0 basis-auto w-10/12 md:pl-6 mt-6">
                                <h4 class="text-2xl font-bold text-sky-500 mb-6">
                                    Downloads
                                </h4>
                                <a class="inline-flex items-center text-sm font-semibold rounded-xl p-3  text-sky-400 hover:bg-sky-800 hover:text-white disabled:opacity-50 disabled:pointer-events-none "
                                    href="<?php echo e(route('supervisor.result', ['user_id' => Crypt::Encrypt($user->id), 'assessment_id' => Crypt::Encrypt($assessment->id)])); ?>">
                                    Supervisor Report
                                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </a>
                            </div>

                        </div>

                    </div>




                </div>
            </div>
            

            <div class="flex bg-white border py-6 px-4 rounded-3xl grid mt-12">
                <div class="header flex items-center justify-between my-3 text-2xl text-slate-800 font-medium">
                    <h1><span><i class="fas fa-file-contract"></i></span> <?php echo e($user->first_name); ?>s' Assessment
                    </h1>

                </div>
                <div class="mt-6">
                    <!-- Header Section -->
                    <div
                        class="bg-sky-800 text-white font-semibold py-4 px-6 rounded-t-lg shadow-lg flex items-center justify-between">
                        <h2 class="text-xl flex-1 text-center">Skill Audit Overview</h2>
                        <h2 class="text-l flex-1 text-center">JCP Requirement</h2>
                        <h2 class="text-l flex-1 text-center">User Rating</h2>
                        <h2 class="text-l flex-1 text-center">Supervisor Rating</h2>
                    </div>

                    <!-- Skills List -->
                    <ul class="divide-y divide-gray-200 bg-white border rounded-b-lg">
                        <?php $__empty_1 = true; $__currentLoopData = $jcp->skills->groupBy('category.category_title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <!-- Category Header -->
                            <li class="bg-sky-500 text-white py-4 px-6">
                                <h3 class="text-lg font-semibold"><?php echo e($category); ?></h3>
                            </li>

                            <!-- Skills in the Category -->
                            <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li
                                    class="py-5 px-6 <?php echo e($index % 2 === 0 ? 'bg-gray-50' : 'bg-white'); ?> flex justify-between items-center border-b border-gray-200">
                                    <!-- Skill Title -->
                                    <div class="flex-1">
                                        <h4 class="text-lg font-semibold text-gray-800"><?php echo e($question->skill_title); ?>

                                        </h4>
                                    </div>

                                    <!-- Required Level -->
                                    <div class="flex-1 text-center">
                                        <span class="block text-sm font-medium text-gray-600">
                                            <?php if($jcp->skills->find($question->id)->pivot->required_level === 1): ?>
                                                <span
                                                    class="block text-sm font-medium bg-red-500 text-white p-2  border border-sky-900">
                                                    1
                                                </span>
                                            <?php elseif($jcp->skills->find($question->id)->pivot->required_level === 2): ?>
                                                <span
                                                    class="block text-sm font-medium bg-orange-400 text-white p-2  border border-sky-900">
                                                    2
                                                </span>
                                            <?php elseif($jcp->skills->find($question->id)->pivot->required_level === 3): ?>
                                                <span
                                                    class="block text-sm font-medium bg-yellow-300 text-black p-2  border border-sky-900">
                                                    3
                                                </span>
                                            <?php elseif($jcp->skills->find($question->id)->pivot->required_level === 4): ?>
                                                <span
                                                    class="block text-sm font-medium bg-green-300 text-black p-2  border border-sky-900">
                                                    4
                                                </span>
                                            <?php elseif($jcp->skills->find($question->id)->pivot->required_level === 5): ?>
                                                <span
                                                    class="block text-sm font-medium bg-green-500 text-white p-2  border border-sky-900">
                                                    5
                                                </span>
                                            <?php endif; ?>
                                        </span>
                                    </div>

                                    <!-- User Rating with Heatmap -->
                                    <div class="flex-1 text-center">
                                        <?php if($jcp->skills->find($question->id)->pivot->user_rating === 1): ?>
                                            <span
                                                class="block text-sm font-medium bg-red-500 text-white p-2  border border-sky-900">
                                                1
                                            </span>
                                        <?php elseif($jcp->skills->find($question->id)->pivot->user_rating === 2): ?>
                                            <span
                                                class="block text-sm font-medium bg-orange-400 text-white p-2  border border-sky-900">
                                                2
                                            </span>
                                        <?php elseif($jcp->skills->find($question->id)->pivot->user_rating === 3): ?>
                                            <span
                                                class="block text-sm font-medium bg-yellow-300 text-black p-2  border border-sky-900">
                                                3
                                            </span>
                                        <?php elseif($jcp->skills->find($question->id)->pivot->user_rating === 4): ?>
                                            <span
                                                class="block text-sm font-medium bg-green-300 text-black p-2  border border-sky-900">
                                                4
                                            </span>
                                        <?php elseif($jcp->skills->find($question->id)->pivot->user_rating === 5): ?>
                                            <span
                                                class="block text-sm font-medium bg-green-500 text-white p-2  border border-sky-900">
                                                5
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Supervisor Rating with Heatmap -->
                                    <div class="flex-1 text-center">
                                        <?php if($jcp->skills->find($question->id)->pivot->supervisor_rating === 1): ?>
                                            <span
                                                class="block text-sm font-medium bg-red-500 text-white p-2  border border-sky-900">
                                                1
                                            </span>
                                        <?php elseif($jcp->skills->find($question->id)->pivot->supervisor_rating === 2): ?>
                                            <span
                                                class="block text-sm font-medium bg-orange-400 text-white p-2  border border-sky-900">
                                                2
                                            </span>
                                        <?php elseif($jcp->skills->find($question->id)->pivot->supervisor_rating === 3): ?>
                                            <span
                                                class="block text-sm font-medium bg-yellow-300 text-black p-2  border border-sky-900">
                                                3
                                            </span>
                                        <?php elseif($jcp->skills->find($question->id)->pivot->supervisor_rating === 4): ?>
                                            <span
                                                class="block text-sm font-medium bg-green-300 text-black p-2  border border-sky-900">
                                                4
                                            </span>
                                        <?php elseif($jcp->skills->find($question->id)->pivot->supervisor_rating === 5): ?>
                                            <span
                                                class="block text-sm font-medium bg-green-500 text-white p-2  border border-sky-900">
                                                5
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <!-- No Skills in the Audit -->
                            <li class="py-5 px-6 text-center text-gray-500">
                                No skills were added to this assessment.
                            </li>
                        <?php endif; ?>
                    </ul>
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
<?php /**PATH /home/hubert/skillharbor-open/resources/views/assessments/results.blade.php ENDPATH**/ ?>