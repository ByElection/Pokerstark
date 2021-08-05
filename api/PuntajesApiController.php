<?php
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");
require_once("./Models/PuntajesModel.php");

class PuntajesApiController extends ApiController{
  private $modelpuntajes;
  function __construct(){
    parent::__construct();
    $this->modelpuntajes = new PuntajesModel();
  }
  public function getPuntajes($params=null){
    $puntajes=$this->modelpuntajes->getPuntajes($params[":ID"]);
    $puntaje=0;
    $cant=0;
    foreach ($puntajes as $punt){
      $puntaje= $puntaje+$punt->puntaje;
      $cant++;
    }
    if ($cant==0) {
      $puntaje=0;
    }else{
      $puntaje=$puntaje/$cant;
    }
    $this->view->response($puntaje,200);
  }
  public function addPuntaje($params=null){
    $puntaje=$this->modelpuntajes->addPuntaje($params[":id_usuario"],$params[":id_mesa"],$params[":puntaje"]);
    $this->view->response($puntaje,200);
  }
}

 ?>
