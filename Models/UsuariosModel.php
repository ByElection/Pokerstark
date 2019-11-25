<?php
  class UsuariosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=pokerstark;charset=utf8', 'root', '');
    }

    public function getUserByUsername($user){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE username = ?");
        $sentencia->execute(array($user));
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    public function getUserById($id){
      $sentencia = $this->db->prepare( "SELECT * FROM usuarios WHERE id_usuario = ?");
      $sentencia->execute(array($id));
      $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
      return $usuario;
    }

    public function getUsernameById($id){
      $sentencia = $this->db->prepare( "SELECT username FROM usuarios WHERE id_usuario = ?");
      $sentencia->execute(array($id));
      $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
      return $usuario;
    }

    public function addUsuario($user,$password,$nombre,$apellido,$pais){
      $password =  password_hash($password, PASSWORD_DEFAULT);
      $usuarios = $this->db->prepare("INSERT INTO usuarios (username, password, nombre, apellido, pais) VALUES (?,?,?,?,?)");
      $usuarios->execute(array($user,$password,$nombre,$apellido,$pais));
    }

    public function getUsuariosMesa($jugadoresmesa){
      $usuarios=array();
      foreach($jugadoresmesa as $jugador){
        $usuario=$this->db->prepare("SELECT id_usuario,username,fichas FROM usuarios WHERE id_usuario = ?");
        $usuario->execute(array($jugador->id_usuario));
        $usuario = $usuario->fetch(PDO::FETCH_OBJ);
        array_push($usuarios,$usuario);
      }
      return $usuarios;
    }

    public function getUsersRanking(){
          $usuarios = $this->db->prepare("SELECT username,fichas FROM usuarios ORDER BY fichas DESC");
          $usuarios->execute();
          $usuario = $usuarios->fetchAll(PDO::FETCH_OBJ);
          return $usuario;
    }
    public function addFichas($id,$fichas){
      $sentencia =  $this->db->prepare("UPDATE usuarios SET fichas=? WHERE id_usuario=?");
      $sentencia->execute(array($fichas,$id));
    }
    public function getAvatar($id){
      $sentencia = $this->db->prepare( "SELECT id_avatar FROM usuarios WHERE id_usuario = ?");
      $sentencia->execute(array($id));
      $avatar = $sentencia->fetch(PDO::FETCH_OBJ);
      return $avatar;
    }
    public function setAvatar($userid,$avatarid){
        $sentencia = $this->db->prepare("UPDATE usuarios SET id_avatar=? WHERE id_usuario=?");
        $sentencia->execute([$avatarid,$userid]);
    }
  }
 ?>
