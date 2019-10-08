<?php
include_once('./Views/RegisterView.php');
include_once('./Models/RegisterModel.php');

class RegisterController {
    private $view;
    private $model;

    public function __construct() {
      $this->view = new RegisterView();
      $this->model = new RegisterModel();

    }

    public function showRegister() {
        $this->view->showRegister();
    }
}
 ?>
