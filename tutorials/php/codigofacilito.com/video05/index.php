<?php
/*
public: se puede realizar de todocon el 
*/

class Facebook {
	// Atributos
	public $nombre;
	public $edad;
	protected $pass;

	// Métodos
	public function __construct($nombre, $edad, $pass) {
		$this->nombre = $nombre;
		$this->edad = $edad;
		$this->pass = $pass;
	}

	public function verInformacion (){
		echo "Nombre: " . $this->nombre . "<br/>";
		echo "Edad: " . $this->edad . "<br/>";
		$this->cambiarPass("54321");
		echo "Contraseña: " . $this->pass . "<br/>";			
	}

	private function cambiarPass($pass) {
		$this->pass = $pass;
	}
}

$facebook = new Facebook("Carlos Fernandes",20,"1234");
//$facebook->verInformacion();
//echo $facebook->nombre;
//echo $facebook->pass;
$facebook->verInformacion();
?>