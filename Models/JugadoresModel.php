<?php
  class JugadoresModel{

      private $db;

      function __construct(){
          $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
      }

      public function getJugadoresMesa($id){
        $mesas = $this->db->prepare("SELECT * FROM jugadores WHERE id_mesa = ?");
        $mesas->execute(array($id));
        $mesa = $mesas->fetchAll(PDO::FETCH_OBJ);
        return $mesa;
      }
      public function getJugadores(){
        $jugadores = $this->db->prepare("SELECT * FROM jugadores");
        $jugadores->execute();
        $jugadores = $jugadores->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
      }
      public function pararse($id){
        $jugadores = $this->db->prepare("DELETE FROM jugadores WHERE id_usuario = ?");
        $jugadores->execute(array($id));
      }
      public function sentarse($id_usuario,$fichas,$id_mesa,$silla){
        $jugadores= $this->db->prepare("INSERT INTO jugadores (id_usuario,fichas_mesa,id_mesa,silla) VALUES (?,?,?,?)");
        $jugadores->execute(array($id_usuario,$fichas,$id_mesa,$silla));
      }
      public function deletJugadoresByMesa($id) {
          $sentencia = $this->db->prepare("DELETE FROM jugadores WHERE id_mesa=?");
          $ok=$sentencia->execute(array($id));
          if (!$ok){
            var_dump($sentencia);
            die;
          }
      }
  }
?>
