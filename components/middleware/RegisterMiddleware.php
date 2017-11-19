<?php


/**
 * This is the setting file of the middleware.
 */

use app\components\middleware\PullMiddleWare;

require __DIR__ . '/PullMiddleWare.php';
require __DIR__ . '/Middleware.php';

/**
 * Here you need to include the class you want to register.
 */
require __DIR__ . '/CheckingAdmin.php';
require __DIR__ . '/CheckEditProfile.php';

/**
 * Here you need to register the class.
 */

PullMiddleWare::pushProduct(new app\components\middleware\CheckingAdmin('checkingAdmin'));
PullMiddleWare::pushProduct(new app\components\middleware\CheckEditProfile('checkEditProfile'));