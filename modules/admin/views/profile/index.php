<?php
/* @var $this yii\web\View */


?>
<style>
    ul {
        list-style-type: none;
    }
    .image-300-200 {
        max-width: 300px;
        height: 300px;
    }

</style>

<div class="col-md-4 text-center">
<ul class="thumbnails">
    <li class="span4">
        <div class="thumbnail" style="max-width: 300px;">

            <?php if (Yii::$app->user->identity->photo_link == null): ?>

            <img src="http://placehold.it/100x100" alt="300x200" data-src="holder.js/300x200" style="width: auto; height: auto;">

            <?php else: ?>

            <div class="image-300-200"><img src="<?php echo Yii::$app->user->identity->photo_link ?>" alt="300x200" data-src="holder.js/300x200" style="width: 100%; height: 100%;"></div><?php endif; ?>
            <div class="caption">
                <h3>Login: <?= Yii::$app->user->identity->login ?></h3>
                <h3>Email: <?= Yii::$app->user->identity->email ?></h3>
                <h3>Админ</h3>

                <p><a href="<?= 'admin/edit/profile/'.Yii::$app->user->identity->id ?>" class="btn btn-primary">Редактировать профиль</a>

                <br>
                <br>

                <a href="<?= 'admin/delete/profile' ?>" class="btn btn-warning">Удалить аккаунт</a></p>


                <a href="<?= 'admin/edit/profile/photo' ?>" class="btn btn-success">Обновить фото</a></p>
            </div>
        </div>
    </li>
</ul>
</div>