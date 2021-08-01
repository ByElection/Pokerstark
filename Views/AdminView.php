<?php
  require_once('libs/Smarty.class.php');

  class AdminView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }

    public function mesasAdmin($admin,$mesas,$ciegas,$jugadores,$mesa = null) {
      $this->smarty->assign('titulo', 'Admin-mesas');
      $this->smarty->assign('admin', $admin);
      $this->smarty->assign('mesas',$mesas);
      $this->smarty->assign('ciegas',$ciegas);
      $this->smarty->assign('jugadores',$jugadores);
      $this->smarty->assign('editmesa',$mesa);
      $this->smarty->display('templates/mesasadmin.tpl');
    }
    public function ciegasAdmin($admin,$ciegas,$ciega=null) {
      $this->smarty->assign('titulo', 'Admin-Ciegas');
      $this->smarty->assign('admin', $admin);
      $this->smarty->assign('ciegas',$ciegas);
      $this->smarty->assign('editciega',$ciega);
      $this->smarty->display('templates/ciegasadmin.tpl');
    }
  }
?>
