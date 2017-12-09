<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 09.12.17
 * Time: 12:32
 */

namespace app\controllers\article;

use app\models\Article\Article;

class ArticleComment
{

    public function lastComment($numComment)
    {
       $numComment = (int) $numComment;
    }

    public function articleComment($idArticle)
    {
        $idArticle = (int) $idArticle;

        $article = Article::find()->where(['id' => $idArticle]);

        return $article;
    }

}