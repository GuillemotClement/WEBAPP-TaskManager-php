<?php 
ob_start();  // Commence le tampon de sortie
require_once BASE_PATH . "src/partials/head.php";
require_once BASE_PATH . "src/utils/pdo.php";

const ERROR_MISSING_VALUE = "Une valeur est attendue";
const ERROR_CREDENTIAL = "Identifiant incorrect";

$username = "";
$password = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
  $data = $_POST;

  $username = filter_var($data["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "";
  $password = $data["password"];

  $errors = [];

  if(!$username){
    $errors["username"] = ERROR_MISSING_VALUE;
  }

  if(!$password){
    $errors["password"] = ERROR_MISSING_VALUE;
  }

  if(count($errors) === 0){
    $sql = "SELECT * FROM users WHERE username = :username";

    $vars = [
      ":username" => $username
    ];

    $stmp = $pdo->prepare($sql);
    $stmp->execute($vars);
    $user = $stmp->fetchObject();

    if($username === $user->username){
      if(password_verify($password, $user->password)){
        $_SESSION["userId"] = $user->id;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $user->email;
        $_SESSION["image"] = $user->image;

        header("Location: /");
      }
    }

    $errors["credentials"] = ERROR_CREDENTIAL;
  }
}

?>

<form action="/login" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-text">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-text">
    </div>
    <div class="mb-3">
        <a href="/login">Je n'ai pas encore de compte</a>
    </div>
    <div class="mb-3">
        <a href="/">Retour</a>
        <button type="submit">Connexion</button>
    </div>
</form>