<?php
requireHeader();


$errorUsername = $errors["username"] ?? "";
$errorPassword = $errors["password"] ?? "";
$username = $inputData["username"] ?? "";
?>
  <main class="container">
    <h1><?= $title ?></h1>
    <form action="/login" method="post">
      <div class="">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $username ? htmlspecialchars($username) : ""?>" required>
        <?php if($errorUsername): ?>
          <p><?= $errorUsername ?></p>
        <?php endif; ?>
      </div>

      <div class="">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
        <?php if($errorPassword): ?>
          <p><?= $errorPassword?></p>
        <?php endif; ?>
      </div>

      <div class="">
        <a href="/">Retour</a>
        <button type="submit">Connexion</button>
      </div>
    </form>
  </main>
<?php
requireFooter();