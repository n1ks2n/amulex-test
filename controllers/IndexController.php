<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 19:10
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionAjax()
    {
        $model = new Systemcall();
        echo $model->getStatData();
        exit;
    }
} 