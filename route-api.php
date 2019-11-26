<?php
    require_once('Router.php');
    require_once('api/AvatarsApiController.php');
    require_once('api/ChatApiController.php');

    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas

    $r->addRoute("avatars", "GET", "AvatarsApiController", "getAvatars");
    $r->addRoute("usuario/avatar/:avatar", "PUT", "AvatarsApiController", "setAvatar");
    $r->addRoute("avatar", "GET", "AvatarsApiController", "getAvatar");
    $r->addRoute("avatar/:ID","DELETE","AvatarsApiController","deletAvatar");
    $r->addRoute("mesa/:idmesa/chat/:idusuario","POST","ChatApiController","addMensaje");
    $r->addRoute("mesa/:ID/chat","GET","ChatApiController","getMensajes");
    $r->addRoute("usuarios/chat/:ARRAY","GET","ChatApiController","getUsuariosChat");
    $r->addRoute("chat/:idmensaje","DELETE","ChatApiController","deletMensaje");


    //run
    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
