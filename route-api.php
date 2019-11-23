<?php
    require_once('Router.php');
    require_once('api/AvatarsApiController.php');

    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas

    $r->addRoute("avatars", "GET", "AvatarsApiController", "getAvatars");
    $r->addRoute("usuario/avatar/:avatar", "PUT", "AvatarsApiController", "setAvatar");
    $r->addRoute("avatar", "GET", "AvatarsApiController", "getAvatar");
    $r->addRoute("avatar/:ID","DELET","AvatarsApiController","deletAvatar");
    $r->addRoute("mesa/:idmesa/chat/:idjugador","POST","ChatApiController","addMensaje");
    $r->addRoute("mesa/:ID/chat","GET","ChatApiController","getMensajes");
    //run
    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
