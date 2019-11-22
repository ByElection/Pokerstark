<?php
class Mazo {
  private const PALOS = array('P','C','T','D');
  private const VALORES = array('1','2','3','4','5','6','7','8','9','10','11','12','13');
  private $cartas;

  function __construct(){
    $this->generarMazo();
  }
  public function generarMazo(){
    $this->cartas = array();
    foreach (Mazo::PALOS as $palo) {
      foreach (Mazo::VALORES as $valor) {
        $aux = array('palo' => $palo, 'valor' => $valor);
        array_push($this->cartas,$aux);
      }
    }
  }
  public function mezclar(){
    shuffle($this->cartas);
  }
  public function getCartas(){
    return $this->cartas;
  }
  public function darCarta(){
    $carta = array_shift($this->cartas);
    return $carta;
  }
}

 ?>
