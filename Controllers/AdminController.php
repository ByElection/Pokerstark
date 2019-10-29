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


  public function showAdmin() {
    session_start();
    $mesas = $this->model->getMesas();
    $ciegas = $this->model->getCiegas();
    $jugadores = $this->model->getJugadores();
    $this->view->showAdmin($mesas,$ciegas,$jugadores);
  }
  public function addMesa() {
    $ciegas = $_POST['ciegas'];
    $sillas = $_POST['sillas'];
    $this->model->addMesa($ciegas,$sillas);
    header("Location: " . ADMIN);
  }
  public function deletMesa($id) {
    $this->model->deletMesa($id);
    header("Location: " . ADMIN);
  }
  public function editMesa($id) {
    $ciegas = $_POST['ciegas'];
    $sillas = $_POST['sillas'];
    var_dump($ciegas);
    var_dump($sillas);
    $this->model->editMesa($id,$ciegas,$sillas);
    header("Location: " . ADMIN);
  }
  public function getMesa($id) {
    $mesa = $this->model->getMesa($id);
    $mesas = $this->model->getMesas();
    $ciegas = $this->model->getCiegas();
    $jugadores = $this->model->getJugadores();
    $this->view->editMesa($mesas,$ciegas,$jugadores,$mesa);
  }
}
  ?>
