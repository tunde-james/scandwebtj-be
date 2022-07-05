<?php

class Dvd extends Product
{
  public $size;

  public function __construct($product)
  {
    parent::__construct($product);
    $this->size = $product->size;
  }  
}