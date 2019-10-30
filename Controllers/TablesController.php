<?php
  include_once('./Views/TablesView.php');
  include_once('./Models/TablesModel.php');

  class TablesController {
    private $view;
    private $model;

    public function __construct() {
      $this->view = new TablesView();
      $this->model = new TablesModel();
    }
    public function showTables() {
      $admin=$this->checkAdmin();
      $mesas = $this->model->getMesas();
	    $ciegas = $this->model->getCiegas();
	    $jugadores = $this->model->getJugadores();
      $this->view->showTables($admin,$mesas,$ciegas,$jugadores);
    }
    public function showTablesFilter(){
      $admin=$this->checkAdmin();
      $filtraciegas = $_POST['filtraciegas'];
      $mesas = $this->model->getMesas();
	    $ciegas = $this->model->getCiegas();
	    $jugadores = $this->model->getJugadores();
      if ($filtraciegas == "TODAS") {
        $this->view->showTables($admin,$mesas,$ciegas,$jugadores);
      }else {
        $filtraciegas = $this->model->getCiegasX($filtraciegas);
        $this->view->showTables($admin,$mesas,$ciegas,$jugadores,$filtraciegas);
      }
    }
    public function checkAdmin() {
      session_start();
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
