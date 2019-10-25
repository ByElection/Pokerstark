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
    $this->view->showRanking($esta);
  }

}
?>
