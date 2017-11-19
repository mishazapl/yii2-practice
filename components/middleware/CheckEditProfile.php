<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 19.11.17
 * Time: 13:47
 */

namespace app\components\middleware;


use Yii;

class CheckEditProfile extends Middleware
{
    public function check()
    {
        if (Yii::$app->user->isGuest) {
            throw new \yii\web\HttpException(401, '401 Unauthorized.');
        } else {
            if (Yii::$app->user->identity->id == Yii::$app->request->get('id')) {
                return true;
            } else {
                throw new \yii\web\HttpException(403, '403 Forbidden');
            }
        }
    }
}