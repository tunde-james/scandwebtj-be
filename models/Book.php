<?php

class Book extends Product
{
  public $weight;

  public function __construct($product)
  {
    parent::__construct($product);
    $this->weight = $product->weight;
  }  
}

