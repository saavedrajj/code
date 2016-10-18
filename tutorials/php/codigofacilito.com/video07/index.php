<?php
class Pagina {
	//Atributos
	public $nombre = 'Código facilito';	
	public static $url = 'www.codigofacilito.com';

	// Métodos
	public function bienvenida() {
		echo 'Bienvenidos a <b>'.$this->nombre . "</b>  la página es <b>" . Pagina::$url . "<b/><br/>";
	}

	public static function bienvenida2() {
		//echo "Bienvenidos a " . $this->nombre;
		echo "Bienvenidos a " . self::$url;
	}

}

class Web extends Pagina {

}

	//$pagina = new Pagina();
	//$pagina->bienvenida();
Web::bienvenida2();
