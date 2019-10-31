<?php
include_once('./Views/MesaView.php');
include_once('./Models/UsuariosModel.php');
include_once('./Models/JugadoresModel.php');
include_once('./Models/MesasModel.php');
include_once('./Models/CiegasModel.php');

class MesaController {
	private $view;
	private $modelusuarios;
	private $modeljugadores;
	private $modelmesas;
	private $modelciegas;

	public function __construct(){
		$this->view = new MesaView();
		$this->modelusuarios = new UsuariosModel();
		$this->modeljugadores = new JugadoresModel();
		$this->modelmesas = new MesasModel();
		$this->modelciegas = new CiegasModel();
	}
	public function showMesa($id){
		$admin=$this->checkAdmin();
		$jugadoresmesa = $this->modeljugadores->getJugadoresMesa($id[":ID"]);
		$usuariosmesa=$this->modelusuarios->getUsuariosMesa($jugadoresmesa);
		$mesa=$this->modelmesas->getMesa($id[":ID"]);
		$ciegas=$this->modelciegas->getCiegasById($mesa->id_ciegas);
		session_start();
		$idusuario=$_SESSION['id_usuario'];
		$usuario=$this->modelusuarios->getUserById($idusuario);
		$this->view->showMesa($admin,$jugadoresmesa,$usuariosmesa,$mesa,$ciegas,$usuario);
	}
	public function pararse($id){
		$this->modeljugadores->pararse($id[":ID"]);
	}
	public function sentarse($parametros){
		var_dump($parametros);
		$fichas = $_POST["checkin"];
		$this->modeljugadores->sentarse($parametros[":IDUSUARIO"],$fichas,$parametros[":IDMESA"]);
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
