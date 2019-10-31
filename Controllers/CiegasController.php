<?php
  include_once('./Views/CiegasView.php');
  include_once('./Models/UsuariosModel.php');
  include_once('./Models/JugadoresModel.php');
  include_once('./Models/MesasModel.php');
  include_once('./Models/CiegasModel.php');
  include_once('LoginController.php');

  class CiegasController {
    private $view;
    private $modelusuarios;
    private $modeljugadores;
    private $modelmesas;
    private $modelciegas;
    private $check;

    public function __construct() {
      $this->view = new CiegasView();
      $this->modelusuarios = new UsuariosModel();
      $this->modeljugadores = new JugadoresModel();
      $this->modelmesas = new MesasModel();
      $this->modelciegas = new CiegasModel();
      $this->check = new LoginController();
    }
    public function showCiegas() {
      $this->check->checkLogIn();
      $admin=$this->checkAdmin();
      $ciegas=$this->modelciegas->getCiegas();
      $this->view->showCiegas($admin,$ciegas);
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
