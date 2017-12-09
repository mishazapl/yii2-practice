<?php

namespace app\controllers\admin;

use app\models\User;
use yii\data\Pagination;

class UserController extends AbstractAdmin
{

    public function actionIndex()
    {
        $model = User::find();

        $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 10, 'pageSizeParam' => false, 'forcePageParam' => false]);

        $pages->route = '/admin/users';

        $users = $model->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('users', 'pages'));
    }

    /**
     * @param $id
     *
     * Бан пользователя.
     */

    public function actionBan($id)
    {
        $id = (int) $id;

        $banUser = User::find()->where(['id' => $id])->one();

        if ($banUser->banned == 1) {

            $banUser->banned = 0;

        } else {

            $banUser->banned = 1;

        }

        $banUser->update();


        $this->actionIndex();

    }

    public function actionDelete($id)
    {
        $id = (int) $id;

        $deleteUser = User::find()->where(['id' => $id])->one();

        if (!is_null($deleteUser->photo_link)) {
            deleteFile($deleteUser->photo_link);
        }

        $deleteUser->delete();

        $this->actionIndex();
    }
}
