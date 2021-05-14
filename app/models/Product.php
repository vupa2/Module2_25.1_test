<?php

namespace app\models;

class Product
{
    public $id;
    public $name;
    public $category;
    public $price;
    public $quantity;
    public $description;

    public function __construct($name, $category, $price, $quantity, $description)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
    }
}
