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
		$jugadoresmesa = $this->model->getJugadoresMesa($id);
		$usuariosmesa=$this->model->getUsuariosMesa($jugadoresmesa);
		$mesa=$this->model->getMesa($id);
		$ciegas=$this->model->getCiegasX($mesa->id_ciegas);
		session_start();
		$idusuario=$_SESSION['id_usuario'];
		$usuario=$this->model->getUser($idusuario);
		$this->view->showMesa($jugadoresmesa,$usuariosmesa,$mesa,$ciegas,$usuario);
	}
	public function pararse($id){
		$this->model->pararse($id);
	}
	public function sentarse($id_mesa,$id_usuario){
		$fichas = $_POST['fichas'];
		$this->model->sentarse($id_usuario,$fichas,$id_mesa);
	}
	
}
?>