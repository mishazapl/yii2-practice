<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 09.12.17
 * Time: 12:46
 */

namespace app\controllers\article;


use app\controllers\SiteAbstract;
use yii\base\Module;

class ArticleController extends SiteAbstract
{
    private $articleComment;

    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->articleComment = new ArticleComment();
    }
}