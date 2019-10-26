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
		$mesa = $this->model->getMesa($id);
		$this->view->showMesa($mesa);
	}
}
?>