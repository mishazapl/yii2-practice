<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = $title;

?>
<?php Pjax::begin(['id' => 'article', 'timeout' => 10000, 'enablePushState' => false]) ?>
Banner
<style>
    .content p {
        font-size: 1.3em;
    }
</style>
<?php if (Yii::$app->user->isGuest): ?>
    <section id="banner text-center" style="margin-bottom: 3em;">
        <div class="content">
            <header>
                <h1>Веб-программирование, PHP, Yii2, курсы и многое другое!</h1>
                <p style="margin-top: 1em;">Что это за место?</p>
            </header>
            <p>Друг, это то самое место о котором мы с тобой мечтали! Бесконечный экшен, обсуждения, актуальная
                информация из мира веб-разработки, в этом месте ты можешь по настоящему окунуться с головой в мир
                веб-разработки и даже пообщаться с опытными программистами, только учти, мы не терпим мудаков, а так
                добро пожаловать мой современный друг!
                <br> Дам подсказку, слева от тебя есть кнопка зарегистрироваться:)</p>
            <ul class="actions">
                <li><a href="/signup" class="button big" style="text-decoration: none">Зарегистрироваться</a></li>
            </ul>
        </div>
    </section>
<?php endif; ?>

<!-- Section -->
<section>
    <header class="major">
        <h2>Статьи</h2>
    </header>
    <div class="text-center col-12">
        <?= \yii\widgets\LinkPager::widget
        (
            [
                'pagination' => $pages,
            ]
        ) ?>
    </div>
    <div class="posts">
        <?php foreach ($articles as $article): ?>
            <main>
                <article>
                    <figure>
                        <a href="#" class="image"
                       style="width: 300px;height: 150px; text-align: center; display: inline-block;"><img
                                class="img-responsive"
                                style="-webkit-background-size: cover;background-size: cover; width: 100%;height: 100%;"
                                src="<?= $article->photo_link ?>" alt=""/></a></figure>
                    <strong style="margin-bottom: 20px; display: block;">Создатель: <?= Html::encode($article->user->login) ?></strong>
                    <strong style="margin-bottom: 20px; display: block;">Дата создания:
                        <time><?= $article->created_at ?></time>
                    </strong>
                    <h3 style="font-size: 1.5em;"><?= Html::encode($article->header) ?></h3>
                    <p><?= Html::encode($article->small_text) ?></p>
                    <ul class="actions">
                        <li><a href="<?= '/article/' . $article->id ?>" class="button">More</a></li>
                    </ul>
                </article>
            </main>
        <?php endforeach; ?>
    </div>
</section>
<?php Pjax::end(); ?>
<?php

$this->registerJs('function setEqualHeight(columns) {
        var tallestcolumn = 0;
        columns.each(
        function() {
            currentHeight = $(this).height();
            if(currentHeight > tallestcolumn) {
             tallestcolumn = currentHeight;
            }
        }
        );
        columns.height(tallestcolumn);
    }
    $(document).ready(function() {
     setEqualHeight($("article > p"));
     setEqualHeight($("article > h3"));
     setEqualHeight($("article > a"));
     setEqualHeight($("article > strong"));
     setEqualHeight($("article > ul"));
    });', $this::POS_LOAD);

$this->registerJs('$("#delete-article").click(function() {

        $.pjax.reload({container: \'#article\', async: false});

    });', $this::POS_LOAD)

?>

