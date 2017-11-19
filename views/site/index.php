<?php

/* @var $this yii\web\View */


$this->title = 'My Yii Application';

$articles = \app\models\Article::find()->all();

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach ($articles as $article): ?>
            <div class="col-lg-4">
                <h2><?php echo $article->head ?></h2>

                <p><?php echo $article->short_text ?></p>

                <p>Создатель: <?php echo $article->user->login ?></p>

                <p><a class="btn btn-default" href="<?php echo '/article/'.$article->id ?>">Просмотреть &raquo;</a></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
