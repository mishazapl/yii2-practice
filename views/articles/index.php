<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<style>
    html {
        font-size: 16px;
    }
    .media-body .author {
        display: inline-block;
        font-size: 1rem;
        color: #000;
        font-weight: 700;
    }
    .media-body .metadata {
        display: inline-block;
        margin-left: .5rem;
        color: #777;
        font-size: .8125rem;
    }
    .footer-comment {
        color: #777;
    }
    .vote.plus:hover {
        color: green;
    }
    .vote.minus:hover {
        color: red;
    }
    .vote {
        cursor: pointer;
    }
    .comment-reply a {
        color: #777;
    }
    .comment-reply a:hover, .comment-reply a:focus {
        color: #000;
        text-decoration: none;
    }
    .devide {
        padding: 0px 4px;
        font-size: 0.9em;
    }
    .media-text {
        margin-bottom: 0.25rem;
    }
    .title-comments {
        font-size: 1.4rem;
        font-weight: bold;
        line-height: 1.5rem;
        color: rgba(0,0,0,.87);
        margin-bottom: 1rem;
        padding-bottom: .25rem;
        border-bottom: 1px solid rgba(34,36,38,.15);
    }
</style>
<section>
    <main>
        <header class="main">
            <h1><?= Html::encode($article->header) ?></h1>
        </header>

        <figure style="text-align: center;">

            <span class="image main"><img src="<?= $article->photo_link ?>" alt="<?= $article->header ?>"/></span>

        </figure>

        <acticle>

            <p style="font-size: 1.3em; color: black;"><?= Html::encode($article->full_text) ?></p>

        </acticle>
    </main>
</section>

