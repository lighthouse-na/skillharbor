<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['active', 'icon']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['active', 'icon']); ?>
<?php foreach (array_filter((['active', 'icon']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $classes = $active ?? false ? ' bg-fuchsia-500/20 text-white ' : 'hover:bg-fuchsia-500/10 hover:text-white text-violet-200/75';
?>

<a
    <?php echo e($attributes->class(['flex items-center align-center px-2 py-1 m-1 text-sm text-gray-900 rounded-lg rounded-md transition duration-150 ease-in-out'])->merge(['class' => $classes])); ?>>
    <?php if($icon): ?>
    <?php echo e(svg($icon)); ?>

    <?php endif; ?>
    <span class="ml-4"><?php echo e($slot); ?></span>
</a>
<?php /**PATH /home/hubert/Desktop/lighthouse/projects/skillharbor-open/resources/views/components/side-nav-link.blade.php ENDPATH**/ ?>