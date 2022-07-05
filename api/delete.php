<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');

if(!defined('_APPBASE')) 
define('_APPBASE', dirname(__FILE__));

require_once(str_replace('api', '', _APPBASE) . '/models/ApiClasses.php');

$data = json_decode(file_get_contents('php://input'));

$products = new Delete($data);

die($products->deleteData());

