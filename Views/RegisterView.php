<?php
  require_once('libs/Smarty.class.php');
  class RegisterView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }

    public function showRegister($error = null) {
      $this->smarty->assign('titulo', 'Registrarse');
      $this->smarty->assign('error', $error);
      $this->smarty->display('templates/register.tpl');
    }
  }
