
<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;


?>


<h1>Все статьи на сайте.</h1>
<a href="/admin/article/create" id="create-article"><div style="margin-bottom: 1em;" class="btn btn-success">Добавить статью</div></a>

<?php Pjax::begin(['id' => 'article', 'timeout' => 10000, 'enablePushState' => false]) ?>

<div style="text-align: center;">

    <?= \yii\widgets\LinkPager::widget
    (
            [
                'pagination' => $pages,
            ]
    ) ?>

</div>

<table class="table table-bordered">
    <thead class="thead-inverse" style="background: #373a3c; color: white">
    <tr>
        <th>Владелец</th>
        <th>Заголовок</th>
        <th>Короткое описание</th>
        <th>Полное описание</th>
        <th>Фотография</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($articles as $article): ?>
    <tr>
        <th scope="row"><?= Html::encode($article->user->login) ?></th>
        <td><?= Html::encode($article->header) ?></td>
        <td><?= Html::encode($article->small_text) ?></td>
        <td><?= Html::encode($article->full_text) ?></td>
        <td><div style="width: 100px;height: 100px;"><img style="-webkit-background-size: cover;background-size: cover; width: 100%;height: 100%;" src="<?= $article->photo_link ?>" alt="нету фото"></div></td>
        <td>
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Выбрать
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                    <li><a href="<?= Url::toRoute(['/admin/article/edit/'.$article->id]) ?>" class="btn-success" style="margin-bottom: 10px; margin-top: 10px; font-size: 1.2em;">Редактировать</a></li>

                    <li><?= Html::a("Удалить", '/admin/article/delete/'.$article->id, ['data-pjax' => false, 'class' => 'btn-danger', 'id' => 'delete-article', 'style' => '1.2em;']) ?></li>



                </ul>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php Pjax::end(); ?>

<?php

$this->registerJs('$("#delete-article").click(function() {

        $.pjax.reload({container: \'#article\', async: false});

    });', View::POS_LOAD)

?>



