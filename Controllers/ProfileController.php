<?php
include_once('./Views/ProfileView.php');
include_once('./Models/ProfileModel.php');
include_once('LoginController.php');

class ProfileController {
  private $view;
  private $model;
  private $check;

  public function __construct() {
    $this->view = new ProfileView();
    $this->model = new ProfileModel();
    $this->check = new LoginController();
  }




  public function showProfile() {
    $this->check->checkLogIn();
    $usuario = $this->model->getUser($_SESSION['id_usuario']);
    $this->view->showProfile($usuario->nombre.' '.$usuario->apellido,$usuario->pais,$usuario->fichas);
  }


}
?>
