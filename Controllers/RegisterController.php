<?php
include_once('./Views/RegisterView.php');
include_once('./Models/UsuariosModel.php');
include_once('LoginController.php');

class RegisterController {
  private $view;
  private $modelusuarios;
  private $check;

  public function __construct() {
    $this->view = new RegisterView();
    $this->modelusuarios = new UsuariosModel();
    $this->check = new LoginController();
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
      $usuario = $this->modelusuarios->getUserByUsername($user);
      session_start();
      $_SESSION['username'] = $usuario->username;
      $_SESSION['id_usuario'] = $usuario->id_usuario;
      header("Location: " . PROFILE);
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
