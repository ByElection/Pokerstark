<?php
include_once('./Views/AdminView.php');
include_once('./Models/AdminModel.php');

class AdminController {
  private $view;
  private $model;

  public function __construct() {
    $this->view = new AdminView();
    $this->model = new AdminModel();
  }

  public function checkLogIn(){
          session_start();
          if(!isset($_SESSION['id_usuario']) || ($_SESSION['admin'])==0){
              header("Location: " . LOGIN);
              die();
          }

          if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 5000)) {
              header("Location: " . LOGIN);
              die(); // destruye la sesión, y vuelve al login
          }
          $_SESSION['LAST_ACTIVITY'] = time();
      }
  public function mesasAdmin() {
    $this->checkLogIn();
    $mesas = $this->model->getMesas();
    $ciegas = $this->model->getCiegas();
    $jugadores = $this->model->getJugadores();
    $this->view->mesasAdmin($mesas,$ciegas,$jugadores);
  }
  public function ciegasAdmin() {
    $this->checkLogIn();
    $ciegas = $this->model->getCiegas();
    $this->view->ciegasAdmin($ciegas);
  }
  public function addMesa() {
    $this->checkLogIn();
    $ciegas = $_POST['ciegas'];
    $sillas = $_POST['sillas'];
    $this->model->addMesa($ciegas,$sillas);
    header("Location: " . ADMIN);
  }
  public function addCiega() {
    $this->checkLogIn();
    $ciega_chica = $_POST['ciega_chica'];
    $ciega_grande = $ciega_chica * 2;
    $this->model->addCiega($ciega_chica,$ciega_grande);
    header("Location: " . CIEGASADMIN);
  }
  public function deletMesa($id) {
    $this->checkLogIn();
    $this->model->deletMesa($id);
    header("Location: " . ADMIN);
  }
  public function deletCiega($id) {
    $this->checkLogIn();
    $this->model->deletCiega($id);
    header("Location: " . CIEGASADMIN);
  }
  public function editMesa($id) {
    $this->checkLogIn();
    $ciegas = $_POST['ciegas'];
    $sillas = $_POST['sillas'];
    $this->model->editMesa($id,$ciegas,$sillas);
    header("Location: " . ADMIN);
  }
  public function editCiega($id) {
    $this->checkLogIn();
    $ciega_chica = $_POST['ciega_chica'];
    $ciega_grande = strval($ciega_chica * 2);
    $this->model->editCiega($id,$ciega_chica,$ciega_grande);
    header("Location: " . CIEGASADMIN);
  }
  public function getMesa($id) {
    $this->checkLogIn();
    $mesa = $this->model->getMesa($id);
    $mesas = $this->model->getMesas();
    $ciegas = $this->model->getCiegas();
    $jugadores = $this->model->getJugadores();
    $this->view->mesasAdmin($mesas,$ciegas,$jugadores,$mesa);
  }
  public function getCiega($id) {
    $this->checkLogIn();
    $ciega = $this->model->getCiega($id);
    $ciegas = $this->model->getCiegas();
    $this->view->ciegasAdmin($ciegas,$ciega);
  }
}
  ?>
