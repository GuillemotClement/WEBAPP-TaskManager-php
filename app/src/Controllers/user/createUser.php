<?php

use Root\App\Core\Database;

const ERROR_REQUIRE_VALUE = "Une valeur est attendue";
const ERROR_TOO_SHORT = "La valeur est trop courte";
const ERROR_INVALID_VALUE = "La valeur est invalide";
const ERROR_FAILED_CONFIRMATION = "La confirmation a echouer";

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $inputData = $_REQUEST;

  $errors = [];

  $username = filter_var($inputData["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "";
  $email = filter_var($inputData["email"], FILTER_SANITIZE_EMAIL)?? "";
  $image = $inputData["image"] ?? "https://randomuser.me/api/portraits/lego/1.jpg";
  $password = $inputData["password"] ?? "";
  $confirmPassword = $inputData["confirmPassword"] ?? "";

  if(!$username){
    $errors["username"] = ERROR_REQUIRE_VALUE;
  }else if(strlen($username) < 2){
    $errors["username"] = ERROR_TOO_SHORT;
  }

  if(!$email){
    $errors["email"] = ERROR_REQUIRE_VALUE;
  }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors["email"] = ERROR_INVALID_VALUE;
  }

  if(!$password){
    $errors["password"] = ERROR_REQUIRE_VALUE;
  }else if(strlen($password) < 6){
    $errors["password"] = ERROR_TOO_SHORT;
  }

  if(!$confirmPassword){
    $errors["confirmPassword"] = ERROR_REQUIRE_VALUE;
  }else if($confirmPassword !== $password){
    $errors["confirmPassword"] = ERROR_FAILED_CONFIRMATION;
  }

  if(count($errors) === 0){

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, image) VALUES (:username, :email, :password, :image) RETURNING *";
    $vars = [
      ":username" => $username,
      ":email" => $email,
      ":password" => $password,
      ":image" => $image
    ];

    $db = new Database();
    $stmt = $db->pdo->prepare($sql);
    $user = $stmt->execute($vars);

    header("Location: /");
  }
  $data["errors"] = $errors;
  $data["inputData"] = $inputData;
}

$data["title"] = "Inscription";

renderViewDeux("user/createUser", $data);