<?php
require_once BASE_PATH . "src/partials/head.php";
require_once BASE_PATH . "src/utils/pdo.php";

$taskId = $_GET["taskId"] ?? "";
p($taskId);
$sql = "SELECT * FROM task WHERE id = :taskId";
$vars = [
  ":taskId" => $taskId
];

$stmt = $pdo->prepare($sql);
$stmt->execute($vars);
$task = $stmt->fetchObject();

$sql = "SELECT * FROM status";
$stmt = $pdo->query($sql);
$statusList = $stmt->fetchAll();


$title = "";
$content = "";
$status = "";


if($_SERVER["REQUEST_METHOD"] === "POST"){
  $data = $_POST;

  $errors = [];

  $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "";
  $content = filter_var($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "";
  $status = $_POST["statu"] ?? "";

  if(!$title){
    $errors["title"] = ERROR_MISSING_VALUE;
  }

  if(!$content){
    $errors["content"] = ERROR_MISSING_VALUE;
  }

  if(empty($errors)){
    $dateUpdate = date("Y-m-d H:i:s");

    $sql = "UPDATE task SET title = :title, content = :content, status = :status, updated_at = :updatedAt WHERE id = :taskId";
    $vars = [
      ":title" => $title,
      ":content" => $content,
      ":status" => $status,
      ":updatedAt" => $dateUpdate,
      ":taskId" => (int)$taskId,
    ];

    try{
      $stmt = $pdo->prepare($sql);
      $stmt->execute($vars);
      header("Location: /");
    }catch(PDOException $e){
      echo $e->getMessage();
    }


  }

  $errors["submit"] = ERROR_FAILED_CREATED;
}


?>

<form action="/updateTask" method="POST">
  <div class="mb-3">
    <label for="title" class="form-label">Nom</label>
    <input type="text" name="title" id="title" class="form-text" value="<?= $task->title ?>">
  </div>
  <div class="mb-3">
    <label for="content">Description</label>
    <textarea id="content" name="content" class="form-control"><?= $task->content ?? "" ?></textarea>
  </div>
  <div class="mb-3">
    <select name="status" id="status">
      <option value="0" disabled>Choix</option>
      <?php foreach ($statusList as $status): ?>
        <option value="<?= $status["id"]?>" ><?= $status["title"]?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <a href="/">Retour</a>
    <button type="submit">Update</button>
  </div>
</form>
