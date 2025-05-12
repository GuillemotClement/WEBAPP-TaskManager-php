<?php 
require_once BASE_PATH . "src/partials/head.php";
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