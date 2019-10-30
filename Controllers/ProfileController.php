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
    $admin=$this->checkAdmin();
    $usuario = $this->model->getUser($_SESSION['id_usuario']);
    $this->view->showProfile($admin,$usuario->nombre.' '.$usuario->apellido,$usuario->pais,$usuario->fichas);
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
