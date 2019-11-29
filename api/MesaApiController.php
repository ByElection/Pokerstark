<?php
  require_once("./api/ApiController.php");
  include_once('./Models/UsuariosModel.php');
  include_once('./Models/JugadoresModel.php');
  include_once('./Models/MesasModel.php');
  include_once('./Models/CiegasModel.php');
  require_once("./api/JSONView.php");

  class MesaApiController extends ApiController{
  	private $modelusuarios;
  	private $modeljugadores;
  	private $modelmesas;
  	private $modelciegas;

    public function __construct(){
      parent::__construct();
  		$this->modelusuarios = new UsuariosModel();
  		$this->modeljugadores = new JugadoresModel();
  		$this->modelmesas = new MesasModel();
  		$this->modelciegas = new CiegasModel();
    }
    public function getJugadoresMesa($params=null){
      $jugadoresmesa = $this->modeljugadores->getJugadoresMesa($params[":idmesa"]);
      $usuarios = $this->modelusuarios->getUsuariosMesa($jugadoresmesa);
      $i=0;
      foreach ($jugadoresmesa as $jugador) {
        $jugador->username = $usuarios[$i]->username;
        $i++;
      }
      $this->view->response($jugadoresmesa,200);
    }
    public function getMesa($params=null){
      $mesa = $this->modelmesas->getMesa($params[":idmesa"]);
      $mesa->ciegas = $this->modelciegas->getCiegasById($mesa->id_ciegas);
      $this->view->response($mesa,200);
    }
    public function pararse($params=null){
  		$pararse = $this->modeljugadores->pararse($id[":idusuario"]);
      $this->view->response($pararse,200);
  	}
  	public function sentarse($params=null){
  	   $sentarse = $this->modeljugadores->sentarse($params[":idusuario"],$params[":idfichas"],$params[":idmesa"],$parametros[":silla"]);
       $this->view->response($sentarse,200);
  	}
    public function FunctionName($params=null){
      session_start();
      $usuariologeado = $this->modelusuarios->getUserById($_SESSION["id_usuario"]);
      $this->view->response($usuariologeado,200);
    }
  }
