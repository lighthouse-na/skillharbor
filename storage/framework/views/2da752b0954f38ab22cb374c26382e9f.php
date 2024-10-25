<script <?php echo $chart->displayScriptAttributes(); ?>>
    function <?php echo e($chart->id); ?>_getType(data) {
        var special_datasets = <?php echo json_encode($chart->special_datasets); ?>;
        for (var i = 0; i < special_datasets.length; i++) {
            for (var k = 0; k < data.length; k++) {
                if (special_datasets[i] == data[k].chartType) {
                    return special_datasets[i];
                }
            }
        }
        return 'axis-mixed';
    }
    function <?php echo e($chart->id); ?>_create(data) {
        <?php echo e($chart->id); ?>_rendered = true;
        document.getElementById("<?php echo e($chart->id); ?>_loader").style.display = 'none';
        window.<?php echo e($chart->id); ?> = new frappe.Chart("#<?php echo e($chart->id); ?>", {
            <?php echo $chart->formatContainerOptions('js'); ?>

            labels: <?php echo $chart->formatLabels(); ?>,
            type: <?php echo e($chart->id); ?>_getType(data),
            data: {
                labels: <?php echo $chart->formatLabels(); ?>,
                datasets: data
            },
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
                document.getElementById("<?php echo e($chart->id); ?>_loader").style.display = 'none';
                document.getElementById("<?php echo e($chart->id); ?>").style.display = 'block';
                <?php echo e($chart->id); ?>.update({labels: <?php echo $chart->formatLabels(); ?>, datasets: data});
            });
    };
    <?php endif; ?>
    <?php echo $__env->make('charts::init', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</script>
<?php /**PATH /home/hubert/skillharbor-open/vendor/consoletvs/charts/src/Views/frappe/script.blade.php ENDPATH**/ ?>