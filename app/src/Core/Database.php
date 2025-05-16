<?php

namespace Root\App\Core;

use PDO;
use PDOException;

class Database
{
  public $pdo;

  public function __construct()
  {
    $dsn = "pgsql:host=postgres;port=5432;dbname=TaskManager;";
    $user = "postgres";
    $pwd = "postgres";

    try{
      $this->pdo = new PDO($dsn, $user, $pwd, [
        PDO::ERRMODE_EXCEPTION => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
    }catch(PDOException $e){
      echo "Failed connected to DB : ". $e->getMessage();
    }

  }
}