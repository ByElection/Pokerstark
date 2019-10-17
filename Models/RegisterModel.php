<?php
class RegisterModel{
  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
  }

  public function addUsuario($user,$password,$nombre,$apellido,$pais){
    $errors = array();
    $usuarios = $this->db->prepare("SELECT 'usuario' FROM 'usuarios' WHERE ?");
    $usuarios->execute(array($user));
    $username = $usuarios->fetch(PDO::FETCH_OBJ);
    if (isset($username)) { // if user exists
      if ($username['username'] === $user) {
        array_push($errors, "Username already exists");
      }
    }else{
      $password = md5($password);
      $usuarios = $this->db->prepare("INSERT INTO 'usuarios' ('username', 'password', 'nombre', 'apellido', 'pais') VALUES (?,?,?,?,?)");
      $usuarios->execute(array($user,$password,$nombre,$apellido,$pais));
    }
  }
}
?>
