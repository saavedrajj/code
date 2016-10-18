<?php
class Auto
{
  private $marca;
  private $modelo;

  public function __construct()
  {
    $this->marca = "Renault";
    $this->modelo = "Clio";
  }
  public function getDescripcion()
  {
    return $this->marca . " " . $this->modelo;
  }

  public function __toString() {
    return $this->getDescripcion();
  }
}

// creo un objeto de la clase Auto
$miAuto = new Auto;

// muestro el objeto como un String
echo $miAuto;

?>
