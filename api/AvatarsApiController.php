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
    session_start();
    $userid = $_SESSION['id_usuario'];
    $avatar = $this->modelusuarios->setAvatar($userid,$params[":avatar"]);
    $this->view->response($avatar, 200);
  }
  public function getAvatar(){
    session_start();
    $idavatar = $this->modelusuarios->getAvatar($_SESSION['id_usuario']);
    $img = $this->modelavatars->getAvatar($idavatar->id_avatar);
    $this->view->response($img, 200);
  }
  public function deletAvatar($params=null){
    $idavatar = $this->modelavatars->deletAvatar($params[":ID"]);
    $this->view->response($idavatar,200);
  }
}
