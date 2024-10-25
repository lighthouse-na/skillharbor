<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active', 'icon']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['active', 'icon']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $classes = $active ?? false ? ' bg-sky-800 text-white ' : 'hover:bg-sky-500/10 hover:text-sky-900 text-sky-900/75';
?>

<a
    <?php echo e($attributes->class(['flex items-center align-center px-2 py-2 m-1 text-sm text-gray-900 rounded-xl rounded-md transition duration-150 ease-in-out'])->merge(['class' => $classes])); ?>>

    <span class=""><?php echo e($slot); ?></span>
</a>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/components/side-nav-link.blade.php ENDPATH**/ ?>