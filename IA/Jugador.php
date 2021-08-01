<?php
include_once('./Models/JugadoresModel.php');

class Jugador{
  private $model;
  private $id;
  private $fichas;
  private $apuesta;
  private $mesa;
  private $silla;
  private $cartas;
  private $retirado;

  function __construct($jugador){
    $this->model = new JugadoresModel();
    $this->id = $jugador->id_usuario;
    $this->fichas = $jugador->fichas_mesa;
    $this->apuesta = $jugador->apuesta;
    $this->mesa = $jugador->id_mesa;
    $this->silla = $jugador->silla;
    $this->retirado = $jugador->retirado;
    if ($this->cartas==NULL) {
      $this->cartas = array();
    }else {
      $this->cartas = json_decode($jugador->cartas,true);
    }
  }
  public function agarraCarta($carta){
    array_push($this->cartas,$carta);
    $this->guardarJugador();
  }
  public function apostar($fichas){
    if ($fichas<=$this->fichas) {
      $this->fichas -= $fichas;
      $this->apuesta += $fichas;
      $this->guardarJugador();
    }else{
      echo "no me quieras hackear";
    }
  }
  public function retirarse(){
    $this->cartas = array();
    $this->retirado = 1;
    return entregarApuesta();
  }
  public function entregarApuesta(){
    $aux=$this->apuesta;
    $this->apuesta=0;
    $this->guardarJugador();
    return $aux;
  }
  public function recivePozo($pozo){
    $this->fichas += $pozo;
  }
  private function guardarJugador(){
    $cartas = json_encode($this->cartas);
    $this->model->guardarJugador($this->id,$this->fichas,$this->apuesta,$cartas,$this->retirado);
  }
  public function getCartas(){
    return $this->cartas;
  }

}

 ?>
