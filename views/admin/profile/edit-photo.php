<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;


?>

<style>
    .photo {
        width: 100%;
        height: 100%;
        -webkit-background-size: cover;
        background-size: cover;
    }
    .image-300-200 {
        width: 200px;
        height: 200px;
    }
</style>

<div>

    <?php if (Yii::$app->user->identity->photo_link == null): ?>
        <div>У вас нету фотографии</div>

    <?php else: ?>

        <div class="image-300-200"><img src="<?php echo Yii::$app->user->identity->photo_link ?>" alt="300x200" data-src="holder.js/300x200" style="width: 100%; height: 100%;"></div>

    <?php endif; ?>

    <?php $form = ActiveForm::begin(['id' => 'edit-photo']); ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary', 'name' => 'edit-photo']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
