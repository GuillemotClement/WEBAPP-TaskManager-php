<?php

use Root\App\Core\Database;

const BASE_PATH = __DIR__ . "/../";
require_once __DIR__ . "/../vendor/autoload.php";

function p(mixed $value){
  echo "<pre>";
  print_r($value);
  echo "</pre>";
}

function requireFile(string $fileName){
  require_once BASE_PATH . "src/$fileName.php";
}

function requirePartials(string $fileName){
  require_once BASE_PATH . "/src/partials/$fileName.php";
}

function requireHeader(){
  requirePartials("head");
  requirePartials("header");
}

function requireFooter(){
  requirePartials("footer");
}

function renderView(string $fileName, array $options){
  extract($options);
  require_once BASE_PATH . "src/Views/{$fileName}View.php";
}

function requireController(string $controllerName){
  require_once BASE_PATH . "src/Controllers/{$controllerName}Controller.php";
}

$db = new Database();

$db->pdo;

$uri = $_SERVER["REQUEST_URI"];

$path = parse_url($uri)["path"] ?? "";
$query = parse_url($uri)["query"] ?? "";

if($path === "/"){
  requireController("homepage");
}else if($path === "/user"){
  requireController("User");
}