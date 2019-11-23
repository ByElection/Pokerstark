<?php
  require_once("./Models/ChatModel.php");
  require_once("./api/ApiController.php");
  require_once("./api/JSONView.php");

  class ChatApiController extends ApiController{
    private $modelchat;
    public function __construct(){
      parent::__construct();
      $this->modelchat = new ChatModel();
    }
    public function getMensajes($params=null) {
      $chat = $this->modelchat->getMensajes($params[":ID"]);
      $this->view->response($chat,200);
    }
    public function addMensaje($params=null){
      $mensaje = $this->modelchat->addMensaje($params[":mensaje"],$params[":idmesa"],$params["idusuario"])
      $this->view->response($mensaje,200);
    }
  }
?>
