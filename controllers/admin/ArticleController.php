<?php

namespace app\controllers\admin;

use app\components\middleware\PullMiddleWare;
use app\models\Article;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\base\Module;
use yii\web\HttpException;
use yii\web\UploadedFile;

class ArticleController extends Controller
{

    public $layout = 'admin-panel';

    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        PullMiddleWare::getProduct('checkingAdmin')->check();
    }

    public function actionIndex()
    {
        $model = Article::find();

        $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 5, 'pageSizeParam' => false, 'forcePageParam' => false]);

        $pages->route = '/admin/articles';

        $article = $model->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', array('articles' => $article, 'pages' => $pages,));
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

                $this->redirect('/admin/article/edit/' . $article->id);

                return;
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
