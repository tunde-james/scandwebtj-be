<?php

class Dbh
{
  private $host = 'localhost';
  private $user = 'root';
  private $dbname = 'scandiweb_test';
  private $pwd = '';
  private $model = 'products';

  private $sku = '';
  private $name = '';
  private $price = 0;
  private $type = '';
  private $weight = '';
  private $size = '';
  private $height = '';
  private $width = '';
  private $length = '';

  public function getConnection()
  {
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    return $pdo;
  }

  public function checkSku($sku)
  {
    if($sku == '') return false;

    $conn = $this->getConnection();
    $sql = "SELECT * FROM " . $this->model . " WHERE sku = :sku";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':sku', $sku);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
  }

  public function setColumn($key, $value)
  {
    $this->$key = $value;
  }

  public function insert(){
    $conn = $this->getConnection();
    if ($this->checkSku($this->sku))

    return ['status' => 0, 'message' => 'SKU already exists.'];

    $sql = "INSERT INTO products
            (sku, name, price, type, weight, size, height, width, length) VALUES 
            (:sku, :name, :price, :type, :weight, :size, :height, :width, :length)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':sku', $this->sku);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':type', $this->type);
    $stmt->bindParam(':weight', $this->weight);
    $stmt->bindParam(':size', $this->size);
    $stmt->bindParam(':height', $this->height);
    $stmt->bindParam(':width', $this->width);
    $stmt->bindParam(':length', $this->length);

    if ($stmt->execute()) {
      $response = ['status' => 1, 'message' => 'Record created successfully.'];
    } else {
      $response = ['status' => 0, 'message' => 'Failed to create record.'];
    }
    
    return $response;
  }

  public function getSingle($id)
  {
    $conn = $this->getConnection();
    $sql = "SELECT * FROM " . $this->model . "WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    return $product;
  }

  public function getAll()
  {
    $conn = $this->getConnection();
    $sql = "SELECT * FROM " . $this->model;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $products;
  }
  
  public function delete($id) 
  {
    $conn = $this->getConnection();
    $sql = "DELETE FROM " . $this->model . " WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
} 