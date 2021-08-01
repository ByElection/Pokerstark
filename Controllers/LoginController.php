<?php
include_once('./Views/LoginView.php');
include_once('./Models/UsuariosModel.php');


class LoginController {

    private $view;
    private $modelusuarios;

    public function __construct() {
      $this->view = new LoginView();
      $this->modelusuarios = new UsuariosModel();
    }


    public function logeado() {

        if(isset($_SESSION['id_usuario'])){
            return true;
        }
        else {
          return false;
        }

      }
    public function verifyUser() {
      $password = $_POST['password'];
      $usuario = $this->modelusuarios->getUserByUsername($_POST['username']);

       if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
           session_start();
           $_SESSION['username'] = $usuario->usuario;
           $_SESSION['id_usuario'] = $usuario->id_usuario;
          if ($usuario->admin!=0) {
            $_SESSION['admin'] = 1;
            header("Location: " . ADMIN);
          }else{
            header("Location: " . PROFILE);
           }
       }else {
           header("Location: " . LOGIN . "/userpass");
       }
    }

      public function checkLogIn(){
              session_start();

              if(!isset($_SESSION['id_usuario'])){
                  header("Location: " . LOGIN);
                  session_destroy();
              }

              if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
                  header("Location: " . LOGIN);
                  session_destroy();
              }
              $_SESSION['LAST_ACTIVITY'] = time();
          }
    public function logout() {
      session_start();
      session_destroy();
      header("Location: " . LOGIN);
    }
    public function showLogin($error=null) {
        session_start();
        if (isset($_SESSION['id_usuario']) && isset($_SESSION['admin'])) {
          header("Location: " . ADMIN);
        }
        elseif (isset($_SESSION['id_usuario'])) {
          header("Location: " . PROFILE);
        }
        else {
          $admin=$this->checkAdmin();
          $this->view->showLogin($admin,$error);
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
