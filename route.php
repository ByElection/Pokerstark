<?php
  require_once "Controllers/LoginController.php";
  require_once "Controllers/RegisterController.php";
  require_once "Controllers/ProfileController.php";
  require_once "Router.php";

  define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
  define("LOGIN", BASE_URL . 'login');
  define("REGISTER", BASE_URL . 'register');
  define("PROFILE", BASE_URL . 'profile');

  $r = new Router();

  $r->addRoute("login", "GET", "LoginController", "showLogin");
  $r->addRoute("verify", "POST", "LoginController", "verifyUser");
  $r->addRoute("logout", "GET", "LoginController", "logout");
  $r->addRoute("register", "GET", "RegisterController", "showRegister");
  $r->addRoute("profile","GET", "ProfileController", "showProfile");

  $r->setDefaultRoute("LoginController", "showLogin");

  $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);

?>
