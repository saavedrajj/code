<?php
//__get() is called when the object of a class try to read a property or variable that is inaccessible or unavailable.
class Animal
{
	public $name;

	public function __get($var){
		echo "Unavailable $var<br/>";
				//trigger_error('Undefined property via __get:' . $var);
	}
}

$dog = new Animal(); // __construct() is called
echo $dog->genre; // $genre is not available so __get() is called
echo $dog->fur; // $genre is not available so __get() is called
