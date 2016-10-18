<?php 
class MyClass {
	// Class properties
	public $prop1 = "I'm a class property!";

	// Class methods  
	public function __construct() {
		echo 'The class "', __CLASS__, '" was initiated!<br/>';
	}

	public function __destruct() {
		echo 'The class "', __CLASS__, '" was destroyed.<br />';
	}

	public function __toString() {
		echo "Using the toString method: ";
		return $this->getProperty();
	}

	public function setProperty($newval) {
		$this->prop1 = $newval;
	}

	public function getProperty() {
		return $this->prop1 . "<br/>";
	}
}

// Create a new object
$obj1 = new MyClass;

// Output the object as a string
echo $obj1;

// Destroy the object
unset($obj1);

// Output a message at the end of the file
echo "End of file.<br />";
?>