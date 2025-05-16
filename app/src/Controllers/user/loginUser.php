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
    if(!$user->username){
      $errors["credential"] = ERROR_CREDENTIAL_INVALID;
    }

    if(password_verify($password, $user->password)){

      $_SESSION["userId"] = $user->id;
      $_SESSION["username"] = $user->username;
      $_SESSION["email"] = $user->email;
      $_SESSION["image"] = $user->image;
      $_SESSION["role"] = $user->role_id;

      header("Location: /");

    }

    $errors["credential"] = ERROR_CREDENTIAL_INVALID;

  }
  $data["errors"] = $errors;
  $data["inputData"] = $inputData;
}

$data["title"] = "Inscription";

renderViewDeux("user/loginUser", $data);