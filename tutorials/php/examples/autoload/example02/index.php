<?php
spl_autoload_register(function($nombre) {
	var_dump($nombre);
});

class Foo implements IPrueba{}