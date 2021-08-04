<?php
include_once('./Views/AdminView.php');
include_once('./Models/JugadoresModel.php');
include_once('./Models/MesasModel.php');
include_once('./Models/CiegasModel.php');
include_once('./IA/Mazo.php');

class AdminController {
  private $view;
  private $modeljugadores;
  private $modelmesas;
  private $modelciegas;
	private $mazo;

  public function __construct() {
    $this->view = new AdminView();
    $this->modeljugadores = new JugadoresModel();
    $this->modelmesas = new MesasModel();
    $this->modelciegas = new CiegasModel();
		$this->mazo = new Mazo();
  }

  public function checkLogIn(){
          session_start();
          if(!isset($_SESSION['id_usuario']) || ($_SESSION['admin'])==0){
              header("Location: " . LOGIN);
              session_destroy();
          }

          if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
              header("Location: " . LOGIN);
              session_destroy();
          }
          $_SESSION['LAST_ACTIVITY'] = time();
      }
  public function mesasAdmin() {
    $this->checkLogIn();
    $admin=$this->checkAdmin();
    $mesas = $this->modelmesas->getMesas();
    $ciegas = $this->modelciegas->getCiegas();
    $jugadores = $this->modeljugadores->getJugadores();
    $this->view->mesasAdmin($admin,$mesas,$ciegas,$jugadores);
  }
  public function ciegasAdmin() {
    $this->checkLogIn();
    $admin=$this->checkAdmin();
    $ciegas = $this->modelciegas->getCiegas();
    $this->view->ciegasAdmin($admin,$ciegas);
  }
  public function addMesa() {
    $this->checkLogIn();
    $ciegas = $_POST['ciegas'];
    $sillas = $_POST['sillas'];
    $this->modelmesas->addMesa($ciegas,$sillas,$this->mazo->generarMazo());
    header("Location: " . ADMIN);
  }
  public function addCiega() {
    $this->checkLogIn();
    $ciega_chica = $_POST['ciega_chica'];
    $ciega_grande = $ciega_chica * 2;
    $this->modelciegas->addCiega($ciega_chica,$ciega_grande);
    header("Location: " . CIEGASADMIN);
  }
  public function deletMesa($id) {
    $this->checkLogIn();
    $this->modeljugadores->deletJugadoresByMesa($id[":ID"]);
    $this->modelmesas->deletMesaByMesa($id[":ID"]);
    header("Location: " . ADMIN);
  }
  public function deletCiega($id) {
    $this->checkLogIn();
    $mesas=$this->modelmesas->getMesasByCiega($id[":ID"]);
    foreach ($mesas as $mesa) {
      $this->modeljugadores->deletJugadoresByMesa($mesa->id_mesa);
    }
    $this->modelmesas->deletMesaByCiega($id[":ID"]);
    $this->modelciegas->deletCiega($id[":ID"]);
    header("Location: " . CIEGASADMIN);
  }
  public function editMesa($id) {
    $this->checkLogIn();
    $ciegas = $_POST['ciegas'];
    $sillas = $_POST['sillas'];
    $this->modelmesas->editMesa($id[":ID"],$ciegas,$sillas);
    header("Location: " . ADMIN);
  }
  public function editCiega($id) {
    $this->checkLogIn();
    $ciega_chica = $_POST['ciega_chica'];
    $ciega_grande = strval($ciega_chica * 2);
    $this->modelciegas->editCiega($id[":ID"],$ciega_chica,$ciega_grande);
    header("Location: " . CIEGASADMIN);
  }
  public function getMesa($id) {
    $this->checkLogIn();
    $admin=$this->checkAdmin();
    $mesa = $this->modelmesas->getMesa($id[":ID"]);
    $mesas = $this->modelmesas->getMesas();
    $ciegas = $this->modelciegas->getCiegas();
    $jugadores = $this->modeljugadores->getJugadores();
    $this->view->mesasAdmin($admin,$mesas,$ciegas,$jugadores,$mesa);
  }
  public function getCiega($id) {
    $this->checkLogIn();
    $admin=$this->checkAdmin();
    $ciega = $this->modelciegas->getCiegasById($id[":ID"]);
    $ciegas = $this->modelciegas->getCiegas();
    $this->view->ciegasAdmin($admin,$ciegas,$ciega);
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