<section>
    <aside>
        <div class="comments">
            <h3 class="title-comments">Комментарии (6)</h3>
            <ul class="media-list">
                <!-- Комментарий (уровень 1) -->
                <li class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="avatar1.jpg" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <div class="author">Дима</div>
                            <div class="metadata">
                                <span class="date">16 ноября 2015, 13:43</span>
                            </div>
                        </div>
                        <div class="media-text text-justify">Lorem ipsum dolor sit amet. Blanditiis praesentium
                            voluptatum deleniti atque. Autem vel illum, qui blanditiis praesentium voluptatum deleniti
                            atque corrupti. Dolor repellendus cum soluta nobis. Corporis suscipit laboriosam, nisi ut
                            enim. Debitis aut perferendis doloribus asperiores repellat. sint, obcaecati cupiditate non
                            numquam eius. Itaque earum rerum facilis. Similique sunt in ea commodi. Dolor repellendus
                            numquam eius modi. Quam nihil molestiae consequatur, vel illum, qui ratione voluptatem
                            accusantium doloremque.
                        </div>
                        <div class="footer-comment">
        <span class="vote plus" title="Нравится">
          <i class="fa fa-thumbs-up"></i>
        </span>
                            <span class="rating">

        </span>
                            <span class="vote minus" title="Не нравится">
          <i class="fa fa-thumbs-down"></i>
        </span>
                            <span class="devide">

        </span>
                            <span class="comment-reply">
         <a href="#" class="reply">ответить</a>
        </span>
                        </div>

                        <!-- Вложенный медиа-компонент (уровень 2) -->
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-rounded" src="avatar2.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author">Пётр</div>
                                    <div class="metadata">
                                        <span class="date">19 ноября 2015, 10:28</span>
                                    </div>
                                </div>
                                <div class="media-text text-justify">Dolor sit, amet, consectetur, adipisci velit.
                                    Aperiam eaque ipsa, quae. Amet, consectetur, adipisci velit, sed quia consequuntur
                                    magni dolores. Ab illo inventore veritatis et quasi architecto. Quisquam est, omnis
                                    voluptas nulla. Obcaecati cupiditate non numquam eius modi tempora. Corporis
                                    suscipit laboriosam, nisi ut labore et aut reiciendis.
                                </div>
                                <div class="footer-comment">
            <span class="vote plus" title="Нравится">
              <i class="fa fa-thumbs-up"></i>
            </span>
                                    <span class="rating">

            </span>
                                    <span class="vote minus" title="Не нравится">
              <i class="fa fa-thumbs-down"></i>
            </span>
                                    <span class="devide">

            </span>
                                    <span class="comment-reply">
              <a href="#" class="reply">ответить</a>
            </span>
                                </div>

                                <!-- Вложенный медиа-компонент (уровень 3) -->
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object img-rounded" src="avatar3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <div class="author">Александр</div>
                                            <div class="metadata">
                                                <span class="date">Вчера в 19:34</span>
                                            </div>
                                        </div>
                                        <div class="media-text text-justify">Amet, consectetur, adipisci velit, sed ut
                                            labore et dolore. Maiores alias consequatur aut perferendis doloribus
                                            asperiores. Voluptas nulla vero eos. Minima veniam, quis nostrum
                                            exercitationem ullam corporis. Atque corrupti, quos dolores eos, qui
                                            blanditiis praesentium voluptatum deleniti atque corrupti. Quibusdam et
                                            harum quidem rerum necessitatibus saepe eveniet, ut enim ipsam. Magni
                                            dolores et dolorum fuga nostrum exercitationem ullam. Eligendi optio, cumque
                                            nihil molestiae consequatur.
                                        </div>
                                        <div class="footer-comment">
                <span class="vote plus" title="Нравится">
                  <i class="fa fa-thumbs-up"></i>
                </span>
                                            <span class="rating">

                </span>
                                            <span class="vote minus" title="Не нравится">
                  <i class="fa fa-thumbs-down"></i>
                </span>
                                            <span class="devide">

                </span>
                                            <span class="comment-reply">
                  <a href="#" class="reply">ответить</a>
                </span>
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
                                    <img class="media-object img-rounded" src="avatar4.jpg" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author">Сергей</div>
                                    <div class="metadata">
                                        <span class="date">20 ноября 2015, 17:45</span>
                                    </div>
                                </div>
                                <div class="media-text text-justify">Ex ea voluptate velit esse, quam nihil impedit, quo
                                    minus id quod. Totam rem aperiam eaque ipsa, quae ab illo. Minima veniam, quis
                                    nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid. Iste
                                    natus error sit voluptatem. Sunt, explicabo deleniti atque corrupti, quos dolores et
                                    expedita.
                                </div>
                                <div class="footer-comment">
            <span class="vote plus" title="Нравится">
              <i class="fa fa-thumbs-up"></i>
            </span>
                                    <span class="rating">

            </span>
                                    <span class="vote minus" title="Не нравится">
              <i class="fa fa-thumbs-down"></i>
            </span>
                                    <span class="devide">

            </span>
                                    <span class="comment-reply">
              <a href="#" class="reply">ответить</a>
            </span>
                                </div>
                            </div>
                        </div>
                        <!-- Конец ещё одного вложенного комментария (уровень 2) -->

                    </div>
                </li>
                <!-- Конец комментария (уровень 1) -->

                <!-- Комментарий (уровень 1) -->
                <li class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="avatar5.jpg" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <div class="author">Иван</div>
                            <div class="metadata">
                                <span class="date">Вчера в 17:34</span>
                            </div>
                        </div>
                        <div class="media-text text-justify">Eum iure reprehenderit, qui dolorem eum fugiat. Sint et
                            expedita distinctio velit. Architecto beatae vitae dicta sunt, explicabo unde omnis. Qui
                            aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto. Nemo enim ipsam
                            voluptatem quia. Eos, qui ratione voluptatem sequi nesciunt, neque porro. A sapiente
                            delectus, ut enim ipsam voluptatem, quia non recusandae architecto beatae.
                        </div>
                        <div class="footer-comment">
        <span class="vote plus" title="Нравится">
          <i class="fa fa-thumbs-up"></i>
        </span>
                            <span class="rating">

        </span>
                            <span class="vote minus" title="Не нравится">
          <i class="fa fa-thumbs-down"></i>
        </span>
                            <span class="devide">

        </span>
                            <span class="comment-reply">
          <a href="#" class="reply">ответить</a>
        </span>
                        </div>
                    </div>
                </li>
                <!-- Конец комментария (уровень 1) -->

                <!-- Комментарий (уровень 1) -->
                <li class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="avatar1.jpg" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <div class="author">Дима</div>
                            <div class="metadata">
                                <span class="date">3 минуты назад</span>
                            </div>
                        </div>
                        <div class="media-text text-justify">Tempore, cum soluta nobis est et quas. Quas molestias
                            excepturi sint, obcaecati cupiditate non provident, similique sunt in. Obcaecati cupiditate
                            non recusandae impedit. Hic tenetur a sapiente delectus. Facere possimus, omnis dolor
                            repellendus inventore veritatis et voluptates. Ipsa, quae ab illo inventore veritatis et
                            quasi architecto beatae. In culpa, qui in culpa. Cum soluta nobis est laborum et aut
                            perferendis doloribus. Vitae dicta sunt, explicabo perspiciatis. Amet, consectetur, adipisci
                            velit, sed quia voluptas sit, aspernatur. Obcaecati cupiditate non provident, similique sunt
                            in. Reiciendis voluptatibus maiores alias consequatur aut officiis debitis aut perferendis
                            doloribus asperiores. Assumenda est, omnis dolor repellendus voluptas assumenda est omnis.
                        </div>
                        <div class="footer-comment">
        <span class="vote plus" title="Нравится">
          <i class="fa fa-thumbs-up"></i>
        </span>
                            <span class="rating">

        </span>
                            <span class="vote minus" title="Не нравится">
          <i class="fa fa-thumbs-down"></i>
        </span>
                            <span class="devide">

        </span>
                            <span class="comment-reply">
          <a href="#" class="reply">ответить</a>
        </span>
                        </div>
                    </div>
                </li>
                <!-- Конец комментария (уровень 1) -->

            </ul>
        </div>
    </aside>
</section>
