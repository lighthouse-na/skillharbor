<script <?php echo $chart->displayScriptAttributes(); ?>>
    function <?php echo e($chart->id); ?>_create(data) {
        <?php echo e($chart->id); ?>_rendered = true;
        document.getElementById("<?php echo e($chart->id); ?>_loader").style.display = 'none';
        <?php if($chart->type): ?>
            let <?php echo e($chart->id); ?>_type = <?php echo e($chart->type); ?>

        <?php else: ?>
            let <?php echo e($chart->id); ?>_type = data[0].renderAs;
        <?php endif; ?>
        if (!<?php echo json_encode($chart->keepType); ?>.includes(<?php echo e($chart->id); ?>_type)) {
            <?php echo e($chart->id); ?>_type = "<?php echo e($chart->comboType); ?>"
        }
        FusionCharts.ready(function () {
            window.<?php echo e($chart->id); ?> = new FusionCharts({
                type: <?php echo e($chart->id); ?>_type,
                renderAt: "<?php echo e($chart->id); ?>",
                dataFormat: 'json',
                <?php echo $chart->formatContainerOptions('js', true); ?>

                dataSource: {
                    categories: [{
                        category: <?php echo $chart->formatLabels(); ?>

                    }],
                    dataset: data,
                    chart: <?php echo $chart->formatOptions(true); ?>

                }
            }).render();
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
                let chartData = <?php echo e($chart->id); ?>.getChartData("json");
                chartData.dataset = data;
                <?php echo e($chart->id); ?>.setChartData(chartData, "json");
        });
    };
    <?php endif; ?>
    <?php echo $__env->make('charts::init', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</script>
<?php /**PATH /home/hubert/skillharbor-open/resources/views/vendor/charts/fusioncharts/script.blade.php ENDPATH**/ ?>