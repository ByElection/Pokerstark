<?php
  require_once('libs/Smarty.class.php');
  class ProfileView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }

    public function showProfile($error = null) {
      $this->smarty->assign('titulo', 'Perfil');
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/profile.tpl');
    }
  }
?>
