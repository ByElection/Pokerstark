<?php
  require_once('libs/Smarty.class.php');
  class TablesView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }

    public function showTables($mesas) {
      $this->smarty->assign('titulo','Mesas');
      $this->smarty->assign('mesas',$mesas);
      $this->smarty->display('templates/tables.tpl');
    }
  }
?>
