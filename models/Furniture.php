<?php

class Furniture extends Product
{
  public $height;
  public $width;
  public $length;

  public function __construct($product)
  {
    parent::__construct($product);
    $this->height = $product->height;
    $this->width = $product->width;
    $this->length = $product->length;
  }

  // public function validate()
  // {
  //   parent::validate();

  //   if (empty($this->height)) { 
  //     die(json_encode(['status'=> 0, "message"=> "Please enter the furniture height"]));
  //   }

  //   if (!is_numeric($this->height)) {
  //     die(json_encode(['status'=> 0, "message"=> "Furniture height must be a valid numeric value"]));
  //   }

  //   if  (empty($this->width)) {
  //     die(json_encode(['status'=> 0, "message"=> "Please enter the furniture width"]));
  //   }

  //   if  (!is_numeric($this->width)) {
  //     die(json_encode(['status'=> 0, "message"=> "Furniture width must be a valid numeric value"]));
  //   }

  //   if  (empty($this->length)) {
  //     die(json_encode(['status'=> 0, "message"=> "Please enter the furniture length"]));
  //   }

  //   if  (!is_numeric($this->length)) {
  //     die(json_encode(['status'=> 0, "message"=> "Furniture length must be a valid numeric value"]));
  //   }
  // }
}