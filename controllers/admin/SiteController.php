<?php

namespace app\controllers\admin;

use app\components\middleware\PullMiddleWare;
use yii\base\Module;
use yii\web\Controller;

class SiteController extends Controller
{

    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        PullMiddleWare::getProduct('checkingAdmin')->check();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionEditProfile()
    {
        PullMiddleWare::getProduct('checkEditProfile')->check();
        return $this->render('edit-profile');
    }

}
