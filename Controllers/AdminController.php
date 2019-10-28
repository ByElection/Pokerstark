<?php
include_once('./Views/AdminView.php');
include_once('./Models/LoginModel.php');

class AdminController {
  private $view;
  private $model;

  public function __construct() {
    $this->view = new AdminView();
    $this->model = new LoginModel();
  }


  public function showAdmin() {
    session_start();
    $this->view->showAdmin();
  }
}
  ?>
