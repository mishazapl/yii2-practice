<?php


namespace app\components\middleware;

class PullMiddleWare
{
    /**
     * @var Product[]
     */
    protected static $products = array();


    /**
     * Добавляет продукт в пул
     *
     * @param Product $product
     * @return void
     */
    public static function pushProduct(Middleware $product)
    {
        self::$products[$product->getId()] = $product;
    }

    /**
     * Возвращает продукт из пула
     *
     * @param integer|string $id - идентификатор продукта
     * @return Product $product
     */
    public static function getProduct($id)
    {
        return isset(self::$products[$id]) ? self::$products[$id] : null;
    }

}
