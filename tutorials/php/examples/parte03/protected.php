<?php
class Animal {
  protected $patas =4;

  protected function setPatas($cantidad) {
    $this->patas = $cantidad;
  }
  function getPatas() {
    return $this->patas."<br/>";
  }
}

class Gato extends Animal {
  public function establecerPatas($patas) {
    $this->setPatas($patas);
  }
}

//creamos el objeto
$bolaDeNieve = new Gato();
// llamamos al getter
echo "Cantidad de patas: " . $bolaDeNieve->getPatas();
// utilizamos el método que llama a setPatas
$bolaDeNieve->establecerPatas(3);
//mostramos la nueva cantidad de patas
echo 'Cantidad de patas: ' . $bolaDeNieve->getPatas();
?>
