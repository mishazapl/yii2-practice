<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<section>
    <header class="main">
        <h1><?= Html::encode($article->header) ?></h1>
    </header>

    <figure style="text-align: center;">

    <span class="image main"><img src="<?= $article->photo_link ?>" alt="<?= $article->header ?>" /></span>

    </figure>

    <acticle>

        <p style="font-size: 1.3em; color: black;"><?= Html::encode($article->full_text) ?></p>

    </acticle>


</section>

<section>
    <div class="comments">
        <h3 class="title-comments">Комментарии (6)</h3>
        <ul class="media-list">
            <!-- Комментарий (уровень 1) -->
            <li class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-circle" src="" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="author">Дима</div>
                            <div class="metadata">
                                <span class="date">16 ноября 2015, 13:43</span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="media-text text-justify">Lorem ipsum dolor sit amet. Blanditiis praesentium voluptatum deleniti atque. Autem vel illum, qui blanditiis praesentium voluptatum deleniti atque corrupti. Dolor repellendus cum soluta nobis. Corporis suscipit laboriosam, nisi ut enim. Debitis aut perferendis doloribus asperiores repellat. sint, obcaecati cupiditate non numquam eius. Itaque earum rerum facilis. Similique sunt in ea commodi. Dolor repellendus numquam eius modi. Quam nihil molestiae consequatur, vel illum, qui ratione voluptatem accusantium doloremque.</div>
                            <div class="pull-right"><a class="btn btn-info" href="#">Ответить</a></div>
                        </div>
                    </div>
                    <!-- Вложенный медиа-компонент (уровень 2) -->
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="author">Пётр</div>
                                    <div class="metadata">
                                        <span class="date">19 ноября 2015, 10:28</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="media-text text-justify">Dolor sit, amet, consectetur, adipisci velit. Aperiam eaque ipsa, quae. Amet, consectetur, adipisci velit, sed quia consequuntur magni dolores. Ab illo inventore veritatis et quasi architecto. Quisquam est, omnis voluptas nulla. Obcaecati cupiditate non numquam eius modi tempora. Corporis suscipit laboriosam, nisi ut labore et aut reiciendis.</div>
                                    <div class="pull-right"><a class="btn btn-info" href="#">Ответить</a></div>
                                </div>
                            </div>

                            <!-- Вложенный медиа-компонент (уровень 3) -->
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-circle" src="" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="author">Александр</div>
                                            <div class="metadata">
                                                <span class="date">Вчера в 19:34</span>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="media-text text-justify">Amet, consectetur, adipisci velit, sed ut labore et dolore. Maiores alias consequatur aut perferendis doloribus asperiores. Voluptas nulla vero eos.</div>
                                            <div class="pull-right"><a class="btn btn-info" href="#">Ответить</a></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Конец вложенного комментария (уровень 3) -->

                        </div>
                    </div>
                    <!-- Конец вложенного комментария (уровень 2) -->

                    <!-- Ещё один вложенный медиа-компонент (уровень 2) -->
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" src="" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="author">Сергей</div>
                                    <div class="metadata">
                                        <span class="date">20 ноября 2015, 17:45</span>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="media-text text-justify">Ex ea voluptate velit esse, quam nihil impedit, quo minus id quod. Totam rem aperiam eaque ipsa, quae ab illo. Minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Iste natus error sit voluptatem. Sunt, explicabo deleniti atque corrupti, quos dolores et expedita.</div>
                                    <div class="pull-right"><a class="btn btn-info" href="#">Ответить</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Конец ещё одного вложенного комментария (уровень 2) -->

                </div>
            </li>
            <!-- Конец комментария (уровень 1) -->

        </ul>
    </div>
</section>
