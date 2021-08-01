<?php
require_once('libs/Smarty.class.php');
class RegisterView {
  private $smarty;

  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
  }

  public function showRegister($admin,$error) {
    $this->smarty->assign('titulo', 'Registrarse');
    $this->smarty->assign('admin', $admin);
    $this->smarty->assign('error', $error);
    $this->smarty->display('templates/register.tpl');
  }
}
?>
