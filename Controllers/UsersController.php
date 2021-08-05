<?php
include_once('./Views/UsersView.php');
include_once('./Models/UsuariosModel.php');
include_once('LoginController.php');

class UsersController {
  private $view;
  private $modelusuarios;
  private $check;

  public function __construct(){
    $this->view = new UsersView();
    $this->modelusuarios = new UsuariosModel();
    $this->check = new LoginController();
  }
  public function showUsers() {
    session_start();
    $esta=$this->check->logeado();
    $admin=$this->check->checkAdmin();
    $users=$this->modelusuarios->getUsers();
    $this->view->showRanking($admin,$esta,$users);
  }
  public function setAdmin($user){
    $this->modelusuarios->setAdmin($user[":username"]);
    header("Location: " . USERS);
  }
  public function deletUser($user){
    $this->modelusuarios->deletUser($user[":username"]);
    header("Location: " . USERS);
  }
}
?>
