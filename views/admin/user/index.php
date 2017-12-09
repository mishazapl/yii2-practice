<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Pjax;


?>


<h1>Все пользователи на сайте.</h1>

<?php Pjax::begin(['id' => 'users', 'timeout' => 10000, 'enablePushState' => false]) ?>

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
        <th>Логин</th>
        <th>Email</th>
        <th>Роль</th>
        <th>Фотография</th>
        <th>Действие</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($users as $user): ?>
        <tr>
            <th scope="row"><?= $user->login ?></th>
            <td><?= $user->email ?></td>
            <td><?= $user->role ?></td>
            <td>
                <div style="width: 100px;height: 100px;"><img
                            style="-webkit-background-size: cover;background-size: cover; width: 100%;height: 100%;"
                            src="<?= $user->photo_link ?>" alt="нету фото"></div>
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                        Выбрать
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                        <?php if ($user->banned == 1): ?>
                            <li><a href="<?= Url::toRoute(['/admin/user/ban/' . $user->id]) ?>" class="btn btn-success"
                                   style="margin-bottom: 10px; margin-top: 10px; font-size: 1.2em;">Разбанить</a></li>
                        <?php else: ?>
                            <li><a href="<?= Url::toRoute(['/admin/user/ban/' . $user->id]) ?>" class="btn btn-warning"
                                   style="margin-bottom: 10px; margin-top: 10px; font-size: 1.2em;">Забанить</a></li>
                        <?php endif; ?>

                        <li><a href="<?= Url::toRoute(['/admin/user/delete/' . $user->id]) ?>" class="btn btn-danger">Удалить</a></li>


                    </ul>
                </div>
            </td>

            <?php if ($user->banned == 1): ?>
                <td>
                    <button class="btn btn-danger">Забанен</button>
                </td>
            <?php else: ?>
                <td>
                    <button class="btn btn-success">Не забанен</button>
                </td>
            <?php endif; ?>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php Pjax::end(); ?>



