<?php
  require_once('libs/Smarty.class.php');
  class RankingView {
    private $smarty;

    public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->assign('basehref', BASE_URL);
    }

    public function showRanking($error = null) {
      $this->smarty->assign('titulo','Torneos');
      $this->smarty->assign('error',$error);
      $this->smarty->display('templates/ranking.tpl');
    }
  }
?>
