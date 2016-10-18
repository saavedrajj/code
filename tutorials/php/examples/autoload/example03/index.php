<?php
// Ejemplo #3 Autocarga con manejo de excepciones para 5.3.0+
spl_autoload_register(function($nombre) {
	echo "Intentado cargar $nombre<br/>";
	throw new Exception("Imposible cargar $nombre");

});

try {
	$obj = new ClaseNoCargable();
} catch (Exception $e){
	echo $e->getMessage(), "<br/>";
}