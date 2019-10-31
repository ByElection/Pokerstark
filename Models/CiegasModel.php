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

    public function getCiegasById($id){
      $ciegas = $this->db->prepare("SELECT * FROM ciegas WHERE id_ciegas = ?");
      $ciegas->execute(array($id));
      $ciegas = $ciegas->fetch(PDO::FETCH_OBJ);
      return $ciegas;
    }

    public function addCiega($ciega_chica,$ciega_grande) {
        $sentencia = $this->db->prepare("INSERT INTO ciegas(ciega_chica,ciega_grande) VALUES(?,?)");
        $sentencia->execute(array($ciega_chica,$ciega_grande));
    }

    public function deletCiega($id) {
        $sentencia = $this->db->prepare("DELETE FROM ciegas WHERE id_ciegas=?");
        $ok=$sentencia->execute(array($id));
    }

    public function editCiega($id,$ciega_chica,$ciega_grande) {
        $sentencia =  $this->db->prepare("UPDATE ciegas SET ciega_chica=?,ciega_grande=? WHERE id_ciegas=?");
        $sentencia->execute(array($ciega_chica,$ciega_grande,$id));
    }

  }
?>
