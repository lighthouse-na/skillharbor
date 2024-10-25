<script <?php echo $chart->displayScriptAttributes(); ?>>
    function <?php echo e($chart->id); ?>_create(data) {
        <?php echo e($chart->id); ?>_rendered = true;
        document.getElementById("<?php echo e($chart->id); ?>_loader").style.display = 'none';
        document.getElementById("<?php echo e($chart->id); ?>").style.display = 'block';
        window.<?php echo e($chart->id); ?> = c3.generate({
            bindto: '#<?php echo e($chart->id); ?>',
            data: data,
            <?php echo $chart->formatOptions(false, true); ?>

        });
    }
    <?php if($chart->api_url): ?>
    let <?php echo e($chart->id); ?>_refresh = function (url) {
        document.getElementById("<?php echo e($chart->id); ?>").style.display = 'none';
        document.getElementById("<?php echo e($chart->id); ?>_loader").style.display = 'flex';
        if (typeof url !== 'undefined') {
            <?php echo e($chart->id); ?>_api_url = url;
        }
        fetch(<?php echo e($chart->id); ?>_api_url)
            .then(data => data.json())
            .then(data => {
                <?php echo e($chart->id); ?>.load(data);
                document.getElementById("<?php echo e($chart->id); ?>_loader").style.display = 'none';
                document.getElementById("<?php echo e($chart->id); ?>").style.display = 'block';
            });
    };
    <?php endif; ?>
    <?php echo $__env->make('charts::init', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</script>
<?php /**PATH /home/hubert/skillharbor-open/vendor/consoletvs/charts/src/Views/c3/script.blade.php ENDPATH**/ ?>