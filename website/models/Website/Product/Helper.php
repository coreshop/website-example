<?php

namespace Website\Product;

use CoreShop\Model\Product;

class Helper {

    /**
     * get Featured Products
     *
     * @return Product[]
     */
    public static function getFeaturedProducts() {
        $products = Product::getAll();

        return array(
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)]
        );
    }

    /**
     * get new Products
     *
     * @return Product[]
     */
    public static function getNewProducts() {
        return Product::getLatest(4);
    }

    /**
     * get popular Products
     *
     * @return Product[]
     */
    public static function getPopularProducts() {
        $products = Product::getAll();

        return array(
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)]
        );
    }

    /**
     * get sale Products
     *
     * @return Product[]
     */
    public static function getProductsOnSale() {
        $products = Product::getAll();

        return array(
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)],
            $products[rand(0, count($products) - 1)]
        );
    }
}