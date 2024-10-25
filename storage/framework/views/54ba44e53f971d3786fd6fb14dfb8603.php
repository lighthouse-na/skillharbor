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
            <?php echo e(__('Your Assessments')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-6 px-6">

        

        <div class="">


        <div class="grid grid-cols-3 gap-4 rounded-lg mb-4 p-4 sm:p-6 h-full dark:bg-gray-800">
            <?php $__empty_1 = true; $__currentLoopData = $assessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group block w-full mx-auto rounded-xl h-48 p-6 bg-white [background:radial-gradient(125%_125%_at_50%_10%,#fff_40%,#7dd3fc_100%)]">
                <div class="p-4 md:p-5">
                  <h3 class="text-sky-900 text-2xl">

                    <?php echo e($a->assessment_title); ?>

                  </h3>
                  <div class="bg-orange-400 w-12 h-1 rounded-xl mt-6 ">

                  </div>
                  <?php if($a->pivot->user_status === 0 && $a->pivot->supervisor_status === 0): ?>
                  <a class="mt-3 inline-flex items-center gap-x-1 text-sky-900 text-sm hover:bg-sky-200 rounded-xl p-2 hover:text-sky-800" href="<?php echo e(route('user.assessment.show', ['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])); ?>">
                    Get Started
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                  </a>
                    <?php elseif($a->pivot->user_status === 1 && $a->pivot->supervisor_status === 0): ?>
                    <a class="mt-3 inline-flex items-center gap-x-1 text-sky-900 text-sm hover:bg-sky-200 rounded-xl p-2 hover:text-sky-800" href="<?php echo e(route('user.assessment.submission',['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])); ?>">
                        View Submission
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                      </a>

                    <?php elseif($a->pivot->user_status === 1 && $a->pivot->supervisor_status === 1): ?>
                    <a class="mt-3 inline-flex items-center gap-x-1 text-sky-900 text-sm hover:bg-sky-200 rounded-xl p-2 hover:text-sky-800" href="<?php echo e(route('user.assessment.results',['user' => Crypt::Encrypt(Auth::user()->id), 'assessment' => Crypt::Encrypt($a->id)])); ?>">
                        View Supervisor Results
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </a>
                  <?php endif; ?>



                </div>
            </div>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="min-h-60 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                  <svg class="size-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" x2="2" y1="12" y2="12"/>
                    <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>
                    <line x1="6" x2="6.01" y1="16" y2="16"/>
                    <line x1="10" x2="10.01" y1="16" y2="16"/>
                  </svg>
                  <p class="mt-5 text-sm text-gray-800 dark:text-gray-300">
                    You are not currently enrolled to any assessments.
                  </p>
                </div>
            </div>

            <?php endif; ?>






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
<?php /**PATH /home/hubert/skillharbor-open/resources/views/assessments/index.blade.php ENDPATH**/ ?>