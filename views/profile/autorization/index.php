<?php

/* @var $this yii\web\View */

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
        <h2>Erat lacinia</h2>
    </header>
    <div class="features">
        <article>
            <span class="icon fa-diamond"></span>
            <div class="content">
                <h3>Portitor ullamcorper</h3>
                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
            </div>
        </article>
        <article>
            <span class="icon fa-paper-plane"></span>
            <div class="content">
                <h3>Sapien veroeros</h3>
                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
            </div>
        </article>
        <article>
            <span class="icon fa-rocket"></span>
            <div class="content">
                <h3>Quam lorem ipsum</h3>
                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
            </div>
        </article>
        <article>
            <span class="icon fa-signal"></span>
            <div class="content">
                <h3>Sed magna finibus</h3>
                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
            </div>
        </article>
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
            <a href="#" class="image"><img src="<?= $article->photo_link ?>" alt="" /></a>
            <strong style="margin-bottom: 20px; display: block;">Создатель: <?= $article->user->login ?></strong>
            <h3><?= $article->header ?></h3>
            <p><?=  $article->small_text ?></p>
            <ul class="actions">
                <li><a href="<?= '/article/'.$article->id ?>" class="button">More</a></li>
            </ul>
        </article>
    <?php endforeach; ?>
    </div>
</section>

