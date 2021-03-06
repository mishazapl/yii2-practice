<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */

class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/siteMain.css',
        'css/font-awesome.min.css',
        'css/bootstrap.min.css',
        'css/profile-layout.css',
    ];
    public $js = [

        'js/jquery-3.2.1.min.js',
        'js/bootstrap.min.js',
        'js/jquery.pjax.js',
        'js/skel.min.js',
        'js/util.js',
        'js/respond.min.js',
        'js/main.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
