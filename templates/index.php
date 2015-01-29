<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 18:49
 */
?>
<?php $title = 'Статистика звонков'; ?>
<?php ob_start(); ?>
    <script type="text/javascript">
    $(function () {
        var success = function (resp) {
            var columns = [];
            var xs = {};
            for (var data in resp.data) {
                if (resp.data[data]['dates'] == undefined)
                {
                    console.log(resp.data[data]);
                }
                console.log(resp.data[data]['dates']);
                xs[resp.data[data]['data'][0]] = resp.data[data]['dates'][0];
                columns.push(resp.data[data]['dates']);
                columns.push(resp.data[data]['data']);
            }
            var chart = c3.generate({
                data: {
                    xs: xs,
                    columns: columns
                },
                axis: {
                    x: {
                        type: 'timeseries',
                        tick: {
                            format: '%Y-%m-%d'
                        }
                    }
                }
            });
        };
        $.post('<?= $this->urlTo('index/ajax') ?>', {}, success, 'json');
    });
</script>
    <h1>Статистика звонков</h1>
    <div id="chart"></div>
<?php $content = ob_get_clean(); ?>