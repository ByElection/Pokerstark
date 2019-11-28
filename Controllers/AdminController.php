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
  private $admin;

  public function __construct() {
    $this->check = new LoginController();
    $this->view = new AdminView();
    $this->modeljugadores = new JugadoresModel();
    $this->modelmesas = new MesasModel();
    $this->modelciegas = new CiegasModel();
    $this->check->checkLogIn();
    $this->admin = $this->check->checkAdmin();
  }

  public function mesasAdmin() {
    if ($this->admin) {
      $mesas = $this->modelmesas->getMesas();
      $ciegas = $this->modelciegas->getCiegas();
      $jugadores = $this->modeljugadores->getJugadores();
      $this->view->mesasAdmin($this->admin,$mesas,$ciegas,$jugadores);
  }
  else {
    header("Location: " . PROFILE);
  }
}
  public function ciegasAdmin() {
    if ($this->admin) {
      $ciegas = $this->modelciegas->getCiegas();
      $this->view->ciegasAdmin($admin,$ciegas);
    }
    else {
      header("Location: " . PROFILE);
  }
}
  public function addMesa() {
    if ($this->admin) {
      $ciegas = $_POST['ciegas'];
      $sillas = $_POST['sillas'];
      $this->modelmesas->addMesa($ciegas,$sillas);
      header("Location: " . ADMIN);
    }
    else {
      header("Location: " . PROFILE);
    }
  }
  public function addCiega() {
    if ($this->admin) {
      $ciega_chica = $_POST['ciega_chica'];
      $ciega_grande = $ciega_chica * 2;
      $this->modelciegas->addCiega($ciega_chica,$ciega_grande);
      header("Location: " . CIEGASADMIN);
    }
    else {
      header("Location: " . PROFILE);
    }
  }
  public function deletMesa($id) {
    if ($this->admin) {
      $this->modeljugadores->deletJugadoresByMesa($id[":ID"]);
      $this->modelmesas->deletMesaByMesa($id[":ID"]);
      header("Location: " . ADMIN);
    }
    else {
      header("Location: " . PROFILE);
    }
  }
  public function deletCiega($id) {
    if ($this->admin) {
      $mesas=$this->modelmesas->getMesasByCiega($id[":ID"]);
      foreach ($mesas as $mesa) {
        $this->modeljugadores->deletJugadoresByMesa($mesa->id_mesa);
      }
      $this->modelmesas->deletMesaByCiega($id[":ID"]);
      $this->modelciegas->deletCiega($id[":ID"]);
      header("Location: " . CIEGASADMIN);
    }
    else {
      header("Location: " . PROFILE);
    }
  }
  public function editMesa($id) {
    if ($this->admin) {
      $ciegas = $_POST['ciegas'];
      $sillas = $_POST['sillas'];
      $this->modelmesas->editMesa($id[":ID"],$ciegas,$sillas);
      header("Location: " . ADMIN);
    }
    else {
      header("Location: " . PROFILE);
    }
  }
  public function editCiega($id) {
    if ($this->admin) {
      $ciega_chica = $_POST['ciega_chica'];
      $ciega_grande = strval($ciega_chica * 2);
      $this->modelciegas->editCiega($id[":ID"],$ciega_chica,$ciega_grande);
      header("Location: " . CIEGASADMIN);
    }
    else {
      header("Location: " . PROFILE);
    }
  }
  public function getMesa($id) {
    $mesa = $this->modelmesas->getMesa($id[":ID"]);
    $mesas = $this->modelmesas->getMesas();
    $ciegas = $this->modelciegas->getCiegas();
    $jugadores = $this->modeljugadores->getJugadores();
    $this->view->mesasAdmin($admin,$mesas,$ciegas,$jugadores,$mesa);
  }
  public function getCiega($id) {
    $ciega = $this->modelciegas->getCiegasById($id[":ID"]);
    $ciegas = $this->modelciegas->getCiegas();
    $this->view->ciegasAdmin($admin,$ciegas,$ciega);
  }
}
?>
