<?php
include_once('./Views/RankingView.php');
include_once('./Models/RankingModel.php');
include_once('LoginController.php');

class RankingController {
  private $view;
  private $model;
  private $check;

  public function __construct() {
    $this->view = new RankingView();
    $this->model = new RankingModel();
    $this->check = new LoginController();
  }
  public function showRanking() {
    session_start();
    $esta=$this->check->logeado();
    $admin=$this->checkAdmin();
    $users=$this->model->getUsers();
    $this->view->showRanking($admin,$esta,$users);
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
