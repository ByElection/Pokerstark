<?php
  require_once('libs/Smarty.class.php');
  class LoginView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);

    }
    public function showLogin($admin,$error) {
         $this->smarty->assign('titulo', 'Login');
         $this->smarty->assign('error', $error);
         $this->smarty->assign('admin', $admin);
         $this->smarty->display('templates/login.tpl');
     }
  }

?>
