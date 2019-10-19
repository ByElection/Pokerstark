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



    public function verifyUser() {
      $password = $_POST['password'];

       $usuario = $this->model->GetPassword($_POST['username']);

       if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
           session_start();
           $_SESSION['username'] = $usuario->usuario;
           $_SESSION['id_usuario'] = $usuario->id_usuario;
           header("Location: " . PROFILE);
       }else{
           header("Location: " . LOGIN); //GUARDA ACA PARA PROBAR
       }

    }

    public function logout() {
      session_start();
      session_destroy();
      header('Location: ' . LOGIN);
    }
    public function showLogin() {
        $this->view->showLogin();
    }
}
?>
