<?php
require_once('libs/Smarty.class.php');
class MesaView {
	private $smarty;
	public function __construct(){
		$this->smarty = new Smarty();
		$this->smarty->assign('basehref', BASE_URL);
	}
	public function showMesa($jugadoresmesa,$usuariosmesa,$mesa,$ciegas,$usuario){
		$this->smarty->assign('usuariologeado',$usuario);
		$this->smarty->assign('jugadoresmesa',$jugadoresmesa);
		$this->smarty->assign('usuariosmesa',$usuariosmesa);
		$this->smarty->assign('mesa',$mesa);
		$this->smarty->assign('ciegas',$ciegas);
		$this->smarty->assign('titulo','Mesa '.$mesa->id_mesa);
		$this->smarty->display('mesa.tpl');
	}
}
?>
