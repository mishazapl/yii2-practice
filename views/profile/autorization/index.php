<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $title;

?>

<!-- Banner -->
<section id="banner text-center">
    <div class="content">
        <header>
            <h1>Привет, спасибо что зашел!</h1>
            <p>Что это за место?</p>
        </header>
        <p>Друг, это то самое место о котором мы с тобой мечтали! Бесконечный экшен, обсуждения, актуальная информация из мира веб-разработки, в этом месте ты можешь по настоящему окунуться с головой в мир веб-разработки и даже пообщаться с опытными программистами, только учти, мы не терпим мудаков, а так добро пожаловать мой современный друг!
            <br> Дам подсказку, слева от тебя есть кнопка зарегистрироваться:)</p>
        <ul class="actions">
            <li><a href="/signup" class="button big" style="text-decoration: none">Зарегистрироваться</a></li>
        </ul>
    </div>
</section>

<!-- Section -->
<section>
    <header class="major">
        <h2>Статьи</h2>
    </header>
    <div class="posts">
        <?php foreach ($articles as $article): ?>
        <article>
            <a href="#" class="image"><img src="<?= $article['photo_link'] ?>" alt="" /></a>
            <strong style="margin-bottom: 20px; display: block;">Создатель: <?= Html::encode($users[$article['user_id']]) ?></strong>
            <h1 style="font-size: 1.5em;"><?= Html::encode($article['header']) ?></h1>
            <p><?=  Html::encode($article['small_text']) ?></p>
            <ul class="actions">
                <li><a href="<?= '/article/'.$article['id'] ?>" class="button">More</a></li>
            </ul>
        </article>
    <?php endforeach; ?>
    </div>
</section>

