<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 08.12.17
 * Time: 23:06
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteAbstract extends Controller
{
    public function init()
    {
        parent::init();
//        var_dump(Yii::$app->user->can('banned'));
        if (Yii::$app->user->can('banned')) {
            $name = 'Доступ запрещен';
            $message = 'Вы были заблокированы за нарушения правил сайта.';
            die($this->render('error', compact('name', 'message')));
        }

    }
}