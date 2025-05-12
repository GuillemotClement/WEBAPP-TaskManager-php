<?php 
require_once BASE_PATH . "src/partials/head.php";

const VALUE_IS_REQUIRED = "Une valeur est attendue";
const VALUE_IS_TOO_SHORT = "La valeur est trop courte";
const VALUE_NOT_VALID = "La valeur est invalide";
const VALUE_IS_DIFFERENT = "La confirmation a echouer";

$username = "";
$email = "";
$password = "";
$confirmPassword = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $data = $_POST;

    $username = filter_var($data["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? "";
    $email = filter_var($data["email"], FILTER_SANITIZE_EMAIL) ?? "";
    $password = $data["password"] ?? "";
    $confirmPassword = $data["confirmPassword"] ?? "";

    $errors = [];

    if(!$username){
        $errors["username"] = VALUE_IS_REQUIRED;
    }else if(strlen($username) < 2){
        $errors["username"] = VALUE_IS_TOO_SHORT;
    }

    if(!$email){
        $errors["email"] = VALUE_IS_REQUIRED;
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors["email"] = VALUE_NOT_VALID;
    }

    if(!$password){
        $errors["password"] = VALUE_IS_REQUIRED;
    }else if(strlen($password) < 8){
        $errors["password"] = VALUE_IS_TOO_SHORT;
    }

    if(!$confirmPassword){
        $errors["confirmPassword"] = VALUE_IS_REQUIRED;
    }else if($confirmPassword !== $password){
        $errors["confirmPassword"] = VALUE_IS_DIFFERENT;
    }

    if(count($errors) !== 0){
        echo "top";
        // on viens hasher le mdp 
        // on viens envoyer les donnees en BDD
        // on ajoute dans la session
        // on redirige vers accueil
    }

    p($errors);
}
?>

<form action="/register" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-text" value="<?= $username ? $username : "" ?>">
        <?php if(isset($errors["username"])): ?>
        <p><?= $errors["username"]?></p>
        <?php endif ?>
    </div>

    <div class="mb-3">
        <label for="email"  class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-text" value="<?= $email ? $email : "" ?>">
        <?php if(isset($errors["email"])): ?>
        <p><?= $errors["email"]?></p>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-text">
        <?php if(isset($errors["password"])): ?>
        <p><?= $errors["password"]?></p>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirmation du mot de passe</label>
        <input type="password" name="confirmPassword" id="confirmPassword" class="form-text">
        <?php if(isset($errors["confirmPassword"])): ?>
        <p><?= $errors["confirmPassword"]?></p>
        <?php endif ?>
    </div>
    <div class="mb-3">
        <a href="/login">J'ai deja un compte</a>
    </div>
    <div class="mb-3">
        <a href="/" class="btn btn-neutral">Retour</a>
        <button type="submit">Inscription</button>
    </div>
</form>