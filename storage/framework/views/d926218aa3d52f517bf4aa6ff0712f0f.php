<div class="mx-6">
    

    <div>
        <div class="flex">

            <div class="flex-initial w-full">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search completed assessments..." class="mb-4 py-2 px-6 w-full border border-gray-300 rounded-3xl shadow-md">

            </div>


          </div>


<div class="rounded-3xl border bg-white shadow-md">
    <table class="table-auto min-w-full divide-y divide-gray-200 overflow-y-auto">
        <thead class="text-left text-xs text-sky-800">
            <tr>
                <th class="px-6 py-3  uppercase ">Salary Ref:</th>
                <th class="px-6 py-3 uppercase ">Name</th>
                <th class="px-6 py-3  uppercase ">Email</th>
                <th class="px-6 py-3 uppercase ">User Status</th>
                <th class="px-6 py-3 uppercase ">Supervisor Status</th>
                <th class="px-6 py-3 text-center uppercase ">Actions</th>




                <!-- Add more table headers as needed -->
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $completedAssessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assessment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="text-xs text-sky-950/50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?php echo e($assessment->salary_ref_number); ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?php echo e($assessment->first_name); ?> <?php echo e($assessment->last_name); ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900"><?php echo e($assessment->email); ?></div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        <?php if($assessment->enrolled[0]['user_status'] == 1): ?>
                            <h1 class="text-green-500">Assessment complete</h1>
                        <?php else: ?>
                            <h1 class="text-red-500">Incomplete</h1>
                        <?php endif; ?>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        <?php if($assessment->enrolled[0]['supervisor_status'] == 1): ?>
                        <h1 class="text-green-500">Assessment complete</h1>
                        <?php else: ?>
                        <h1 class="text-red-500">Incomplete</h1>
                        <?php endif; ?></div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">

                    <a href="<?php echo e(route('supervise.show', ['id' => Crypt::encrypt($assessment->id), 'assessment_id' => Crypt::encrypt($assessment->enrolled[0]['assessment_id'])])); ?>" class="text-indigo-800 hover:text-indigo-900">Assess</a>
                </td>
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr class="text-xs text-sky-950/50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">No completed assessments found</div>
                </td>
            </tr>

            <?php endif; ?>

        </tbody>
    </table>
    <div class="mt-4 m-3">
        <?php echo e($completedAssessments->links()); ?>

    </div>
</div>
</div>
</div>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/livewire/supervise/completed-assessments-table.blade.php ENDPATH**/ ?>