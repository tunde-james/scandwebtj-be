<?php

require_once 'Dbh.php';

class Read {

  public function get()
  {
    $objDb = new Dbh;
    $conn = $objDb->getConnection();

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
      $path = explode('/', $_SERVER['REQUEST_URI']);
      if (isset($path[2]) && is_numeric($path[2])) {
        return json_encode($objDb->getSingle($path[2]));
      } else {
        return json_encode($objDb->getAll());
      }
    }
  }
}

class Create extends Dbh {

  public function add($product)
  {
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'POST') {
      if(!empty($product->sku)) $this->setColumn('sku', $product->sku);
      if(!empty($product->name)) $this->setColumn('name', $product->name);
      if(!empty($product->sku)) $this->setColumn('price', $product->price);
      if(!empty($product->type)) $this->setColumn('type', $product->type);
      if(!empty($product->weight)) $this->setColumn('weight', $product->weight);
      if(!empty($product->size)) $this->setColumn('size', $product->size);
      if(!empty($product->height)) $this->setColumn('height', $product->height);
      if(!empty($product->width)) $this->setColumn('width', $product->width);
      if(!empty($product->length)) $this->setColumn('length', $product->length);

      die (json_encode($this->insert()));
    }
  }

  // public function insertData($products)
  // {
  //   foreach ($products as $product) {
  //     echo $product->insert();
  //   }
  // }
}

class Delete extends Dbh {
  public $data = [];
  
  public function __construct($data)
  {
    $this->data = $data;
  }

  public function deleteData()
  {
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'DELETE') {
      foreach($this->data->id AS $pid) {
        $id = (int) $pid;
        $this->delete($id);
      }
          
      $products = $this->getAll();
      die(json_encode($products));
    }
  }
}
