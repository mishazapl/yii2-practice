<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 28.11.17
 * Time: 21:50
 */

namespace app\controllers;

use Yii;

trait SaveImage
{
    /**
     * Сохранение изображение и генерация рандомного пути.
     *
     * @param $model
     * @param $path
     * @throws \yii\base\Exception
     */
    protected function saveImage($model, $path)
    {

        if (!is_null($this->image)) {

            $randomPath = Yii::$app->security->generateRandomString();

            $this->image->saveAs("$path{$randomPath}.{$this->image->extension}");

            $model->photo_link = "/$path" . $randomPath . '.' . $this->image->extension;
        }

    }
}