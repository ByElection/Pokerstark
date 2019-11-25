<?php
  class ChatModel {
    private $db;

    function __construct() {
      $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
    }
    public function addMensaje($mensaje,$idmesa,$idusuario) {
      $sentencia = $this->db->prepare("INSERT INTO chat(id_mesa,id_usuario,mensaje) VALUES(?,?,?)");
      $sentencia->execute([$idmesa,$idusuario,$mensaje]);
    }
    public function getMensajes($id) {
      $sentencia =$this->db->prepare("SELECT * FROM chat WHERE id_mesa=?");
      $sentencia->execute([$id]);
      $mensajes=$sentencia->fetchAll(PDO::FETCH_OBJ);
      return $mensajes;
    }
  }
?>
