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
        $sentencia->execute(array($ciegas,$sillas,$id[":ID"]));
    }

    public function deletMesa($id) {
        $sentencia = $this->db->prepare("DELETE FROM jugadores WHERE id_mesa=?");
        $sentencia->execute(array($id[":ID"]));
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
    public function addCiega($ciega_chica,$ciega_grande) {
        $sentencia = $this->db->prepare("INSERT INTO ciegas(ciega_chica,ciega_grande) VALUES(?,?)");
        $sentencia->execute(array($ciega_chica,$ciega_grande));
    }
    public function deletCiega($id) {
        $sentencia = $this->db->prepare("DELETE FROM mesas WHERE id_ciegas=?");
        $sentencia->execute(array($id[":ID"]));
        $sentencia = $this->db->prepare("DELETE FROM ciegas WHERE id_ciegas=?");
        $ok=$sentencia->execute(array($id[":ID"]));
    }
    public function editCiega($id,$ciega_chica,$ciega_grande) {
        $sentencia =  $this->db->prepare("UPDATE ciegas SET ciega_chica=?,ciega_grande=? WHERE id_ciegas=?");
        $sentencia->execute(array($ciega_chica,$ciega_grande,$id[":ID"]));
    }
    public function getCiega($id) {
      $sentencia = $this->db->prepare("SELECT * FROM ciegas WHERE id_ciegas = ?");
      $sentencia->execute(array($id[":ID"]));
      $ciega = $sentencia->fetch(PDO::FETCH_OBJ);
      return $ciega;
    }

}
?>
