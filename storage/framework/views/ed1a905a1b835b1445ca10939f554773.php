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
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">

            <div class="text-white px-6 py-3 rounded-3xl bg-sky-950 shadow-md">
                <div class="container w-full">
                    <div class="flex-inline">
                        <div class="overview pb-3 border-b">
                            <h3 class="flex justify-start text-grey-300 text-lg font-inter">Overview</h3>

                            <h3 class="flex justify-start text-sky-500 font-bold font-inter">
                                <?php echo e($assessment->assessment_title); ?></h3>
                        </div>
                    </div>


                </div>
                <div class="mt-3 mx-4 flex flex-wrap">


                    <?php if($jcp !== null): ?>

                    <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-grey-500 mb-6">
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
                </div>
            </div>


            </div>
            <div class="mx-auto  sm:px-6 lg:px-8">
                <div class="flex bg-white border py-6 px-6 rounded-3xl grid mt-6 sm:px-6 lg:px-8">
                    <div class="header flex items-center justify-between my-3 text-2xl text-sky-800 font-medium">
                        <h1><span><i class="fas fa-file-contract"></i></span> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                        </h1>

                    </div>
                    <form action="<?php echo e(route('user.assessment.storeEmployee', ['user' =>$user->id, 'assessment' => $assessment->id, 'jcp'=>$jcp->id])); ?>" method="POST">
                        <!-- Add the form element with action and method -->
                        <?php echo csrf_field(); ?>
                        <!-- Add the CSRF token for form submission -->

                        
                        



                        <div class=" justify-items-start mt-6 overflow-y-auto scrollbar-hide scrollable-container" >
                            <?php $__empty_1 = true; $__currentLoopData = $jcp->skills->groupBy('category.category_title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="p-3">
                                    <h2
                                        class="my-3 text-1xl bg-sky-500 rounded-2xl w-full p-3 text-center text-white font-medium">
                                        <?php echo e($category); ?></h2>
                                    <!-- Display the category name -->

                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!-- Rest of your code for displaying the skill -->
                                        <div
                                            class="focus:outline-none rounded-lg h-fit py-5 my-6 items-center grid grid-cols-1 lg:grid-cols-4
                                        <?php echo e($index % 2 === 0 ? 'bg-gray-100' : 'bg-white'); ?>">
                                            <div class="flex items-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                    <?php echo e($question->skill_title); ?>

                                                </p>
                                            </div>

                                            <div class="container mb-2 px-5">
                                                <label for="questions_<?php echo e($question->id); ?>"
                                                    class="block mt-5 lg:mt-0 mb-2 text-sm font-medium border-b pb-3 text-sky-500">Choose
                                                    a competency rating</label>
                                                <div class="flex items-center">
                                                    <?php for($rating = 1; $rating <= 5; $rating++): ?>
                                                        <input type="radio"
                                                            id="questions_<?php echo e($question->id); ?>_rating_<?php echo e($rating); ?>"
                                                            name="questions[<?php echo e($question->id); ?>]"
                                                            value="<?php echo e($rating); ?>"
                                                            class="mr-6 ml-12 focus:ring-sky-500 text-sky-500"
                                                            <?php echo e($rating === 1 ? 'checked' : ''); ?>>
                                                        <label
                                                            for="questions_<?php echo e($question->id); ?>_rating_<?php echo e($rating); ?>">
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
                                            class="inline-block px-6 py-2.5 bg-sky-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-sky-500 hover:shadow-lg focus:bg-sky-900  focus:outline-none focus:ring-0 active:bg-sky-900 transition duration-150 ease-in-out">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
                <?php else: ?>

                <div class="container flex-auto justify-center text-center">
                    <p class="text-gray-700 text-base mb-4">Your JCP Is not complete. Please Consult your Supevisor.</p>
                </div>

                <?php endif; ?>




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
<?php /**PATH /home/hubert/skillharbor-open/resources/views/assessments/show.blade.php ENDPATH**/ ?>