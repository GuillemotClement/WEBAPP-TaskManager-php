<?php
session_start();

const BASE_PATH = __DIR__ . "/../";
require_once BASE_PATH."src/utils/functions.php";

// ROUTING
$uri = $_SERVER["REQUEST_URI"];
$path = parse_url($uri)["path"];

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
  case ("/deleteTask"):
    requireFile("tasks/deleteTask");
    break;
  case ("/updateTask"):
    requireFile("tasks/updateTask");
    break;

  default:
    requireFile("error");
}
