<?php
    require_once('Router.php');
    require_once('api/AvatarsApiController.php');

    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas

    $r->addRoute("addavatar", "POST", "AvatarsApiController", "addAvatar");
    $r->addRoute("getavatars", "GET", "AvatarsApiController", "getAvatars");
    $r->addRoute("setavatar/:avatar", "PUT", "AvatarsApiController", "setAvatar");
    $r->addRoute("getavatar", "GET", "AvatarsApiController", "getAvatar");

    //run
    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
