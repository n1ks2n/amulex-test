<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 29.01.15
 * Time: 0:05
 * @var $message
 */ ?>
<?php $title = 'Ошибка!';?>
<?php ob_start();?>
    <p><?php echo $message?></p>
<?php $content = ob_get_clean();?>
<?php include 'layout.php';?>