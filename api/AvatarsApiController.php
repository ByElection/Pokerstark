<?php
require_once("./Models/AvatarsModel.php");
require_once("./Models/UsuariosModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class AvatarsApiController extends ApiController{
  private $modelavatars;
  private $modelusuarios;
  public function  __construct(){
    parent::__construct();
    $this->modelavatars = new AvatarsModel();
    $this->modelusuarios = new UsuariosModel();
  }

  public function getAvatars($params=null) {
    $avatars = $this->modelavatars->getAvatars();
    $this->view->response($avatars, 200);
  }
  public function setAvatar($params=null) {
    var_dump($params);
    die();
    $avatar = $this->modelusuarios->setAvatar($userid,$params->avatarid);
    $this->view->response($avatar, 200);
  }
  public function getAvatar(){
    $this->$_SESSION['id_usuario']
  }
}
