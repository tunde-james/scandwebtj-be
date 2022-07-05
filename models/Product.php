<?php

abstract class Product
{
  public $sku;
  public $name;
  public $price;
  public $type;

  public function __construct($product)
  {
    $this->sku = $product->sku;
    $this->name = $product->name;
    $this->price = $product->price;
    $this->type = $product->type;
  }
}