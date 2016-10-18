<?php
class Persona {
  private $nombre;
  private $apellido;

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }
  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }
  public function getNombreCompleto() {
    return $this->nombre . " " . $this->apellido;
  }
}
class Empleado extends Persona {
  private $sueldo;
  private $titulo;

  public function __construct($titulo,$nombre, $apellido, $sueldo) {
    $this->setNombre($nombre);
    $this->setApellido($apellido);
    $this->sueldo = $sueldo;
    $this->titulo = $titulo;
  }
  public function getSueldo() {
    return "$" . $this->sueldo;
  }
  public function getNombreCompleto()
  {
    return $this->titulo . " " . parent::getNombreCompleto();
  }
}
// creo un objeto de la clase Empleado
$juan = new Empleado("Gerente","Robert", "Smith", "6000");

// muestro el nombre y apellido
echo "Empleado: " . $juan->getNombreCompleto() . "<br />";

// muestro el sueldo
echo "Sueldo: " . $juan->getSueldo();
?>
