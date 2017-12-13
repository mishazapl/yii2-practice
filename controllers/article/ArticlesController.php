<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 09.12.17
 * Time: 12:46
 */

namespace app\controllers\article;


use app\controllers\SiteAbstract;
use app\models\Article\Article;
use yii\base\Module;

class ArticlesController extends SiteAbstract
{
    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->viewPath = '@app/views/articles';

    }

    public function actionIndex($id)
    {
        $article =  Article::find()->where(['id' => $id])->one();
        return $this->render('index', compact('article'));
    }
}