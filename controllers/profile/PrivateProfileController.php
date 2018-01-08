<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 08.01.18
 * Time: 19:14
 */

namespace app\controllers\profile;

use app\controllers\SiteAbstract;
use app\models\profile\PrivateInfoUser;
use Yii;
use yii\web\ForbiddenHttpException;

class PrivateProfileController extends SiteAbstract
{

    public $layout = 'main';

    public function init()
    {
        parent::init();
        $this->viewPath = '@app/views/profile/private-profile';
        if (Yii::$app->user->isGuest) {
            new ForbiddenHttpException('Вы должны авторизоваться', 403);
        }
    }

    public function actionIndex(): string
    {
        $profile = PrivateInfoUser::findOne(['user_id' => Yii::$app->user->id]);

        $title = 'Профиль пользователя ' . Yii::$app->user->identity->login;

        return $this->render('index', compact('profile', 'title'));
    }

    public function actionEditPage(): string
    {
        $model = PrivateInfoUser::findOne(['user_id' => Yii::$app->user->id]);

        $title = 'Профиль пользователя ' . Yii::$app->user->identity->login;

        return $this->render('edit', compact('model', 'title'));
    }
}