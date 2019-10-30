<?php
  class RankingModel{

      private $db;

      function __construct(){
          $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
      }

      public function getUsers(){
            $usuarios = $this->db->prepare("SELECT username,fichas FROM usuarios ORDER BY fichas DESC");
            $usuarios->execute();
            $usuario = $usuarios->fetchAll(PDO::FETCH_OBJ);
            return $usuario;
        }
  }
?>
