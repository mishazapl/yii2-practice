<?php

namespace app\components\middleware;

use Yii;
use yii\web\ForbiddenHttpException;

class CheckingBan extends Middleware
{

    function check()
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        if (Yii::$app->user->identity->banned == 1) {
           throw new ForbiddenHttpException('Вы были заблокированы за нарушения правил сайта.', 403);
        }
    }
}