<?php

use Root\App\Core\Database;

const ERROR_CREDENTIAL_INVALID = "Credential invalide";

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $inputData = $_REQUEST;

  $errors = [];

  $username = filter_var($inputData["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "";
  $password = $inputData["password"] ?? "";

  if(!$username){
    $errors["username"] = ERROR_REQUIRE_VALUE;
  }else if(strlen($username) < 2){
    $errors["username"] = ERROR_TOO_SHORT;
  }

  if(!$password){
    $errors["password"] = ERROR_REQUIRE_VALUE;
  }else if(strlen($password) < 6){
    $errors["password"] = ERROR_TOO_SHORT;
  }


  if(count($errors) === 0){

    $sql = "SELECT * FROM users WHERE username = :username";

    $vars = [
      ":username" => $username,
    ];

    $db = new Database();
    $stmt = $db->pdo->prepare($sql);
    $stmt->execute($vars);
    $user = $stmt->fetchObject();
p($user);
    p($password);
    p($user->password);


    if (!$user || !password_verify($password, $user->password)) {
      p("pas bien ");
      die;
      $errors["credential"] = ERROR_CREDENTIAL_INVALID;
    } else {
      $_SESSION["userId"] = $user->id;
      header("Location: /");
      exit;

    }
  }
  $data["errors"] = $errors;
  $data["inputData"] = $inputData;
}

$data["title"] = "Connexion";

renderViewDeux("user/loginUser", $data);