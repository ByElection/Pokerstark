<?php
  include_once('./Views/CiegasView.php');
  include_once('./Models/CiegasModel.php');
  include_once('LoginController.php');

  class CiegasController {
    private $view;
    private $model;
    private $check;

    public function __construct() {
      $this->view = new CiegasView();
      $this->model = new CiegasModel();
      $this->check = new LoginController();
    }
    public function showCiegas() {
      $this->check->checkLogIn();
      $admin=$this->checkAdmin();
      $ciegas=$this->model->getCiegas();
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
