<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form ActiveForm */

?>
<?php Pjax::begin(['id' => 'article', 'timeout' => 10000]) ?>
<div class="article-create-article">

    <?php if(isset($successCreate)): ?>

    <div class="alert alert-success" role="alert">
        <strong>Успешно добавленно</strong> Вы успешно добавили запись.
    </div>

    <?php endif; ?>

    <?php $form = ActiveForm::begin(['options' => ['id' => 'articles','data-pjax' => true,'enctype' => 'multipart/form-data']]
    ) ?>

        <?= $form->field($model, 'header') ?>
        <?= $form->field($model, 'small_text')->textarea(['style' => 'width: 100%;']) ?>
        <?= $form->field($model, 'full_text')->textarea(['style' => 'width: 100%;']) ?>
        <?= $form->field($model, 'image')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Добавить статью',  ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
<?php Pjax::end(); ?>

<?php

$this->registerJs('$("document").on(\'beforeSubmit\', function() {

        $.pjax.reload({container: \'#article\', async: false});

    });', View::POS_LOAD)

?>

