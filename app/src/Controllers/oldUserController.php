<?php

namespace Root\App\Controllers;

class oldUserController
{
  private $model;
  private $data;
  private $page = "Homepage";
  public function __construct()
  {
    $this->model = new oldUserController();
    $this->data["page"] = $this->page;
  }

  public function createUser(array $data){
    $this->model->createUser($data);

    $this->data["user"] = $data;
    renderView();
  }

}