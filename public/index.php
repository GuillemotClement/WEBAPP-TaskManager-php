<?php

const BASE_PATH = __DIR__ . "/../";

function p(mixed $value): void
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

try{
    $pdo = new PDO("pgsql:host=localhost;port=5432;dbname=TaskManager", "postgres", "postgres", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    error_log("Connexion DB reussie");
}catch(PDOException $e){
    error_log($e->getMessage());
}


$path = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

switch ($path) {
    case "/":
        require_once BASE_PATH . "src/homepage.php";
        break;
    case "/login":
        require_once BASE_PATH . "src/login.php";
        break;
    case "/register":
        require_once BASE_PATH . "src/register.php";
        break;
    default:
        require_once BASE_PATH . "src/error.php";
}
