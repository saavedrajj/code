<?php
class Persona {
	// Artributos
	public $nombre=array();
	public $apellido=array();

	// Métodos
	public function guardar($nombre, $apellido) {
		$this->nombre[] = $nombre;
		$this->apellido[] = $apellido;		
	}

	public function mostrar() {
		for ($i = 0; $i < count($this->nombre);$i++) {
			self::formato($this->nombre[$i], $this->apellido[$i]);
			//Persona::formato($this->nombre[$i], $this->apellido[$i]);
			//$this->formato($this->nombre[$i], $this->apellido[$i]);	
		}
	}

	public function formato($nombre, $apellido) {
		echo "Nombre: " . $nombre . " - Apellido: " . $apellido . "<br/>";
	}


}
$persona = new Persona();
$persona ->guardar("Juan", "Saavedra");
$persona ->guardar("Jose", "Macco");	
$persona->mostrar();