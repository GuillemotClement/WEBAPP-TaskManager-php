<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use Root\App\Core\Router;


echo "Bonjour";

$routeur = new Router();

$routeur->echoRouter();