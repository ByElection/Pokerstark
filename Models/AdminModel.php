<?php
  class AdminModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
    }
    public function getMesas() {
      $sentencia = $this->db->prepare("SELECT * FROM mesas");
      $sentencia->execute();
      $mesas = $sentencia->fetchAll(PDO::FETCH_OBJ);
      return $mesas;
    }

    public function getMesa($id) {
      $sentencia = $this->db->prepare("SELECT * FROM mesas WHERE id_mesa = ?");
      $sentencia->execute(array($id[":ID"]));
      $mesa = $sentencia->fetch(PDO::FETCH_OBJ);
      return $mesa;
    }

    public function addMesa($ciegas,$sillas) {
        $sentencia = $this->db->prepare("INSERT INTO mesas(id_ciegas,sillas) VALUES(?,?)");
        $sentencia->execute(array($ciegas,$sillas));
    }

    public function editMesa($id,$ciegas,$sillas) {
        $sentencia =  $this->db->prepare("UPDATE mesas SET id_ciegas=?,sillas=? WHERE id_mesa=?");
        $sentencia->execute(array($ciegas,$sillas,$id));
    }

    public function deletMesa($id) {
        $sentencia = $this->db->prepare("DELETE FROM mesas WHERE id_mesa=?");
        $sentencia->execute(array($id[":ID"]));
    }
    public function getCiegas() {
      $sentencia = $this->db->prepare("SELECT * FROM ciegas");
      $sentencia->execute();
      $ciegas = $sentencia->fetchAll(PDO::FETCH_OBJ);
      return $ciegas;
    }
    public function getJugadores() {
      $sentencia = $this->db->prepare("SELECT * FROM jugadores");
      $sentencia->execute();
      $jugadores = $sentencia->fetchAll(PDO::FETCH_OBJ);
      return $jugadores;
    }
}
