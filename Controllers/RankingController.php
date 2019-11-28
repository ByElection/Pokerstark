<?php
include_once('./Views/RankingView.php');
include_once('./Models/UsuariosModel.php');
include_once('LoginController.php');

class RankingController {
  private $view;
  private $modelusuarios;
  private $check;

  public function __construct() {
    $this->view = new RankingView();
    $this->modelusuarios = new UsuariosModel();
    $this->check = new LoginController();
  }
  public function showRanking() {
    session_start();
    $esta=$this->check->logeado();
    $admin=$this->check->checkAdmin();
    $users=$this->modelusuarios->getUsersRanking();
    $this->view->showRanking($admin,$esta,$users);
  }
}
?>
