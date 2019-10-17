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

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
//    if (empty($user)) {
//      array_push($errors, "Username is required");
//    }else
//    if (empty($nombre)) {
//      array_push($errors, "Nombre is required");
//    }else
//    if (empty($apellido)) {
//      array_push($errors, "Apellido is required");
//    }else
//    if (empty($pais)) {
//      array_push($errors, "Pais is required");
//    }else
//    if (empty($password_1)) {
//      array_push($errors, "Password is required");
//    }else
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
    else{
      $this->model->addUsuario($user,$password_1,$nombre,$apellido,$pais);
    }
  }
}
?>
