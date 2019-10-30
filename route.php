<?php
  require_once "Controllers/LoginController.php";
  require_once "Controllers/RegisterController.php";
  require_once "Controllers/ProfileController.php";
  require_once "Controllers/CiegasController.php";
  require_once "Controllers/TablesController.php";
  require_once "Controllers/RankingController.php";
  require_once "Controllers/AdminController.php";
  require_once "Controllers/MesaController.php";
  require_once "Router.php";

  define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
  define("LOGIN", BASE_URL . 'login');
  define("REGISTER", BASE_URL . 'register');
  define("PROFILE", BASE_URL . 'profile');
  define("CIEGAS",BASE_URL . 'ciegas');
  define("TABLES",BASE_URL . 'tables');
  define("RANKING",BASE_URL . 'ranking');
  define("LOGOUT",BASE_URL . 'logout');
  define("ADMIN",BASE_URL . 'mesasadmin');
  define("CIEGASADMIN",BASE_URL . 'ciegasadmin');
  define("MESA",BASE_URL . 'mesa');

  $r = new Router();

  $r->addRoute("login", "GET", "LoginController", "showLogin");
  $r->addRoute("login", "POST", "LoginController", "verifyUser");
  $r->addRoute("logout", "GET", "LoginController", "logout");
  $r->addRoute("register", "GET", "RegisterController", "showRegister");
  $r->addRoute("profile","GET", "ProfileController", "showProfile");
  $r->addRoute("profile","GET", "ProfileController", "getUser");
  $r->addRoute("ciegas","GET","CiegasController", "showCiegas");
  $r->addRoute("tables", "GET", "TablesController", "showTables");
  $r->addRoute("tables", "POST", "TablesController", "showTablesFilter");
  $r->addRoute("register", "POST", "RegisterController", "userRegister");
  $r->addRoute("ranking", "GET", "RankingController", "showRanking");
  $r->addRoute("mesasadmin", "GET", "AdminController", "mesasAdmin");
  $r->addRoute("edit/:ID", "GET", "AdminController","getMesa");
  $r->addRoute("agregar", "POST", "AdminController", "addMesa");
  $r->addRoute("edit/edit/:ID", "POST", "AdminController","editMesa");
  $r->addRoute("delet/:ID", "GET", "AdminController","deletMesa");
  $r->addRoute("ciegasadmin", "GET", "AdminController", "ciegasAdmin");
  $r->addRoute("agregarciega", "POST", "AdminController", "addCiega");
  $r->addRoute("editciega/:ID", "GET", "AdminController","getCiega");
  $r->addRoute("editciega/editciega/:ID", "POST", "AdminController","editCiega");
  $r->addRoute("deletciega/:ID", "GET", "AdminController","deletCiega");
  $r->addRoute("tables", "POST", "TablesController", "enterTable");
  $r->addRoute("mesa/:ID", "GET", "MesaController", "showMesa");
  $r->addRoute("mesa/sentarse/:IDMESA/:IDUSUARIO", "POST", "MesaController", "sentarse");
  $r->addRoute("mesa/pararse/:ID", "GET", "MesaController", "pararse");

  $r->setDefaultRoute("LoginController", "showLogin");

  $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

?>
