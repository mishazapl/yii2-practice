<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            throw new \yii\web\HttpException(401, '401 Unauthorized.');
        } else {
            if (Yii::$app->user->identity->role == 1) {
                return $this->render('index');
            } else {
                throw new \yii\web\HttpException(403, '403 Forbidden');
            }
        }
    }

}
