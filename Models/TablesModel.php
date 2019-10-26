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
      $mesas = $mesas->fetchAll(PDO::FETCH_OBJ);
      return $mesas;
    }

    public function getMesa($id){
      $mesas = $this->db->prepare("SELECT * FROM jugadores WHERE id_mesa = ?");
      $ok=$mesas->execute(array($id));
	  if(!$ok){
			var_dump($mesas->errorInfo());
			die();
		  }
      $mesa = $mesas->fetchAll(PDO::FETCH_OBJ);
      return $mesa;
    }
	public function getCiegas(){
		$ciegas = $this->db->prepare("SELECT * FROM ciegas");
		$ok=$ciegas->execute();
		if(!$ok){
			var_dump($ciegas->errorInfo());
			die();
		}
		$ciegas = $ciegas->fetchAll(PDO::FETCH_OBJ);
		return $ciegas;
	}
	public function getJugadores(){
		$jugadores = $this->db->prepare("SELECT * FROM jugadores");
		  $ok=$jugadores->execute();
		  if(!$ok){
			var_dump($jugadores->errorInfo());
			die();
		  }
		  $jugadores = $jugadores->fetchAll(PDO::FETCH_OBJ);
		  return $jugadores;
	}

  }
?>
