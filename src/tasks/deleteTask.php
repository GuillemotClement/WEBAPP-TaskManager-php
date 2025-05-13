<?php

require_once BASE_PATH . "src/partials/head.php";
require_once BASE_PATH . "src/utils/pdo.php";

$taskId = $_GET["taskId"] ?? "";
$now = date("Y-m-d H:i:s");

$sql = "UPDATE task SET delete_at = :now WHERE id = :taskId";
$vars = [
  ":now" => $now,
  ":taskId" => $taskId,
];
try{
  $stmt = $pdo->prepare($sql);
  $stmt->execute($vars);
}catch(PDOException $e){
  p($e->getMessage());
}


header("Location : /");