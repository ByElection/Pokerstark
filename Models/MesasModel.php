<?php
class MesasModel {
  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
  }

  public function getMesas(){
    $mesas = $this->db->prepare("SELECT * FROM mesas");
    $mesas->execute();
    $mesas = $mesas->fetchAll(PDO::FETCH_OBJ);
    return $mesas;
  }

  public function getMesa($id){
    $mesa=$this->db->prepare("SELECT * FROM mesas WHERE id_mesa = ?");
    $mesa->execute(array($id));
    $mesa = $mesa->fetch(PDO::FETCH_OBJ);
    return $mesa;
  }

  public function getMesasByCiega($id){
    $mesas=$this->db->prepare("SELECT * FROM mesas WHERE id_ciegas = ?");
    $mesas->execute(array($id));
    $mesas = $mesas->fetchAll(PDO::FETCH_OBJ);
    return $mesas;
  }

  public function addMesa($ciegas,$sillas,$mazo) {
    $sentencia = $this->db->prepare("INSERT INTO mesas(id_ciegas,sillas,mazo) VALUES(?,?,?)");
    $sentencia->execute(array($ciegas,$sillas,$mazo));
  }

  public function editMesa($id,$ciegas,$sillas) {
      $sentencia =  $this->db->prepare("UPDATE mesas SET id_ciegas=?,sillas=? WHERE id_mesa=?");
      $sentencia->execute(array($ciegas,$sillas,$id));
  }
  public function deletMesaByMesa($id) {
      $sentencia = $this->db->prepare("DELETE FROM mesas WHERE id_mesa=?");
      $sentencia->execute(array($id));
  }
  public function deletMesaByCiega($id) {
      $sentencia = $this->db->prepare("DELETE FROM mesas WHERE id_ciegas=?");
      $sentencia->execute(array($id));
  }
  public function getMazo($id){
    $mazo=$this->db->prepare("SELECT mazo FROM mesas WHERE id_mesa = ?");
    $mazo->execute(array($id));
    $mazo = $mazo->fetch(PDO::FETCH_OBJ);
    return $mazo;
  }
  public function setMazo($id,$mazo){
      $sentencia =  $this->db->prepare("UPDATE mesas SET mazo=? WHERE id_mesa=?");
      $sentencia->execute(array($mazo,$id));
  }
}
?>
