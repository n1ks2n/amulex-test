<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 18:51
 * @var string $title
 * @var string $content
 */
?>
<!-- templates/layout.php -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $title ?></title>
        <link rel="stylesheet" type="text/css" href="/css/styles.css"/>
        <script type="text/javascript" src="/js/jquery-1.11.1.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-1.10.4.min.js"></script>
        <script type="text/javascript" src="/js/jquery-ui-i18n.js"></script>
    </head>
    <body>
    <script type="text/javascript">
    /* Russian (UTF-8) initialisation for the jQuery UI date picker plugin. */
    jQuery(function($){
        $.datepicker.regional['ru'] = {
            closeText: 'Закрыть',
            prevText: '&#x3c;Пред',
            nextText: 'След&#x3e;',
            currentText: 'Сегодня',
            monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
            monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                'Июл','Авг','Сен','Окт','Ноя','Дек'],
            dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
            dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
            dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
            weekHeader: 'Не',
            dateFormat: 'dd.mm.yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['ru']);
    });
    </script>
        <?php echo $content ?>
    </body>
</html>