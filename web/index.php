<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../components/Dumper.php';
require __DIR__ . '/../components/DeleteFile.php';
require __DIR__ . '/../components/middleware/RegisterMiddleware.php';


$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
