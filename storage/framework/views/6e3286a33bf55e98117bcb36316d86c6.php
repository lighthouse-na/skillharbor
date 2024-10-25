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
<div class="flex-1 justify-start pb-24 pt-6 mb-6 font-inter">
        <div class="container mx-auto p-6">
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
                                <a href="<?php echo e(route('supervise.show', ['id' => Crypt::encrypt($assessment->id), 'assessment_id' => Crypt::encrypt($assessment->enrolled[0]['assessment_id'])])); ?>"
                                    class="ml-1 text-sm font-medium text-white hover:text-sky-200 md:ml-2 ">Completed
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
                                    Employee Report
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

            <div class="flex bg-white border py-6 px-6 rounded-3xl grid mt-12">
                <div class="header flex items-center justify-between my-3 text-2xl text-slate-800 font-medium">
                    <h1><span><i class="fas fa-file-contract"></i></span> <?php echo e($user->first_name); ?>s' Assessment
                    </h1>

                </div>
                <form action="<?php echo e(route('supervise.store', ['user' =>$user->id, 'assessment' => $assessment->id, 'jcp'=>$jcp->id])); ?>" method="POST">
                    <!-- Add the form element with action and method -->
                    <?php echo csrf_field(); ?>
                    <!-- Add the CSRF token for form submission -->

                    
                    



                    <div class=" justify-items-start mt-6 overflow-y-auto scrollbar-hide scrollable-container">
                        <?php $__empty_1 = true; $__currentLoopData = $jcp->skills->groupBy('category.category_title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="p-3">
                                <h2
                                    class="my-3 text-1xl bg-sky-500 rounded-2xl w-full p-3 text-center text-white font-medium">
                                    <?php echo e($category); ?></h2>
                                <!-- Display the category name -->

                                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Rest of your code for displaying the skill -->
                                    <div
                                        class="focus:outline-none h-fit py-5 my-6 items-center grid grid-cols-1 lg:grid-cols-4
                                    <?php echo e($index % 2 === 0 ? 'bg-gray-100' : 'bg-white'); ?>">
                                        <div class="flex items-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                <?php echo e($question->skill_title); ?>

                                            </p>
                                        </div>

                                        <div class="container mb-2 px-5">
                                            <label for="supervisor_rating_<?php echo e($question->id); ?>"
                                                class="block mt-5 lg:mt-0 mb-2 text-sm font-medium border-b pb-3 text-sky-500">Choose
                                                a competency rating</label>
                                            <div class="flex items-center">
                                                <?php for($rating = 1; $rating <= 5; $rating++): ?>
                                                    <input type="radio"
                                                        id="supervisor_score_<?php echo e($question->id); ?>_rating_<?php echo e($rating); ?>"
                                                        name="supervisor_score[<?php echo e($question->id); ?>]"
                                                        value="<?php echo e($rating); ?>"
                                                        class="mr-6 ml-12 focus:ring-sky-500 text-sky-500"
                                                        <?php echo e($rating === $jcp->skills->find($question->id)->pivot->user_rating ? 'checked' : ''); ?>>
                                                    <label
                                                        for="supervisor_score_<?php echo e($question->id); ?>_rating_<?php echo e($rating); ?>">
                                                        <?php if($rating === 1): ?>
                                                            Not Competent
                                                        <?php elseif($rating === 2): ?>
                                                            Basic Skills
                                                        <?php elseif($rating === 3): ?>
                                                            Competent
                                                        <?php elseif($rating === 4): ?>
                                                            Developed Skills
                                                        <?php elseif($rating === 5): ?>
                                                            Expert
                                                        <?php endif; ?>
                                                    </label>
                                                <?php endfor; ?>
                                            </div>
                                        </div>


                                        <!-- Hidden input for qualification attainment -->
                                        
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="container flex-auto justify-center text-center">
                                <p class="text-gray-700 text-base mb-4">No questions were added to this assessment.</p>
                            </div>
                        <?php endif; ?>

                        <div class="mt-2">
                            <div class="control-group col-12 text-right">
                                <div class="flex space-x-2 justify-end px-2">
                                    <button type="submit"
                                        class="inline-block px-6 py-2.5 bg-sky-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-500 hover:shadow-lg focus:bg-sky-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-900 active:shadow-lg transition duration-150 ease-in-out">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>




            </div>
            </form>




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
<?php /**PATH /home/hubert/skillharbor-open/resources/views/supervise/submission.blade.php ENDPATH**/ ?>