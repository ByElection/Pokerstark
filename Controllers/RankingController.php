<?php
include_once('./Views/RankingView.php');
include_once('./Models/RankingModel.php');

class RankingController {
  private $view;
  private $model;

  public function __construct() {
    $this->view = new RankingView();
    $this->model = new RankingModel();
  }
  public function showRanking() {
    $this->view->showRanking();
  }
}
?>
