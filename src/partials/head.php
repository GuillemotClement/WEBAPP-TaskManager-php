<?php

$userId = $_SESSION["userId"] ?? "";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>TaskManager</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
  <script src="./assets/javascript/index.js" defer type="module"></script>
  <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
</head>
<body>
  <header class="header">
    <div class="">
      <a href="/" class="">TaskManager</a>
    </div>
    <div class="">
      <ul class="menu_action">
        <li class="nav-item"><a href="/" class="nav-link">Accueil</a></li>
        <?php if(!empty($userId)): ?>
          <li><a href="/tasks/listTask">Mes taches</a></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="">
      <ul class="menu__nav">
        <?php if(!$userId): ?>
          <li class="nav-item"><a href="/register" class="nav-link">Inscription<a></li>
          <li class="nav-item"><a href="/login" class="nav-link">Connexion</a></li>
        <?php else: ?>
        <li class="nav-item"><a href="/logout" class="nav-link">Deconnexion</a></li>
        <li>
          <a href="/" ><img src="https://randomuser.me/api/portraits/lego/1.jpg" alt="" class="header__picture" height="25" width="25"></a>
        </li>
          
        <?php endif; ?>
      </ul>
    </div>
      
  </header>
