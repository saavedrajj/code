<?php
/**
 * Define Vehiculo
 */
class Vehiculo {
	// Atributos
	public $motor = false;
	public $marca;
	public $color;
	
	// Métodos
	protected function estado() {
		if ($this->motor) 
			echo 'El motor está encendido<br/>';
		else 
			echo 'El motor está apagado<br/>';			
		
	}

	public function encender() {
		if ($this->motor) {
			echo "Cuidado, el motor está encendiendo<br/>";

		} else{ 
			echo 'El motor ahora está encendido<br/>';
			$this->motor=true;			
		}
	}

}

/**
 * Define Moto
 */
class Moto extends Vehiculo {
	public function estadoMoto () {
		$this->estado();
	}
}

class CuatriMoto extends Moto {

}
/*
$vehiculo = new Vehiculo();
$vehiculo->estado();
$vehiculo->encender();
$vehiculo->estado();

$moto = new Moto();
$moto->estadoMoto();
*/
$cuatrimoto = new Cuatrimoto();
$cuatrimoto->estadoMoto();
