<?php

namespace app\modules\admin\controllers;

use app\models\User;
use Yii;
use yii\data\Pagination;

class UserController extends AbstractAdmin
{

    public function actionIndex()
    {
        $model = User::find();

        $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 10, 'pageSizeParam' => false, 'forcePageParam' => false]);

        $pages->route = '/admin/users';

        $users = $model->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', array
            (

            'users' => $users,
            'pages' => $pages,

            )
        );
    }

    /**
     * @param $id
     *
     * Алгоритм работы.
     *
     * Принимает id юзера приводит к int.
     *
     * Далее ищет ключ banned у роли если есть, снимает все роли revokeAll($id);
     * и ставит заново $user;
     *
     * Иначе снимает роли revokeAll($id);
     * и ставит роль бан.
     */

    public function actionBan($id)
    {
        $id = (int) $id;

        if (array_key_exists('banned', Yii::$app->authManager->getRolesByUser($id))) {

            $user = Yii::$app->authManager->getRole('user');

            Yii::$app->authManager->revokeAll($id);

            Yii::$app->authManager->assign($user,$id);
        } else {

            $banned = Yii::$app->authManager->getRole('banned');

            Yii::$app->authManager->revokeAll($id);

            Yii::$app->authManager->assign($banned,$id);
        }

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
        Yii::$app->authManager->revokeAll($id);

        $this->actionIndex();
    }
}
