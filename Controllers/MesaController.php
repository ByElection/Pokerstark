<?php
include_once('./Views/MesaView.php');
include_once('./Models/TablesModel.php');

class MesaController {
	private $view;
	private $model;
	public function __construct(){
		$this->view = new MesaView();
		$this->model = new TablesModel();
	}
	public function showMesa($id){
		$admin=$this->checkAdmin();
		$jugadoresmesa = $this->model->getJugadoresMesa($id);
		$usuariosmesa=$this->model->getUsuariosMesa($jugadoresmesa);
		$mesa=$this->model->getMesa($id);
		$ciegas=$this->model->getCiegasX($mesa->id_ciegas);
		session_start();
		$idusuario=$_SESSION['id_usuario'];
		$usuario=$this->model->getUser($idusuario);
		$this->view->showMesa($admin,$jugadoresmesa,$usuariosmesa,$mesa,$ciegas,$usuario);
	}
	public function pararse($id){
		$this->model->pararse($id);
	}
	public function sentarse($parametros){
		var_dump($parametros);
		$fichas = $_POST["checkin"];
		$this->model->sentarse($parametros[":IDUSUARIO"],$fichas,$parametros[":IDMESA"]);
	}
  public function checkAdmin() {
    if (isset($_SESSION['admin'])){
	    if ($_SESSION['admin']!=0) {
	      return true;
	    }
	    else {
	      return false;
	    }
	  }
	}
}
?>
