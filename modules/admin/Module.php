<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'admin-panel';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $locator = new \yii\di\ServiceLocator;
        $locator->setComponents([
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'sqlite:path/to/file.db',
            ],
            'cache' => [
                'class' => 'yii\caching\DbCache',
                'db' => 'db',
            ],
        ]);

        $db = $locator->get('db');  // or $locator->db
        $cache = $locator->get('cache');

    }
}
