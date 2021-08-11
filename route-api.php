<?php
  require_once('Router.php');
  require_once('api/AvatarsApiController.php');
  require_once('api/ChatApiController.php');
  require_once('api/PuntajesApiController.php');
  require_once('api/MesaApiController.php'); 

    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas

    $r->addRoute("avatars", "GET", "AvatarsApiController", "getAvatars");
    $r->addRoute("usuario/:id_usuario/avatar/:avatar", "PUT", "AvatarsApiController", "setAvatar");
    $r->addRoute("usuario/:idusuario/avatar", "GET", "AvatarsApiController", "getAvatar");
    $r->addRoute("avatar/:ID","DELETE","AvatarsApiController","deletAvatar");
    $r->addRoute("mesa/:idmesa/chat/:idusuario","POST","ChatApiController","addMensaje");
    $r->addRoute("mesa/:ID/chat","GET","ChatApiController","getMensajes");
    $r->addRoute("chat/:idmensaje","DELETE","ChatApiController","deletMensaje");
    $r->addRoute("mesa/:ID/puntaje","GET","PuntajesApiController","getPuntajes");
    $r->addRoute("puntaje/:puntaje/mesa/:id_mesa/usuario/:id_usuario","POST","PuntajesApiController","addPuntaje");
    $r->addRoute("mesa/:idmesa/jugadores","GET","MesaApiController","getJugadoresMesa");
    $r->addRoute("mesa/:idmesa","GET","MesaApiController","getMesa");
    $r->addRoute("mesa/:idmesa/usuario/:idusuario/sentarse/:idsilla/fichas/:fichas","POST","MesaApiController","sentarse");
    $r->addRoute("usuario/:idusuario/pararse","DELETE","MesaApiController","pararse");
    $r->addRoute("usuariologeado","GET","MesaApiController","getUsuarioLogeado");

    //run
    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
