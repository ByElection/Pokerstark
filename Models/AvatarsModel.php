<?php
  class AvatarsModel {
    private $db;

    function __construct(){
      $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
    }
    public function getAvatars() {
      $sentencia=$this->db->prepare("SELECT * FROM avatars");
      $sentencia->execute();
      $avatars= $sentencia->fetchAll(PDO::FETCH_OBJ);
      return $avatars;
    }
    public function getAvatar($id) {
      $sentencia=$this->db->prepare("SELECT img FROM avatars WHERE id_avatar=?");
      $sentencia->execute([$id]);
      $img=$sentencia->fetch(PDO::FETCH_OBJ);
      return $img;
    }
    public function addAvatar($imagen) {
      $url = null;
      if ($imagen) {
          $url = $this->moveFile($imagen);
      }
      $sentencia=$this->db->prepare("INSERT INTO avatars(img) VALUES(?)");
      $sentencia->execute([$url]);
      //return $this->db->lastInsertId();
    }
    private function moveFile($imagen) {
      $url = "img/avatars/" . uniqid() . "." . strtolower(pathinfo($imagen['name'], PATHINFO_EXTENSION));
      move_uploaded_file($imagen['tmp_name'], $url);
      return $url;
  }

    public function addAvatars($url) {
      $sentencia=$this->db->prepare("INSERT INTO avatars(img) VALUES(?)");
      $sentencia->execute($url);

    }
    public function deletAvatar($id) {
      $sentencia=$this->db->prepare("DELETE FROM avatars WHERE id=?");
      $sentencia->execute([$id]);
    }
  }
