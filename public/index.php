<?php
  session_start();
const BASE_PATH = __DIR__ . "/../";
require_once BASE_PATH."src/utils/functions.php";

p($_SESSION);

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
  case ("/logout"):
    requireFile("logout");
    break;
  case ("/tasks/createTask"):
    requireFile("tasks/createTask");
    break;
  case ("/tasks/listTask"):
    requireFile("tasks/listTask");
    break;
  default:
    requireFile("error");
}
