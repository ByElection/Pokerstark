<?php
require_once('libs/Smarty.class.php');
class MesaView {
	private $smarty;
	public function __construct(){
		$this->smarty = new Smarty();
		$this->smarty->assign('basehref', BASE_URL);
	}
	public function showMesa($mesa){
		$this->smarty->assign('mesa',$mesa);
		$this->smarty->display('mesa.tpl');
	}
}
?>