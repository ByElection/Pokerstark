<?php
  class LoginModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
    }

    public function GetUser($user){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE username = ?");
        $sentencia->execute(array($user));

        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);

        return $usuario;
    }

  }
 ?>
