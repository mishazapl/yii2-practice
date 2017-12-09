<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 08.12.17
 * Time: 23:31
 */

namespace app\controllers\admin;

use app\components\middleware\PullMiddleWare;
use yii\web\Controller;

class AbstractAdmin extends Controller
{
    public $layout = 'admin-panel';

    public function beforeAction($action)
    {
        if (!$action instanceof \yii\web\ErrorAction) {
            PullMiddleWare::getProduct('checkingBan')->check();
            PullMiddleWare::getProduct('checkingAdmin')->check();
        }
        return parent::beforeAction($action);
    }
}