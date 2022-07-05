<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json');

define('_APPBASE', dirname(__FILE__));
require_once(_APPBASE . '/api/create.php');
require_once(_APPBASE . '/api/read.php');
require_once(_APPBASE . '/api/delete.php');
