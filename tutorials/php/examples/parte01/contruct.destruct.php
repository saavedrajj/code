<?php
/*
* Clase Auto
* http://www.nebaris.com/post/97/metodos-magicos-en-php-parte-1
*/
class Auto
{
  // Propiedades
  private $ruedas;
  private $propietario;

  public function __construct() {
    $this->propietario = "Sin dueño";
    $this->ruedas = 4;
  }

  public function getRuedas() {
    return $this->ruedas;
  }
  public function getPropietario() {
    return $this->propietario;
  }
  public function setPropietario($nombre) {
    if (is_string($nombre)) {
      $this->propietario = $nombre;
    }
  }
  public function __destruct()
  {
    echo 'El objeto fue destruido';
  }
}
// objeto

$miAuto = new Auto;
//$otroAuto = new Auto;
//$tercerAuto = new Auto;

echo "Propietario: " . $miAuto->getPropietario() . "<br />";
$miAuto->setPropietario("Gabriel");
echo "Propietario: " . $miAuto->getPropietario() . "<br/>";
//$otroAuto->setPropietario("Pedro");
//echo "Propietario: " . $otroAuto->getPropietario() . "<br/>";
//$tercerAuto->setPropietario("Antonio");
//echo "Propietario: " . $tercerAuto->getPropietario() . "<br/>";
?>
