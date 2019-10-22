<?php
  class ProfileModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
    }
    public function getUser($id){
      $sentencia = $this->db->prepare( "SELECT * FROM usuarios WHERE id_usuario = ?");
      $sentencia->execute([$id]);
      $usuario = $sentencia->fetch(PDO::FETCH_OBJ);

      return $usuario;
  }

  }
 ?>
