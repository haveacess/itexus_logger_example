<?php

namespace SimpleStore;

class Product {
    public string $name;
    public int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}