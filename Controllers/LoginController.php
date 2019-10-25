<?php
include_once('./Views/LoginView.php');
include_once('./Models/LoginModel.php');


class LoginController {

    private $view;
    private $model;

    public function __construct() {
        $this->view = new LoginView();
        $this->model = new LoginModel();
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

       $usuario = $this->model->GetPassword($_POST['username']);

       if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
           session_start();
           $_SESSION['username'] = $usuario->usuario;
           $_SESSION['id_usuario'] = $usuario->id_usuario;
           $_SESSION['admin'] = $usuario->admin;
           header("Location: " . PROFILE);
       }else{
           header("Location: " . LOGIN); //GUARDA ACA PARA PROBAR
       }

    }

      public function checkLogIn(){
              session_start();

              if(!isset($_SESSION['id_usuario'])){
                  header("Location: " . LOGIN);
                  die();
              }

              if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
                  header("Location: " . LOGIN);
                  die(); // destruye la sesión, y vuelve al login
              }
              $_SESSION['LAST_ACTIVITY'] = time();
          }
    public function logout() {
      session_start();
      session_destroy();
      header("Location: " . LOGIN);
    }
    public function showLogin() {
        session_start();
        if (isset($_SESSION['id_usuario'])) {
          header("Location: " . PROFILE);
        }
        else {
          $esta=$this->logeado();
          $this->view->showLogin($esta);
        }
    }
    public function checkAdmin() {
      session_start();
      if ($_SESSION['admin']!=0) {
        return true;
      }
      else {
        return false;
      }
    }
}
?>
