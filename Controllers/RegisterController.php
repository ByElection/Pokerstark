<?php
include_once('./Views/RegisterView.php');
include_once('./Models/UsuariosModel.php');

class RegisterController {
  private $view;
  private $modelusuarios;

  public function __construct() {
    $this->view = new RegisterView();
    $this->modelusuarios = new UsuariosModel();
  }

  public function showRegister($error=null) {
    session_start();
    if (isset($_SESSION['id_usuario'])) {
      header("Location: " . PROFILE);
    }
    else {
      $admin=$this->checkAdmin();
      $this->view->showRegister($admin,$error);
    }

  }
  public function userRegister(){
    $user = $_POST['username'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $pais = $_POST['pais'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $username=$this->modelusuarios->getUserByUsername($user);
    if (isset($username)&& $username->username === $user) {
      header("Location: " . REGISTER . "/username");
    }elseif ($password_1 != $password_2) {
      header("Location: " . REGISTER . "/password");
    }else{
      $this->modelusuarios->addUsuario($user,$password_1,$nombre,$apellido,$pais);
      header("Location: " . LOGIN);
    }
  }
  public function checkAdmin() {
    if (isset($_SESSION['admin'])){
      if ($_SESSION['admin']!=0) {
        return true;
      }
      else {
        return false;
      }
    }
  }
}
?>
