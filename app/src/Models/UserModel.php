<?php

namespace Root\App\Models;

use Root\App\Core\Database;

class UserModel extends Database
{
  public function createUser(array $data){
    $sql = "INSERT INTO users (username) VALUES (:username) RETURNING *";
    $vars = [
      ":username" => $data["username"],
    ];

    $stmt = $this->pdo->prepare($sql);
    $user = $stmt->execute($vars);

    return $user;
  }
}