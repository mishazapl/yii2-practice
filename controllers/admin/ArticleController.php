<?php

namespace app\controllers\admin;

class ArticleController extends \yii\web\Controller
{

    public $layout = 'admin-panel';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
