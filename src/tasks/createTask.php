<?php
require_once BASE_PATH . "src/partials/head.php";
require_once BASE_PATH . "src/utils/pdo.php";

const ERROR_FAILED_CREATED = "Echec de la creation";

$title = "";
$content = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $data = $_POST;

  $title = filter_var($data["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $content = filter_var($data["content"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  $errors = [];

  if(!$title){
    $errors["title"] = ERROR_MISSING_VALUE;
  }

  if(count($errors) === 0){
    $sql = "INSERT INTO task (title, content, status, user_id) VALUES (:title, :content, :status, :user_id)";
    $vars = [
      ":title" => $title,
      ":content" => $content,
      ":status" => "ToDo",
      ":user_id" => $_SESSION["userId"]
    ];

    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute($vars);

    if($success && $stmt->rowCount() === 1){
      $lastId = $pdo->lastInsertId();
      header("Location: /");
    }

    $errors["soumission"] = ERROR_FAILED_CREATED;
  }
}


?>

<form action="/tasks/createTask" method="POST">
  <div class="mb-3">
    <label for="title" class="form-label">Nom</label>
    <input type="text" name="title" id="title" class="form-text">
  </div>
  <div class="mb-3">
    <label for="content">Description</label>
    <textarea id="content" name="content" class="form-control"></textarea>
  </div>
  <div class="mb-3">
    <a href="/">Retour</a>
    <button type="submit">Creer</button>
  </div>
</form>