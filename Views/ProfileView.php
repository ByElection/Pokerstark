<?php
  require_once('libs/Smarty.class.php');
  class ProfileView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }

    public function showProfile($nombre,$pais,$fichas) {
      $this->smarty->assign('titulo', 'Perfil');
      $this->smarty->assign('nombre',$nombre);
      $this->smarty->assign('pais',$pais);
      $this->smarty->assign('fichas',$fichas);
      $this->smarty->display('templates/profile.tpl');
    }
  }
?>
