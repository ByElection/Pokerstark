<?php
include_once('./Views/ProfileView.php');
include_once('./Models/ProfileModel.php');

class ProfileController {
  private $view;
  private $model;

  public function __construct() {
    $this->view = new ProfileView();
    $this->model = new ProfileModel();
  }
  public function checkLogIn(){
         session_start();

         if(!isset($_SESSION['id_usuario'])){
             header("Location: " . LOGIN);
             die();
         }

         if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 100)) {
             header("Location: " . LOGIN);
             die(); // destruye la sesión, y vuelve al login
         }
         $_SESSION['LAST_ACTIVITY'] = time();
     }



  public function showProfile() {
    $this->checkLogIn();
    $usuario = $this->model->getUser($_SESSION['id_usuario']);
    $this->view->showProfile($usuario->nombre.' '.$usuario->apellido,$usuario->pais,$usuario->fichas);
  }


}
?>
