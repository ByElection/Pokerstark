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
  public function userRegister(){
    $user = $_POST['username'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $pais = $_POST['pais'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if ($password_1 != $password_2) {
      echo "las contraseñas son distintas";
    }
    else{
      $this->model->addUsuario($user,$password_1,$nombre,$apellido,$pais);
    }
  }
}
?>
