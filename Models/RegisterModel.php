<?php
class RegisterModel{
  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
  }

  public function addUsuario($user,$password,$nombre,$apellido,$pais){
    $usuarios = $this->db->prepare("SELECT username FROM usuarios WHERE username=?");
    $ok=$usuarios->execute(array($user));
    if(!$ok){
      var_dump($usuarios->errorInfo());
      die();
    }
    $username = $usuarios->fetch(PDO::FETCH_OBJ);
    if (isset($username)&&$username['username'] === $user) { // if user exists
      echo "el usuario ya existe";
    }else{
      $password =  password_hash($password, PASSWORD_DEFAULT);
      $usuarios = $this->db->prepare("INSERT INTO usuarios (username, password, nombre, apellido, pais) VALUES (?,?,?,?,?)");
      $ok=$usuarios->execute(array($user,$password,$nombre,$apellido,$pais));
      if(!$ok){
        var_dump($usuarios->errorInfo());
        die();
      }

    }
  }
}
?>
