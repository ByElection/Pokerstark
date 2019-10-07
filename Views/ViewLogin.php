<?php
  require_once('libs/Smarty.class.php');
  class ViewLogin {
    function __construct() {

    }
    public function DisplayLogin() {
        $smarty = new Smarty();
        $smarty->assign('URL_BASE',URL_BASE);
        $smarty->display('templates/login.tpl');

    }
  }

?>
