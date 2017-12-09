<?php

namespace app\controllers\admin;

use app\models\profile\UpdateProfileAdmin;
use app\models\User;
use Yii;
use yii\web\UploadedFile;

class ProfileController extends AbstractAdmin
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @return string
     *
     * Редактирование профиля.
     */

    public function actionEditProfile()
    {
        $this->rightProfile();

        $model = new UpdateProfileAdmin();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->updateProfile();
            $this->redirect('/admin');
        } else {
            return $this->render('edit-profile', compact('model'));
        }
    }

    public function actionDeleteProfile()
    {
        if (!is_null(Yii::$app->user->identity->photo_link)) {
            deleteFile(Yii::$app->user->identity->photo_link);
        }
        $model = User::find()->where(['login' => Yii::$app->user->identity->login])->one();
        $model->delete();
        $this->redirect('/');
    }

    public function actionUploadPhoto()
    {
        $model = new UpdateProfileAdmin();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();
            $this->redirect('/admin');
        } else {
            return $this->render('edit-photo', compact('model'));
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
