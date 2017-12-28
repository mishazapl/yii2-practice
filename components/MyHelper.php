<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 14.12.17
 * Time: 21:18
 */

namespace app\components;


class MyHelper
{
    /**
     * @param $var
     *
     * Распечатка переменной.
     */
    public static function dump($var)
    {

        print '<pre>';

        die(print_r($var, true).'</pre>');

    }

    /**
     * @param $link
     *
     * Удаление файла.
     */

    public static function deleteFile($link)
    {
        unlink(getcwd().$link);
    }

}