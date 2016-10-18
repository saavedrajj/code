<?php
trait Persona2 {
	public $nombre;

	public function mostrarNombre() {
		echo $this->nombre;
	}

	abstract function asignarNombre($nombre);
}

trait Trabajador {
	protected function Hola() {
		echo " es del trabajador";
	}
}

class Persona {
	use Persona2, Trabajador;
	public function asignarNombre($nombre) {
		$this->nombre=$nombre;
	}
	public function Hola(){
		echo " es de la clase";
	}
}
$persona = new Persona();
$persona->asignarNombre("Carlos");
//echo $persona->nombre;
$persona->mostrarNombre();
//$persona->mensaje();
$persona->Hola();