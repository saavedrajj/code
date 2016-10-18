<?php 
class MyClass {
	// Class properties
	public $prop1 = "I'm a class property!";

	// Class methods
	public function __construct() {
		echo 'The class "', __CLASS__, '" was initiated!<br/>';
	}

	public function setProperty($newval) {
		$this->prop1 = $newval;
	}

	public function getProperty() {
		return $this->prop1 . "<br/>";
	}
}

// Create a new objects
$obj1 = new MyClass;

// Get the value of $prop1 
echo $obj1->getProperty(); 

// Output a message at the end of the file
echo "End of file.<br />";
?>