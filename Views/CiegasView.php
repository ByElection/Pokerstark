
<?php
  require_once('libs/Smarty.class.php');
  class CiegasView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }

    public function showCiegas($admin,$ciegas) {
      $this->smarty->assign('titulo','Ciegas');
      $this->smarty->assign('admin', $admin);
      $this->smarty->assign('ciegas',$ciegas);
      $this->smarty->display('templates/ciegas.tpl');
    }
  }
?>
