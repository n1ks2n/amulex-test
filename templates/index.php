<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 18:49
 */ ?>
<?php $title = 'Статистика звонков';?>
<?php ob_start();?>
    <h1>Статистика звонков</h1>
<?php $content = ob_get_clean();?>
<?php include 'layout.php';?>