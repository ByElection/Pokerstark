<?php
  require_once "Controllers/LoginController.php";
  require_once "Controllers/RegisterController.php";
  require_once "Controllers/ProfileController.php";
  require_once "Controllers/TournamentController.php";
  require_once "Controllers/TablesController.php";
  require_once "Controllers/RankingController.php";
  require_once "Router.php";

  define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
  define("LOGIN", BASE_URL . 'login');
  define("REGISTER", BASE_URL . 'register');
  define("PROFILE", BASE_URL . 'profile');
  define("TOURNAMENT",BASE_URL . 'tournament');
  define("TABLES",BASE_URL . 'tables');
  define("RANKING",BASE_URL . 'ranking');

  $r = new Router();

  $r->addRoute("login", "GET", "LoginController", "showLogin");
  $r->addRoute("verify", "POST", "LoginController", "verifyUser");
  $r->addRoute("logout", "GET", "LoginController", "logout");
  $r->addRoute("register", "GET", "RegisterController", "showRegister");
  $r->addRoute("profile","GET", "ProfileController", "showProfile");
  $r->addRoute("tournament","GET","TournamentController", "showTournament");
  $r->addRoute("tables", "GET", "TablesController", "showTables");
  $r->addRoute("register", "POST", "RegisterController", "userRegister");

  $r->setDefaultRoute("LoginController", "showLogin");

  $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

?>
