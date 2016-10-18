<?php
//creamos nuestra primera clase
class Persona {
	
	//Creamos los atributos
	private $nombre=array();
	private $edad;

	//Creamos los métodos
	function iniciar_nombre($nom) {
		$this->nombre=$nom;
	}

	function iniciar_edad($e) {
		$this->edad=$e;
	}		

	function mostrar_nombre() {
		//return count($this->nombre);
		return $this->nombre;
	}
	function mostrar_edad() {
		//return count($this->nombre);
		return $this->edad;
	}

	function contar_nombres() {
		return count($this->nombre);
	}
	
}
// Creamos una instancia de la clase persona
$persona = new Persona();
//hola
?>
