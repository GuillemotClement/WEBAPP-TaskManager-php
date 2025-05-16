<?php

use Root\App\Core\Database;

$userId = $_SESSION["userId"] ?? "";

if($userId){
  $sql = "SELECT * FROM users WHERE id = :userId";
  $vars = [
    ":userId" => $userId
  ];

  $db = new Database();
  $stmt = $db->pdo->prepare($sql);
  $stmt->execute($vars);
  $user = $stmt->fetchObject();
}
$pictureUser = $user->image ?? "";
?>
<body>
  <header class="header">
    <a href="/" class="header__logo">
      <i class="fa-solid fa-list-check header__logo--image"></i>
      <span class="header__logo--title">TaskManager</span>
    </a>
    <ul class="menu-nav">
      <li><a href="/">Accueil</a></li>
    </ul>
    <ul class="menu-nav">
      <?php if($userId): ?>
        <li><a href="/"><img src="<?= $pictureUser ?>" alt="profil" height="50" width="50" class="profilPicture"></a></li>
        <li><a href="/logout">Deconnexion</a></li>
      <?php else: ?>
      <li><a href="/register">Inscription</a></li>
      <li><a href="/login">Connexion</a></li>
      <?php endif ?>
    </ul>
  </header>