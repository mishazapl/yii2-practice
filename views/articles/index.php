<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

?>
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
            </ul>
        </div>
    </aside>
</section>
