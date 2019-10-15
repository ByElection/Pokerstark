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
      $this->view->showTables();
    }
  }
?>
