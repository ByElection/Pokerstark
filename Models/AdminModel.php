<?php
  class AdminModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
    }

    public function addMesa($ciegas,$pozo,$sillas) {
        $sentencia = $this->db->prepare("INSERT INTO mesa(id_ciegas,pozo, sillas) VALUES(?,?,?)");
        $sentencia->execute(array($ciegas,$pozo,$sillas));
    }

    public function editMesa($id,$ciegas,$pozo,$sillas) {
        $sentencia =  $this->db->prepare("UPDATE mesa SET ciegas=?, pozo=?, sillas=? WHERE id=?");
        $sentencia->execute(array($ciegas, $pozo, $sillas, $id));
    }

    public function deletMesa($id) {
        $sentencia = $this->db->prepare("DELETE FROM mesa WHERE id=?");
        $sentencia->execute(array($id));
    }
}
