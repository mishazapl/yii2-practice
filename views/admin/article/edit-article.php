<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form ActiveForm */

?>
<div class="article-edit-article">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'header')->textInput(['value' => $article->header]) ?>
        <?= $form->field($model, 'small_text')->textInput(['value' => $article->small_text]) ?>
        <?= $form->field($model, 'full_text')->textInput(['value' => $article->full_text]) ?>
    <div style="width: 100px;height: 100px;"><img style="-webkit-background-size: cover;background-size: cover; width: 100%;height: 100%;" src="<?= $article->photo_link ?>" alt="нету фото"></div>
        <?= $form->field($model, 'image')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
