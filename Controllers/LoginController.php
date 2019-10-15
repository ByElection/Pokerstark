<?php
include_once('./Views/LoginView.php');
include_once('./Models/LoginModel.php');
include_once('./helpers/auth.helper.php');

class LoginController {

    private $view;
    private $model;
    private $authHelper;

    public function __construct() {
        $this->view = new LoginView();
        $this->model = new LoginModel();
        $this->authHelper = new AuthHelper();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function verifyUser() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model->getByUsername($username);

        // encontró un user con el username que mandó, y tiene la misma contraseña
        if (!empty($user) && password_verify($password, $user->password)) {
            $this->authHelper->login($user);

            header('Location: ver');
        } else {
            $this->view->showLogin("Login incorrecto");
        }
    }

    public function logout() {
        $this->authHelper->logout();
        header('Location: ' . LOGIN);
    }
}
