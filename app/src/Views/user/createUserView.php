<?php
requireHeader();
p($inputData);
p($errors);

$errorUsername = $errors["username"] ?? "";
$errorEmail = $errors["email"] ?? "";
$errorImage = $errors["image"] ?? "";
$errorPassword = $errors["password"] ?? "";
$errorConfirmPassword = $errors["confirmPassword"] ?? "";

?>
  <main class="container">
    <h1><?= $title ?></h1>
    <form action="/register" method="post">
      <div class="">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $inputData["username"] ? htmlspecialchars($inputData["username"]) : ""?>" required>
        <?php if($errorUsername): ?>
          <p><?= $errorUsername ?></p>
        <?php endif; ?>
      </div>
      <div class="">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= $inputData["email"] ? htmlspecialchars($inputData["email"]) : ""?>" required>
        <?php if($errorEmail): ?>
          <p><?= $errorEmail ?></p>
        <?php endif; ?>
      </div>
      <div class="">
        <label for="image">Image de profil</label>
        <input type="text" name="image" id="image" value="<?= $inputData["image"] ? htmlspecialchars($inputData["image"]) : ""?>">
        <?php if($errorImage): ?>
          <p><?= $errorImage ?></p>
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
        <label for="confirmPassword">Confirmation du mot de passe</label>
        <input type="password" name="confirmPassword" id="confirmPassword">
        <?php if($errorConfirmPassword): ?>
          <p><?= $errorConfirmPassword ?></p>
        <?php endif; ?>
      </div>
      <div class="">
        <a href="/">Retour</a>
        <button type="submit">Inscription</button>
      </div>
    </form>
  </main>
<?php
requireFooter();