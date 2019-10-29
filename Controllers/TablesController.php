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
      $mesas = $this->model->getMesas();
	    $ciegas = $this->model->getCiegas();
	    $jugadores = $this->model->getJugadores();
      $this->view->showTables($mesas,$ciegas,$jugadores);
    }
    public function showTablesFilter(){
      $filtraciegas = $_POST['filtraciegas'];
      $mesas = $this->model->getMesas();
	    $ciegas = $this->model->getCiegas();
	    $jugadores = $this->model->getJugadores();
      if ($filtraciegas == "TODAS") {
        $this->view->showTables($mesas,$ciegas,$jugadores);
      }else {
        $filtraciegas = $this->model->getCiegasX($filtraciegas);
        $this->view->showTables($mesas,$ciegas,$jugadores,$filtraciegas);
      }
    }
  }
?>
