<?php
  require_once('libs/Smarty.class.php');

  class AdminView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }
    public function showAdmin($mesas,$ciegas,$jugadores,$error = null) {
      $this->smarty->assign('titulo', 'Admin');
      $this->smarty->assign('mesas',$mesas);
      $this->smarty->assign('ciegas',$ciegas);
      $this->smarty->assign('jugadores',$jugadores);
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/admin.tpl');
    }
  }
?>
