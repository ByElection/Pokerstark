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
		$mesa=$this->db->prepare("SELECT * FROM mesas WHERE id_mesa = ?");
		$ok=$mesa->execute(array($id[":ID"]));
		if(!$ok){
			var_dump($mesa->errorInfo());
			die();
		}
		$mesa = $mesa->fetch(PDO::FETCH_OBJ);
		return $mesa;
	}
	public function getUser($id){
        $usuarios = $this->db->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $usuarios->execute(array($id));
        $usuario = $usuarios->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
	public function getUsuariosMesa($jugadoresmesa){
		$usuarios=array();
		foreach($jugadoresmesa as $jugador){
			$usuario=$this->db->prepare("SELECT id_usuario,username,fichas FROM usuarios WHERE id_usuario = ?");
			$ok=$usuario->execute(array($jugador->id_usuario));
			if(!$ok){
				var_dump($usuario->errorInfo());
				die();
			}
			$usuario = $usuario->fetch(PDO::FETCH_OBJ);
			array_push($usuarios,$usuario);
		}
		return $usuarios;
	}
	public function getCiegasX($id){
		$ciegas = $this->db->prepare("SELECT * FROM ciegas WHERE id_ciegas = ?");
		$ok=$ciegas->execute(array($id));
		if(!$ok){
			var_dump($ciegas->errorInfo());
			die();
		}
		$ciegas = $ciegas->fetch(PDO::FETCH_OBJ);
		return $ciegas;
	}
    public function getJugadoresMesa($id){
    	$mesas = $this->db->prepare("SELECT * FROM jugadores WHERE id_mesa = ?");
    	$ok=$mesas->execute(array($id[":ID"]));
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
	public function pararse($id){
		$jugadores = $this->db->prepare("DELETE FROM jugadores WHERE id_usuario = ?");
		$jugadores->execute(array($id));
		header("Location: " . TABLES);
	}
	public function sentarse($id_usuario,$fichas,$id_mesa){
		$jugadores= $this->db->prepare("INSERT INTO jugadores (id_usuario,fichas_mesa,id_mesa) VALUES (?,?,?)");
		  $ok=$jugadores->execute(array($id_usuario,$fichas,$id_mesa));
		  if(!$ok){
			var_dump($jugadores->errorInfo());
			die();
		  }
		  header("Location: " . MESA . "/" . $id_mesa);
	}
  }
?>
