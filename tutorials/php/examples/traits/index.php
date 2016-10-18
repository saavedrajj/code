<?php
trait MiTrait {
	public function metodoUno() {
		echo "Método uno.";
	}
	public function metodoDos() {
		echo "Método dos.";
	}
}
trait MiTrait2 {
	public function metodoTres() {
		echo "Método tres.";
	}
}

class MiClase {
	use MiTrait, MiTrait2;

	public function __construct() {
		$this->metodoUno();
	}
	//abstract public metodoAbstracto();
}

$obj = new MiClase();
