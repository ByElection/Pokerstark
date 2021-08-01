<?php
include_once('./Models/MesasModel.php');

class Mazo {
  private const PALOS = array('P','C','T','D');
  private const VALORES = array('1','2','3','4','5','6','7','8','9','10','11','12','13');
  private $cartas;
  private $modelmesas;

  function __construct(){
    $this->modelmesas = new MesasModel();
  }
  public function generarMazo($id){
    $this->cartas = array();
    foreach (Mazo::PALOS as $palo) {
      foreach (Mazo::VALORES as $valor) {
        $aux = array('palo' => $palo, 'valor' => $valor);
        array_push($this->cartas,$aux);
      }
    }
    $this->mezclar();
    $this->guardarMazo($id);
  }
  private function mezclar(){
    shuffle($this->cartas);
  }
  public function getCartas(){
    return $this->cartas;
  }
  public function darCarta(){
    $carta = array_shift($this->cartas);
    return $carta;
  }
  public function guardarMazo($id){
    $mazo = json_encode($this->cartas);
    $this->modelmesas->setMazo($id,$mazo);
  }
  public function cargarMazo($id){
    $mazo = $this->modelmesas->getMazo($id);
    $this->cartas = json_decode($mazo->mazo,true);
  }
}

 ?>
