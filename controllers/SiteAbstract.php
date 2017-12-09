<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 08.12.17
 * Time: 23:06
 */

namespace app\controllers;

use app\components\middleware\PullMiddleWare;
use yii\web\Controller;

class SiteAbstract extends Controller
{
    public function beforeAction($action)
    {
        if (!$action instanceof \yii\web\ErrorAction) {
            PullMiddleWare::getProduct('checkingBan')->check();
        }
        return parent::beforeAction($action);
    }
}