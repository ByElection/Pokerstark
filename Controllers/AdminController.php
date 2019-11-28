<?php
include_once('./Views/AdminView.php');
include_once('./Models/JugadoresModel.php');
include_once('./Models/MesasModel.php');
include_once('./Models/CiegasModel.php');
include_once('LoginController.php');

class AdminController {
  private $check;
  private $view;
  private $modeljugadores;
  private $modelmesas;
  private $modelciegas;

  public function __construct() {
    $this->check = new LoginController();
    $this->view = new AdminView();
    $this->modeljugadores = new JugadoresModel();
    $this->modelmesas = new MesasModel();
    $this->modelciegas = new CiegasModel();
  }

  public function mesasAdmin() {
    $this->check->checkLogIn();
    $admin=$this->check->checkAdmin();
    $mesas = $this->modelmesas->getMesas();
    $ciegas = $this->modelciegas->getCiegas();
    $jugadores = $this->modeljugadores->getJugadores();
    $this->view->mesasAdmin($admin,$mesas,$ciegas,$jugadores);
  }
  public function ciegasAdmin() {
    $this->check->checkLogIn();
    $this->check->checkAdmin();
    $ciegas = $this->modelciegas->getCiegas();
    $this->view->ciegasAdmin($this->check->checkAdmin(),$ciegas);
  }
  public function addMesa() {
    $this->check->checkLogIn();
    $ciegas = $_POST['ciegas'];
    $sillas = $_POST['sillas'];
    $this->modelmesas->addMesa($ciegas,$sillas);
    header("Location: " . ADMIN);
  }
  public function addCiega() {
    $this->check->checkLogIn();
    $ciega_chica = $_POST['ciega_chica'];
    $ciega_grande = $ciega_chica * 2;
    $this->modelciegas->addCiega($ciega_chica,$ciega_grande);
    header("Location: " . CIEGASADMIN);
  }
  public function deletMesa($id) {
    $this->check->checkLogIn();
    $this->modeljugadores->deletJugadoresByMesa($id[":ID"]);
    $this->modelmesas->deletMesaByMesa($id[":ID"]);
    header("Location: " . ADMIN);
  }
  public function deletCiega($id) {
    $this->check->checkLogIn();
    $mesas=$this->modelmesas->getMesasByCiega($id[":ID"]);
    foreach ($mesas as $mesa) {
      $this->modeljugadores->deletJugadoresByMesa($mesa->id_mesa);
    }
    $this->modelmesas->deletMesaByCiega($id[":ID"]);
    $this->modelciegas->deletCiega($id[":ID"]);
    header("Location: " . CIEGASADMIN);
  }
  public function editMesa($id) {
    $this->check->checkLogIn();
    $ciegas = $_POST['ciegas'];
    $sillas = $_POST['sillas'];
    $this->modelmesas->editMesa($id[":ID"],$ciegas,$sillas);
    header("Location: " . ADMIN);
  }
  public function editCiega($id) {
    $this->check->checkLogIn();
    $ciega_chica = $_POST['ciega_chica'];
    $ciega_grande = strval($ciega_chica * 2);
    $this->modelciegas->editCiega($id[":ID"],$ciega_chica,$ciega_grande);
    header("Location: " . CIEGASADMIN);
  }
  public function getMesa($id) {
    $this->check->checkLogIn();
    $admin=$this->check->checkAdmin();
    $mesa = $this->modelmesas->getMesa($id[":ID"]);
    $mesas = $this->modelmesas->getMesas();
    $ciegas = $this->modelciegas->getCiegas();
    $jugadores = $this->modeljugadores->getJugadores();
    $this->view->mesasAdmin($admin,$mesas,$ciegas,$jugadores,$mesa);
  }
  public function getCiega($id) {
    $this->check->checkLogIn();
    $admin=$this->check->checkAdmin();
    $ciega = $this->modelciegas->getCiegasById($id[":ID"]);
    $ciegas = $this->modelciegas->getCiegas();
    $this->view->ciegasAdmin($admin,$ciegas,$ciega);
  }
}
  ?>
