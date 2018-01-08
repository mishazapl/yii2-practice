<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $title;

?>

<div>

    <?php $form = ActiveForm::begin(['id' => 'edit-profile']); ?>

    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true, 'value' => $model->first_name]) ?>
    <?= $form->field($model, 'last_name')->textInput(['value' => $model->last_name]) ?>
    <?= $form->field($model, 'gender')->textInput(['value' => $model->gender]) ?>
    <?= $form->field($model, 'career')->textInput(['value' => $model->career]) ?>
    <?= $form->field($model, 'birthdate')->textInput(['value' => $model->birthdate]) ?>

    <?php if ($model->photo_link != null): ?>
        <div class="image-300-200">
            <img src="<?= $model->photo_link ?>" alt="300x200" data-src="holder.js/300x200" style="width: 100%; height: 100%;">
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'photo_link')->fileInput() ?>

    <?php if ($model->background_link != null): ?>
        <div class="image-300-200">
            <img src="<?= $model->background_link ?>" alt="300x200" data-src="holder.js/300x200" style="width: 100%; height: 100%;">
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'background_link')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Редактировать', ['class' => 'btn', 'name' => 'edit-profile']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
