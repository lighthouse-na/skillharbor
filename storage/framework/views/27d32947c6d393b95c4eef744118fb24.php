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
    <div class="mt-6 max-w-lg mx-auto">
        <form action="<?php echo e(route('jcp.update', Crypt::encrypt($jcp->id))); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">
                <label for="position_title" class="block text-sm font-medium text-gray-700">Position Title</label>
                <input type="text" name="position_title" id="position_title" value="<?php echo e($jcp->position_title); ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
            </div>
            

            <div class="mb-4">
                <label for="duty_station" class="block text-sm font-medium text-gray-700">Duty Station</label>
                <input type="text" name="duty_station" id="duty_station" value="<?php echo e($jcp->duty_station); ?>" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
            </div>
            

            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Employee</label>
            
                <select name="user_id" id="user_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    <option value="" disabled selected hidden>Choose an employee to assign the JCP to.</option>
                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $jcp->user_id ? 'selected' : ''); ?>><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>            

            <div class="col-span-6 sm:col-span-4">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'job_grade','value' => ''.e(__('Job Grade')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'job_grade','value' => ''.e(__('Job Grade')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <select id="job_grade" name="job_grade" wire:model="job_grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-fuchsia-500 focus:border-fuchsia-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-fuchsia-500 dark:focus:border-fuchsia-500" required>
                    <option value="" disabled selected hidden>Choose the job grade.</option>
                    <option value="A-1">A1</option>
                    <option value="A-2">A2</option>
                    <option value="A-3">A3</option>
                    <option value="A-4">A4</option>
                    <option value="B-1">B1</option>
                    <option value="B-2">B2</option>
                    <option value="B-3">B3</option>
                    <option value="B-4">B4</option>
                    <option value="B-U">BU</option>
                    <option value="C-1">C1</option>
                    <option value="C-2">C2</option>
                    <option value="C-3">C3</option>
                    <option value="C-4">C4</option>
                    <option value="C-U">CU</option>
                    <option value="D-1">D1</option>
                    <option value="D-2">D2</option>
                    <option value="D-3">D3</option>
                    <option value="D-4">D4</option>
                    <option value="D-U">DU</option>
                </select>
            </div>

                <div class="mb-4">
                    <label for="job_purpose" class="block text-sm font-medium text-gray-700">Job Purpose</label>
                    <textarea name="job_purpose" id="job_purpose" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md h-40" required><?php echo e($jcp->job_purpose); ?></textarea>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" id="is_active" class="sr-only peer" <?php echo e($jcp->is_active ? 'checked' : ''); ?>>
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-fuchsia-300 dark:peer-focus:ring-fuchsia-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-fuchsia-600"></div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">JCP Active</span>
                    </label>
                </div>

            <div class="mt-4 flex justify-center">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update JCP
                </button>
            </div>
        </form>
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
<?php /**PATH /home/hubert/skillharbor-open/resources/views/directories/jcp/edit.blade.php ENDPATH**/ ?>