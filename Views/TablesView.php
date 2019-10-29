<?php
  require_once('libs/Smarty.class.php');
  class TablesView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }

    public function showTables($mesas,$ciegas,$jugadores,$filtraciegas=NULL) {
      $this->smarty->assign('titulo','Mesas');
      $this->smarty->assign('filtraciegas',$filtraciegas);
      $this->smarty->assign('mesas',$mesas);
	    $this->smarty->assign('ciegas',$ciegas);
	    $this->smarty->assign('jugadores',$jugadores);
      $this->smarty->display('templates/tables.tpl');
    }
  }
?>
