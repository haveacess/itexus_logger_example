<?php

use SimpleStore\Cart;
use SimpleStore\Product;

require __DIR__ . '/vendor/autoload.php';

$products = [
    new Product('Apple', 5)
];

$cart = new Cart($products);
echo $cart->getInfo();
echo PHP_EOL;

$cart->addProduct(new Product('Orange', 12));
$cart->addProduct(new Product('Mango', 4));
echo $cart->getInfo();
echo PHP_EOL;

$cart->removeProduct('Mango');
echo $cart->getInfo();
echo PHP_EOL;
