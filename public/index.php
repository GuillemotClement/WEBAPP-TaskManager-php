<?php

const BASE_PATH = __DIR__ . "/../";

require_once BASE_PATH."src/utils/functions.php";




// ROUTING
$path = $_SERVER["REQUEST_URI"];

switch($path){
  case ("/"):
    requireFile("homepage");
    break;
  case ("/register"):
    requireFile("register");
    break;
  case ("/login"):
    requireFile("login");
    break;
  default:
    requireFile("error");
}
