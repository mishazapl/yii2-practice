<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

?>
<style>
    ul {
        list-style-type: none;
    }
    .image-300-200 {
        width: 300px;
        height: 300px;
    }
</style>

<h1>admin/site/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<div class="col-md-4">
<ul class="thumbnails">
    <li class="span4">
        <div class="thumbnail">

            <?php if (Yii::$app->user->identity->photo_link == null): ?>

            <img src="http://placehold.it/100x100" alt="300x200" data-src="holder.js/300x200" style="width: auto; height: auto;">

            <?php else: ?>

            <div class="image-300-200"><img src="<?php echo Yii::$app->user->identity->photo_link ?>" alt="300x200" data-src="holder.js/300x200" style="width: 100%; height: 100%;"></div><?php endif; ?>
            <div class="caption">
                <h3>Login: <?= Yii::$app->user->identity->login ?></h3>
                <h3>Email: <?= Yii::$app->user->identity->email ?></h3>
                <h3>Role: Admin</h3>

                <p><a href="<?= Url::toRoute(['admin/edit/profile/'.Yii::$app->user->identity->id]) ?>" class="btn btn-primary">Редактировать профиль</a>

                <br>
                <br>

                <a href="#" class="btn btn-warning">Удалить аккаунт</a></p>
            </div>
        </div>
    </li>
</ul>
</div>