<?php
require_once("./Models/AvatarsModel.php");
require_once("./api/ApiController.php");
require_once("./api/JSONView.php");

class AvatarsApiController extends ApiController{
  private $modelavatars;
  public function  __construct(){
    super();
    $this->modelavatars = new AvatarsModel();
  }
  public function addAvatar($params=null) {
    $avatar = $this->getData();

    $avatarUrl = $this->modelavatars->addAvatar($avatar->url);
    $avatarNueva = $this->modelavatars->getAvatar($avatarUrl);

    if ($avatarNueva)
        $this->view->response($avatarNueva, 200);
    else
        $this->view->response("Error al insertar tarea", 500);
  }
  public function getAvatars($params=null) {
    $avatars = $this->model->getAvatars();
    $this->view->response($avatars, 200);
  }
}
