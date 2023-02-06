<?php

namespace SimpleStore;

use InvalidArgumentException;
use Lumi\Logger;

class Cart {

    private array $products; /* List of the products in the cart */

    public function __construct(array $products)
    {
        foreach ($products as $product) {
            if (!$product instanceof Product) {
                var_dump($product);
                Logger::warning('User try to add invalid product in cart. :product', [
                    'product' => json_encode($product)
                ]);
                throw new InvalidArgumentException('This product is invalid');
            }
        }
        Logger::info('User create new cart');

        $this->products = $products;
    }


    public function addProduct(Product $product)
    {
        Logger::info('User add :product in cart', [
            'product' => $product->name
        ]);
        $this->products[] = $product;
    }

    public function removeProduct($name) {
        Logger::info('User remove :product from cart', [
            'product' => $name
        ]);

        $this->products = array_filter($this->products, function (Product $product) use ($name) {
            return $name !== $product->name;
        });
    }

    public function getInfo() {
        Logger::info('User request info about cart');
        return sprintf("In your cart %s items", count($this->products));
    }
}