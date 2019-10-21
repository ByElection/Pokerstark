<?php
  class TablesModel {
    private $db;

    function __construct(){
      $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
    }

    public function getMesas(){
      $mesas = $this->db->prepare("SELECT * FROM mesas");
      $ok=$mesas->execute();
      if(!$ok){
        var_dump($mesas->errorInfo());
        die();
      }
      $mesasrt = $mesas->fetchAll(PDO::FETCH_OBJ);
      return $mesasrt;
    }

    public function getMesa($id){
      $mesas = $this->db->prepare("SELECT * FROM mesas WHERE id_mesa=?");
      $ok=$mesas->execute(array($id));
      if(!$ok){
        var_dump($mesas->errorInfo());
        die();
      }
      $mesa = $mesas->fetch(PDO::FETCH_OBJ);
      return $mesa;
    }



  }
?>
