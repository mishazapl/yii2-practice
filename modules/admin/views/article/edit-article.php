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
<div class="article-edit-article">

    <?php if(isset($successCreate)): ?>

        <div class="alert alert-success" role="alert">
            <strong>Успешно обновили</strong> Вы успешно обновили запись.
        </div>

    <?php endif; ?>

    <?php $form = ActiveForm::begin(['options' => ['id' => 'articles','data-pjax' => true,'enctype' => 'multipart/form-data']]); ?>

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
<?php Pjax::end(); ?>

<?php

$this->registerJs('$("document").on(\'beforeSubmit\', function() {

        $.pjax.reload({container: \'#article\', async: false});

    });', View::POS_LOAD)

?>


