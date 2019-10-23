<?php
  include_once('./Views/TournamentView.php');
  include_once('./Models/TournamentModel.php');
  include_once('LoginController.php');

  class TournamentController {
    private $view;
    private $model;
    private $check;

    public function __construct() {
      $this->view = new TournamentView();
      $this->model = new TournamentModel();
      $this->check = new LoginController();
    }
    public function showTournament() {
      $this->check->checkLogIn();
      $this->view->showTournament();
    }
  }
?>
