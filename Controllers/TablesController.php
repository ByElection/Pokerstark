<?php
  include_once('./Views/TablesView.php');
  include_once('./Models/JugadoresModel.php');
  include_once('./Models/MesasModel.php');
  include_once('./Models/CiegasModel.php');
  include_once('LoginController.php');

  class TablesController {
    private $check;
    private $view;
    private $modeljugadores;
    private $modelmesas;
    private $modelciegas;

    public function __construct() {
      $this->check = new LoginController();
      $this->view = new TablesView();
      $this->modeljugadores = new JugadoresModel();
      $this->modelmesas = new MesasModel();
      $this->modelciegas = new CiegasModel();
    }
    public function showTables() {
      $admin=$this->check->checkAdmin();
      $mesas = $this->modelmesas->getMesas();
	    $ciegas = $this->modelciegas->getCiegas();
	    $jugadores = $this->modeljugadores->getJugadores();
      $this->view->showTables($admin,$mesas,$ciegas,$jugadores);
    }
    public function showTablesFilter(){
      $admin=$this->check->checkAdmin();
      $filtraciegas = $_POST['filtraciegas'];
      $mesas = $this->modelmesas->getMesas();
	    $ciegas = $this->modelciegas->getCiegas();
	    $jugadores = $this->modeljugadores->getJugadores();
      if ($filtraciegas == "TODAS") {
        $this->view->showTables($admin,$mesas,$ciegas,$jugadores);
      }else {
        $filtraciegas = $this->modelciegas->getCiegasById($filtraciegas);
        $this->view->showTables($admin,$mesas,$ciegas,$jugadores,$filtraciegas);
      }
    }
  }
?>
