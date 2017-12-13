<?php

namespace app\modules\admin\controllers;

use app\models\Article\Article;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\HttpException;
use yii\web\UploadedFile;

class ArticleController extends AbstractAdmin
{

    public function actionIndex()
    {
        $model = Article::find();

        $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 5, 'pageSizeParam' => false, 'forcePageParam' => false]);

        $pages->route = '/admin/articles';

        $articles = $model->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        $idUser = ArrayHelper::map($articles, 'user_id', 'user_id');
        $users  = ArrayHelper::map(User::find()->where(['in', 'id', $idUser])->select(['id', 'login'])->asArray()->all(), 'id', 'login');


        return $this->render('index', array
            (

            'articles' => $articles,
            'users' => $users,
            'pages' => $pages,

            )
        );
    }

    /**
     * @return string|void
     * @throws HttpException
     *
     * Редактирование статьи
     */

    public function actionEditArticle()
    {
        $model = new Article;
        $article = Article::find()->where(['id' => Yii::$app->request->get('id')])->one();

        if (is_null($article))
            throw new HttpException(404, 'Данная статья возможна была удалена');

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $model->image = UploadedFile::getInstance($model, 'image');

                $model->updateArticle();

                $article->load(Yii::$app->request->post());

                return $this->render('edit-article', [
                    'model' => $model,
                    'article' => $article,
                    'successCreate' => true,
                ]);
            }

        }

        return $this->render('edit-article', [
            'model' => $model,
            'article' => $article,
        ]);
    }

    /**
     * @throws HttpException
     *
     * Удаление статьи
     */

    public function actionDeleteArticle($id)
    {

        $article = Article::find()->where(['id' => $id])->one();

        if (is_null($article))
            throw new HttpException(404, 'Данная статья возможна была удалена');

        if (!is_null($article->photo_link)) {
            deleteFile($article->photo_link);
        }

        if (!file_exists('/uploads/article/'.$article->id)) {

            rmdir('uploads/article/' . $id);

        }

        $article->delete();

        $model = Article::find();

        $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 5, 'pageSizeParam' => false, 'forcePageParam' => false]);

        $pages->route = '/admin/articles';

        $article = $model->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', array('articles' => $article, 'pages' => $pages,));
    }

    /**
     * @return string
     *
     * Создать статью.
     */

    public function actionCreateArticle()
    {

        $model = new Article;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $model->image = UploadedFile::getInstance($model, 'image');

                $model->createArticle();

                return $this->render('create-article', [
                    'model' => $model,
                    'successCreate' => true,
                ]);

            }

        }

        return $this->render('create-article', [
            'model' => $model,
        ]);
    }

}
