<?php
  include_once('./Views/TournamentView.php');
  include_once('./Models/TournamentModel.php');

  class TournamentController {
    private $view;
    private $model;

    public function __construct() {
      $this->view = new TournamentView();
      $this->model = new TournamentModel();
    }
    public function showTournament() {
      $this->view->showTournament();
    }
  }
?>
