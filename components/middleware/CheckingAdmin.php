<?php

namespace app\components\middleware;

use Yii;

class CheckingAdmin extends Middleware
{
    public function check()
    {
        if (Yii::$app->user->isGuest) {
            throw new \yii\web\HttpException(401, '401 Unauthorized.');
        } else {
            if (Yii::$app->user->identity->role == 1) {
                return true;
            } else {
                throw new \yii\web\HttpException(403, '403 Forbidden');
            }
        }
    }
}
