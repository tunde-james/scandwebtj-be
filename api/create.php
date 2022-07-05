<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');

if(!defined('_APPBASE')) 
define('_APPBASE', dirname(__FILE__));

require_once(str_replace('api', '', _APPBASE) . "/models/ApiClasses.php");
require_once(str_replace('api', '', _APPBASE) . '/models/Product.php');
require_once(str_replace('api', '', _APPBASE) . '/models/Book.php');
require_once(str_replace('api', '', _APPBASE) . '/models/Dvd.php');
require_once(str_replace('api', '', _APPBASE) . '/models/Furniture.php');
require_once(str_replace('api', '', _APPBASE) . '/models/Validation.php');

$data = json_decode(file_get_contents('php://input'));
$method = $_SERVER['REQUEST_METHOD'];

if(!empty($data) && $method == 'POST') {

  $validate = new Validation();
  $validate->validateInput();
  
  $products = [
    'book' => 'Book',
    'dvd' => 'Dvd',
    'furniture' => 'Furniture'
  ];
  
  $type = $data->type ?? false;

  if ($type) {
    $product = new $products[$data->type]($data);
    $create = new Create();
    $create->add($product);
    // $add->insertData();
  }
}