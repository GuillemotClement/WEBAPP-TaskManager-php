<?php
require_once BASE_PATH . "src/partials/head.php";
require_once BASE_PATH . "src/utils/pdo.php";
$userId = $_SESSION["userId"] ?? "";

$sql = "SELECT * FROM task WHERE user_id = :userId AND delete_at IS NULL";
$vars = [
  ":userId" => $userId
];

$stmt = $pdo->prepare($sql);
$stmt->execute($vars);
$tasks = $stmt->fetchAll();
?>

<div class="">
  <ul>
    <?php foreach ($tasks as $task): ?>
      <li class="">
        <h3><?= $task["title"] ?></h3>
        <p><?= $task["content"] ?></p>
        <p><?= $task["status"]?></p>
        <a href="/deleteTask?taskId=<?= $task["id"]?>">Supprimer</a>
        <a href="/updateTask?taskId=<?= $task["id"]?>">Modifier</a>
      </li>
    <?php endforeach; ?>
    <li></li>
  </ul>
</div>
