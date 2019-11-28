<?php
include_once('./Views/ProfileView.php');
include_once('./Models/UsuariosModel.php');
include_once('./Models/AvatarsModel.php');
include_once('LoginController.php');

class ProfileController {
  private $view;
  private $modelusuarios;
  private $modelavatars;
  private $check;

  public function __construct() {
    $this->view = new ProfileView();
    $this->modelusuarios = new UsuariosModel();
    $this->modelavatars = new AvatarsModel();
    $this->check = new LoginController();
  }

  public function showProfile($cargarfichas=null) {
    $this->check->checkLogIn();
    $admin=$this->check->checkAdmin();
    $id=$_SESSION['id_usuario'];
    if ($cargarfichas!=null){
      $this->modelusuarios->addFichas($id,$cargarfichas[":fichas"]);
    }
    $usuario = $this->modelusuarios->getUserById($id);
    $this->view->showProfile($admin,$usuario,$usuario->nombre.' '.$usuario->apellido,$usuario->pais,$usuario->fichas);
  }
  public function addAvatar() {
    if ($_FILES['avatar']['name'] && $this->check->checkAdmin()) {
          if ($_FILES['avatar']['type'] == "image/jpeg" || $_FILES['avatar']['type'] == "image/jpg" || $_FILES['avatar']['type'] == "image/png") {
              $this->modelavatars->addAvatar($_FILES['avatar']);
          }
          else {
              $this->view->showError("Formato no aceptado");
              die();
          }
      }
  }
}
?>
