<?php
include_once('./Views/ProfileView.php');
include_once('./Models/UsuariosModel.php');
include_once('./Models/JugadoresModel.php');
include_once('./Models/MesasModel.php');
include_once('./Models/CiegasModel.php');
include_once('./Models/AvatarsModel.php');
include_once('LoginController.php');

class ProfileController {
  private $view;
  private $modelusuarios;
  private $modeljugadores;
  private $modelmesas;
  private $modelciegas;
  private $modelavatars;
  private $check;

  public function __construct() {
    $this->view = new ProfileView();
    $this->modelusuarios = new UsuariosModel();
    $this->modeljugadores = new JugadoresModel();
    $this->modelmesas = new MesasModel();
    $this->modelciegas = new CiegasModel();
    $this->modelavatars = new AvatarsModel();
    $this->check = new LoginController();
  }

  public function showProfile($cargarfichas=null) {
    $this->check->checkLogIn();
    $admin=$this->checkAdmin();
    $id=$_SESSION['id_usuario'];
    if ($cargarfichas!=null){
      $this->modelusuarios->addFichas($id,$cargarfichas[":fichas"]);
    }
    $usuario = $this->modelusuarios->getUserById($id);
    $this->view->showProfile($admin,$usuario->nombre.' '.$usuario->apellido,$usuario->pais,$usuario->fichas);
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
  public function addAvatar() {
    if ($_FILES['avatar']['name']) {
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
