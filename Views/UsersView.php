<?php
require_once('libs/Smarty.class.php');
class UsersView {
  private $smarty;

  public function __construct() {
    $this->smarty = new Smarty();
    $this->smarty->assign('basehref', BASE_URL);
  }

  public function showRanking($admin,$esta,$users) {
    $this->smarty->assign('titulo','Usuarios');
    $this->smarty->assign('admin', $admin);
    $this->smarty->assign('users',$users);
    $this->smarty->assign('esta',$esta);
    $this->smarty->display('templates/users.tpl');
  }
}
?>
