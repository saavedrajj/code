<?php 
class MyClass {
	// Class properties
	public $prop1 = "I'm a class property!";
	
	// Class methods
	public function setProperty($newval) {
		$this->prop1 = $newval;
	}

	public function getProperty() {
		return $this->prop1 . "<br/>";
	}
}

// Create two objects
$obj1 = new MyClass;
$obj2 = new MyClass;

// Get the value of $prop1 from both objects
echo $obj1->getProperty(); 
echo $obj2->getProperty(); 

// Set new values for both objects
$obj1->setProperty("I'm a new property value!"); 
$obj2->setProperty("I belong to the second instance"); 

// Output both objects $prop1 value
echo $obj1->getProperty();
echo $obj2->getProperty();
?>