<?php

namespace app\controllers\admin;

use app\components\middleware\PullMiddleWare;
use app\models\UpdateProfileAdmin;
use Yii;
use yii\base\Module;
use yii\web\Controller;
use yii\web\UploadedFile;

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
        $this->rightProfile();

        $model = new UpdateProfileAdmin();
        if(Yii::$app->request->isPost){
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();
        } else {
            return $this->render('edit-profile', compact('model'));
        }
    }

    /**
     * @return bool
     * @throws \yii\web\HttpException
     *
     * Проверка прав на профиль
     */


    private function rightProfile()
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
