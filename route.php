<?php
  require_once "Controllers/ControllerLogin.php";
  require_once "Controllers/ControllerPlayer.php";
  
  $action = $_GET["action"];
  define("URL_BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
  define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
  define("URL_PLAYER", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/player');
  define("URL_PLAY", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/play');
  define("URL_FRIENDS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/friends');
  define("URL_TOURNAMENT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/tournament');
  define("URL_RANKED", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/ranked');

  $controller = new ControllerPlayer();

  if($action == ''){
    $controller->GetPlayer();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "player"){
            $controller->GetTareas();
        }elseif($partesURL[0] == "login") {
            $controllerUser = new ControllerLogin();
            $controllerUser->Login();
        }elseif($partesURL[0] == "iniciarSesion") {
            $controllerUser = new ControllerLogin();
            $controllerUser->IniciarSesion();
        }elseif($partesURL[0] == "logout") {
            $controllerUser = new ControllerLogin();
            $controllerUser->Logout();
        }
    }
}

?>
