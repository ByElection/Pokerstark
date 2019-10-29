<?php
  require_once "Controllers/LoginController.php";
  require_once "Controllers/RegisterController.php";
  require_once "Controllers/ProfileController.php";
  require_once "Controllers/TournamentController.php";
  require_once "Controllers/TablesController.php";
  require_once "Controllers/RankingController.php";
  require_once "Controllers/AdminController.php";
  require_once "Controllers/MesaController.php";
  require_once "Router.php";

  define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
  define("LOGIN", BASE_URL . 'login');
  define("REGISTER", BASE_URL . 'register');
  define("PROFILE", BASE_URL . 'profile');
  define("TOURNAMENT",BASE_URL . 'tournament');
  define("TABLES",BASE_URL . 'tables');
  define("RANKING",BASE_URL . 'ranking');
  define("LOGOUT",BASE_URL . 'logout');
  define("ADMIN",BASE_URL . 'admin');
  define("MESA",BASE_URL . 'mesa');

  $r = new Router();

  $r->addRoute("login", "GET", "LoginController", "showLogin");
  $r->addRoute("login", "POST", "LoginController", "verifyUser");
  $r->addRoute("logout", "GET", "LoginController", "logout");
  $r->addRoute("register", "GET", "RegisterController", "showRegister");
  $r->addRoute("profile","GET", "ProfileController", "showProfile");
  $r->addRoute("profile","GET", "ProfileController", "getUser");
  $r->addRoute("tournament","GET","TournamentController", "showTournament");
  $r->addRoute("tables", "GET", "TablesController", "showTables");
  $r->addRoute("register", "POST", "RegisterController", "userRegister");
  $r->addRoute("ranking", "GET", "RankingController", "showRanking");
  $r->addRoute("admin", "GET", "AdminController", "showAdmin");
  $r->addRoute("agregar", "POST", "AdminController", "addMesa");
  $r->addRoute("delet/:ID", "GET", "AdminController","deletMesa");
  $r->addRoute("edit/:ID", "GET", "AdminController","getMesa");
  $r->addRoute("edit/edit/:ID", "POST", "AdminController","editMesa");
  $r->addRoute("tables", "POST", "TablesController", "enterTable");
  $r->addRoute("mesa/:ID", "GET", "MesaController", "showMesa");
  $r->addRoute("mesa/sentarse/:ID/:ID", "GET", "MesaController", "sentarse");
  $r->addRoute("mesa/pararse/:ID", "GET", "MesaController", "pararse");

  $r->setDefaultRoute("LoginController", "showLogin");

  $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

?>
