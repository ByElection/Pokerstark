<?php
require_once "./Models/ModelLogin.php";
require_once "./Views/ViewLogin.php";

class ControllerLogin {

    private $model;
    private $view;

	function __construct(){
        $this->model = new ModelLogin();
        $this->view = new ViewLogin();
    }

    public function IniciarSesion(){
        $password = $_POST['pass'];

        $usuario = $this->model->GetPassword($_POST['user']);

        if (isset($usuario) && $usuario != null && password_verify($password, $usuario->password)){
            session_start();
            $_SESSION['user'] = $usuario->email;
            $_SESSION['userId'] = $usuario->id;
            header("Location: " . URL_PLAYER);
        }else{
            header("Location: " . URL_LOGIN);
        }
       // header("Location: " . BASE_URL);
    }

    public function Login(){
        $this->view->DisplayLogin();
    }

    public function Logout(){
        session_start();
        session_destroy();
        header("Location: " . URL_LOGIN);
    }


}


?>
