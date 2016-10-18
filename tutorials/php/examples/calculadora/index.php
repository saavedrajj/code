<?php

class Calculadora {
	// Atributos
	public $numero01;
	public $numero02;

	public function __construct($num01,$num02) {
		$this->numero01=$num01;
		$this->numero02=$num02;
	}

	// Métodos
	public function sumar() {
		return $this->numero01 + $this->numero02;
	}

	public function restar() {
		return $this->numero01 - $this->numero02;
	}

	public function multiplicar() {
		return $this->numero01 * $this->numero02;
	}http://www.cumlouder.com/girl/nekane/

	public function dividir() {
		return $this->numero01 / $this->numero02;
	}
}

$calc = new Calculadora(8,2) ;
echo "<h2>Sumar</h2>".$calc->sumar()."<br/>";

$calc = new Calculadora(8,2) ;
echo "<h2>Restar</h2>".$calc->restar()."<br/>";

$calc = new Calculadora(8,2) ;
echo "<h2>Multiplicar</h2>".$calc->multiplicar()."<br/>";

$calc = new Calculadora(8,2) ;
echo "<h2>Dividir</h2>".$calc->dividir()."<br/>";