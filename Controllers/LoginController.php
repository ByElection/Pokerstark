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
      $password = $_POST['pass'];

       $usuario = $this->model->GetPassword($_POST['user']);

       if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
           session_start();
           $_SESSION['user'] = $usuario->usuario;
           $_SESSION['userId'] = $usuario->id_usuario;
           header("Location: " . URL_PROFILE);
       }else{
           header("Location: " . URL_PROFILE  ); //GUARDA ACA PARA PROBAR
       }

    }

    public function logout() {
      session_start();
      session_destroy();
      header('Location: ' . URL_LOGIN);
    }
    public function showLogin() {
        $this->view->showLogin();
    }
}
?>
