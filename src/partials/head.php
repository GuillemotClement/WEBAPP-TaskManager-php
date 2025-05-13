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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
</head>
<body>
  <header class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a href="/" class="navbar-brand">TaskManager</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="/" class="nav-link">Accueil</a></li>
          <?php if(!$userId): ?>
            <li class="nav-item"><a href="/register" class="nav-link">Inscription<a></li>
            <li class="nav-item"><a href="/login" class="nav-link">Connexion</a></li>
          <?php else: ?>
          <li class="nav-item"><a href="/logout" class="nav-link">Deconnexion</a></li>
          <li>
            <a href="/"><img src="https://randomuser.me/api/portraits/lego/1.jpg" alt="" class="rounded"></a>
          </li>
            <li><a href="/tasks/listTask">Mes taches</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </header>
