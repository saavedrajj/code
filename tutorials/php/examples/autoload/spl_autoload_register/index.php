<?php

function mi_autocargador($clase) {
	include "clases/" . $clase . ".clase.php";
}

spl_autoload_register("mi_autocargador");

// funcion anónima a partir de php 5.3.0

spl_autoload_register(function($clase) {
	include "clases/" . $clase . ".clase.php";
});