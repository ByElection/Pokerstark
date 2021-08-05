<?php

class PuntajesModel{
  private $db;

  function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
  }
  public function getPuntajes($id){
    $puntajes = $this->db->prepare("SELECT puntaje FROM puntajes WHERE id_mesa = ?");
    $puntajes->execute([$id]);
    $puntajes = $puntajes->fetchAll(PDO::FETCH_OBJ);
    return $puntajes;
  }
  public function addPuntaje($userid,$mesaid,$puntaje) {
    $sentencia=$this->db->prepare("INSERT INTO puntajes(id_usuario,id_mesa,puntaje) VALUES(?,?,?)");
    $sentencia->execute(array($userid,$mesaid,$puntaje));
  }
}

 ?>
