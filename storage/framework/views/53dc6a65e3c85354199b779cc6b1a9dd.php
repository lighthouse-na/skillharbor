<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="pt-4 bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <?php if (isset($component)) { $__componentOriginal1a590bee94ab2d9c08b342367154fca0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1a590bee94ab2d9c08b342367154fca0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.authentication-card-logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('authentication-card-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a590bee94ab2d9c08b342367154fca0)): ?>
<?php $attributes = $__attributesOriginal1a590bee94ab2d9c08b342367154fca0; ?>
<?php unset($__attributesOriginal1a590bee94ab2d9c08b342367154fca0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a590bee94ab2d9c08b342367154fca0)): ?>
<?php $component = $__componentOriginal1a590bee94ab2d9c08b342367154fca0; ?>
<?php unset($__componentOriginal1a590bee94ab2d9c08b342367154fca0); ?>
<?php endif; ?>
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                <?php echo $policy; ?>

            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/policy.blade.php ENDPATH**/ ?>