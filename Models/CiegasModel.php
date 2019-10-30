<?php
  class CiegasModel{

      private $db;

      function __construct(){
          $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
      }

    public function getCiegas() {
      $sentencia = $this->db->prepare("SELECT * FROM ciegas");
      $sentencia->execute();
      $ciegas = $sentencia->fetchAll(PDO::FETCH_OBJ);
      return $ciegas;
    }
  }
?>
