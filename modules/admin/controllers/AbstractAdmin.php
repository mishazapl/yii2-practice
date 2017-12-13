<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 08.12.17
 * Time: 23:31
 */

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class AbstractAdmin extends Controller
{

    public function init()
    {
        parent::init();
        if (Yii::$app->user->can('banned')) {
            throw new ForbiddenHttpException('Вы были заблокированы за нарушения правил сайта.', 403);
        } elseif (!Yii::$app->user->can('admin')) {
            throw new ForbiddenHttpException('Доступ к этой странице имеет только администратор проекта.', 403);
        }

    }

}