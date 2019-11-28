<?php
  require_once("./Models/ChatModel.php");
  require_once("./api/ApiController.php");
  include_once('./Models/UsuariosModel.php');
  require_once("./api/JSONView.php");

  class ChatApiController extends ApiController{
    private $modelchat;
  	private $modelusuarios;
    public function __construct(){
      parent::__construct();
      $this->modelchat = new ChatModel();
  		$this->modelusuarios = new UsuariosModel();
    }
    public function getMensajes($params=null) {
      $chat = $this->modelchat->getMensajes($params[":ID"]);
      $jugadores = array();
      foreach ($chat as $chit) {
        $chit->username = $this->modelusuarios->getUsernameById($chit->id_usuario)->username;
      }
      $this->view->response($chat,200);
    }
    public function deletMensaje($params = null){
      $chat = $this->modelchat->deletMensaje($params[":idmensaje"]);
      $this->view->response($chat,200);
    }
  public function getUsuariosChat($params=null){
    $usuarios = JSON_decode($params[":ARRAY"]);
    $jugadores = array();
    for ($i=0; $i < $usuarios.length ; $i++) {
      array_push($jugadores,$this->modelusuarios->getUserById($usuarios[$i]->id_usuario));
    }
    $this->view->response($jugadores,200);
  }
    public function addMensaje($params=null){
      $chat = $this->getData();
      $mensaje = $this->modelchat->addMensaje($chat->mensaje,$params[":idmesa"],$params[":idusuario"]);
      $this->view->response($mensaje,200);
    }
  }
