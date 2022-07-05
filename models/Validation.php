<?php

require_once(str_replace('api', '', _APPBASE) . '/models/Product.php');
require_once(str_replace('api', '', _APPBASE) . '/models/Book.php');
require_once(str_replace('api', '', _APPBASE) . '/models/Dvd.php');
require_once(str_replace('api', '', _APPBASE) . '/models/Furniture.php');

class Validation
{
  public function validateInput()
  {
    $data = json_decode(file_get_contents('php://input'));

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
      if (empty($data->sku)) {
        die(json_encode(['status'=> 0, "message"=> "Please enter the product sku"]));
      }

      if (empty($data->name)) {
        die(json_encode(['status'=> 0, "message"=> "Please enter a product name"]));
      }

      if (empty($data->price)) {
        die(json_encode(['status'=> 0, "message"=> "Please enter a product price"]));
      }

      if (!is_numeric($data->price)) {
        die(json_encode(['status'=> 0, "message"=> "Product price must be a valid numeric amount"]));
      }

      if (empty($data->type)) {
        die(json_encode(['status'=> 0, "message"=> "Please select a product type"]));
      }

      if ($data->type == 'book') {
        if (empty($data->weight)) {
          die(json_encode(['status'=> 0, "message"=> "Please enter the book weight"]));
        } 

        if (!is_numeric($data->weight)) {
          die(json_encode(['status'=> 0, "message"=> "Book weight must be a valid numeric value"]));
        }
      } elseif ($data->type == 'dvd') {
         if (empty($data->size)) {
          die(json_encode(['status'=> 0, "message"=> "Please enter the dvd size"]));
        } 

        if (!is_numeric($data->size)) {
          die(json_encode(['status'=> 0, "message"=> "Dvd size must be a valid numeric value"]));
        }
      } elseif ($data->type == 'furniture') {
        if (empty($data->height)) die(json_encode(['status'=> 0, "message"=> "Please enter the furniture height"]));

        if (!is_numeric($data->height)) die(json_encode(['status'=> 0, "message"=> "Furniture height must be a valid numeric value"]));

        if  (empty($data->width)) die(json_encode(['status'=> 0, "message"=> "Please enter the furniture width"]));

        if  (!is_numeric($data->width)) die(json_encode(['status'=> 0, "message"=> "Furniture width must be a valid numeric value"]));

        if  (empty($data->length)) die(json_encode(['status'=> 0, "message"=> "Please enter the furniture length"]));

        if  (!is_numeric($data->length)) die(json_encode(['status'=> 0, "message"=> "Furniture length must be a valid numeric value"]));
        
      } else {
        null;
      }
    }
  }
}