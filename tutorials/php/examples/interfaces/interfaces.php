<?php
interface MiInterface {
	// Interfaces no permiten declarar atributos solo métodos. Los métodos en las interfaces deben ser públicos
	public function metodoUno ($parametro);
	public function metodoDos ($parametro);
}

class MiClase implements MiInterface {

	public function metodoUno ($parametro){
		echo "metodoUno<br/>";
	}
	public function metodoDos ($parametro){
		echo "metodoDos<br/>";		
	}
}

$clase = new Miclase();
$clase->metodoUno(1);
$clase->metodoDos(2);