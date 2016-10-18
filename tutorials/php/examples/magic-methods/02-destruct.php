<?php
//__destruct is called when object of a class is destroyed
class MyDestructableClass {
	public $name;
	function __construct() {
		echo "In constructor<br/>";
		$this->name = "MyDestructableClass";
	}

	function __destruct() {
		echo "Destroying " . $this->name . "</br>";
	}
}

$obj = new MyDestructableClass();
?>