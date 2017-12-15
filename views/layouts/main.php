<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\SiteAsset;
use yii\helpers\Html;

SiteAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/FontAwesome.otf">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.ttf">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <aside id="header">
                <a href="/" class="logo"><strong>
                        <mark>PHP7, Yii2, Laravel, Алгоритмы.</mark>
                    </strong><br>
                    <mark>Блог по Web-разработки Yii2, PHP7, Курсы.</mark>
                </a>
                <ul class="icons">
                    <li><a href="https://vk.com/volgograd_web" class="icon fa-vk" style="text-decoration: none"><span
                                    class="label">Вконтакте</span></a></li>
                    <li><a href="https://www.youtube.com/channel/UCigVxgLgBPLjilARivIFtwg" class="icon fa-youtube"
                           style="text-decoration: none"><span class="label">YouTube</span></a></li>
                </ul>
            </aside>

            <?= $content ?>

        </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar">
        <div class="inner" style="position: relative;">

            <!-- Search -->
            <section id="search" class="alt">
                <form method="post" action="#">
                    <input type="text" name="query" id="query" placeholder="Поиск"/>
                </form>
            </section>

            <!-- Menu -->
            <nav id="menu">
                <div class="major">
                    <?php if (Yii::$app->user->isGuest): ?>
                        <h2><a href="/signup">Регистрация</a></h2>
                        <h2><a href="/login">Авторизация</a></h2>
                    <?php else: ?>
                        <?=
                        Html::beginForm(['/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->login . ')',
                            ['class' => 'btn']
                        )
                        . Html::endForm()
                        ?>
                        <?php if (\Yii::$app->user->can('admin')): ?>
                            <h2><a href="/admin">Админ-панель</a></h2>
                        <?php endif; ?>
                    <?php endif; ?>
                    <h2>Меню</h2>
                </div>
                <ul>
                    <li><a href="/">Главная</a></li>
                </ul>
            </nav>

            <!-- Section -->
            <section class="comments">
                <header class="major">
                    <h2>Последние коментарии</h2>
                </header>
                <div class="mini-posts">
                    <aside>
                        <figure><a href="#" class="image"><img src="" alt=""/></a></figure>
                        <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
                    </aside>
                </div>
                <ul class="actions">
                    <li><a href="#" class="button">More</a></li>
                </ul>
            </section>

            <!-- Section -->
            <section>
                <address>
                    <header class="major">
                        <h2>PHP-программист</h2>
                    </header>
                    <p>Здравствуй мой дорогой друг, я php программист с опытом работы более года, занимаюсь разработкой
                        CRM-систем на фреймворке Yii2. Здесь ты найдешь полезные статьи и возможно даже
                        приватные/платные онлайн курсы.</p>
                    <ul class="contact">
                        <address>
                            <li class="fa-envelope-o"><a href="mailto:mzapalenov@mail.ru"
                                                         target="_blank">mzapalenov@mail.ru</a></li>
                            <li class="fa-phone">+7 (904) 428-97-92</li>
                            <li class="fa-home"> ул.Вершинина 6 кв. 38<br/>
                                Почтовый, Индекс 400007
                            </li>
                    </ul>
                </address>
            </section>

            <!-- Footer -->
            <footer id="footer">
                <p class="copyright">&copy; Tryst. Все права защищены. <br>
                    Руководитель: <a href="https://vk.com/atawerrus" target="_blank">Михаил Запаленов</a>.</p>
            </footer>

        </div>
    </div>

</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
