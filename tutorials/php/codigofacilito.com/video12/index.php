<?php

//require_once "api/Models/Persona.php";
//require_once "api/Controllers/PersonaController.php";


spl_autoload_register(function($clase) {
	//print $clase;
	$ruta = "api/" . str_replace("\\", "/", $clase) . ".php";
	//print $ruta;
	if (is_readable($ruta)) {
		require_once $ruta;
	} else {
		echo "el archivo no existe<br/>";
	}
});

Models\Persona::Hola();
Controllers\PersonaController::Hola();