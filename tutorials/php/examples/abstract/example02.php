<?php
abstract class ClaseAbstracta {
	// El método abstracto sólo necesita definir los argumentos requeridos
	abstract protected function nombrePrefijo($nombre);
}

class ClaseConcreta extends ClaseAbstracta {
	// La clase derivada puede definir parámetros opcionales que no estén en la estructura del prototipo
	public function nombrePrefijo($nombre, $separador = ".") {
		if ($nombre == "Pacman") {
			$prefijo = "Mr";
		} elseif ($nombre == "Pacwoman") {
			$prefijo = "Mrs";
		} else {
			$prefijo = "";
		}
		return "{$prefijo}{$separador} {$nombre}";
	}
}

$obj= new ClaseConcreta();
echo $obj->nombrePrefijo("Pacman");
echo $obj->nombrePrefijo("Pacwoman");