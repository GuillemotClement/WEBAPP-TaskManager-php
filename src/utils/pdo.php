<?php

// PDO
$dsn = "pgsql:host=localhost;port=5432;dbname=TaskManager;";
$usr = "postgres";
$pwd = "postgres";

try{
  $pdo = new PDO($dsn, $usr, $pwd, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    error_log("Connection is OK");
}catch(PDOException $e){
  error_log("Failed to connect to Db : " . $e->getMessage());
}