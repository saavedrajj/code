<?php
$_GET['action'];

function autoload($clase) {
	//include "clases/" . $clase . ".php";
	include $_GET['action'] . "/" . $clase . ".php";
}

spl_autoload_register('autoload');

Auto::mostrar("Hola mundo");
Persona::mostrar("CodigoFacilito");