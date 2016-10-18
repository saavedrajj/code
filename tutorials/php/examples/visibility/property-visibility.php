<?php
/*
Property Visibility 

Class properties must be defined as public, private, or protected. If declared using var, the property will be defined as public. 
*/

/**
 * Define MyClass
 */
class MyClass {
	public $public = 'Public';
	private $private = 'Private';
	protected $protected = 'Protected';

	function printHello() {
		echo $this->public; // Works
		echo $this->private;
		echo $this->protected;
	}

}

$obj = new MyClass();
echo $obj->public;
echo $obj->private;
echo $obj->protected;

$obj->printHello();

/**
 * Define MyClass2
 */
class MyClass2 extends MyClass {
	// We can redeclare the public and protected method, but not redeclare
	protected $protected = 'Protected 2';
}

$obj2 = new MyClass2();
echo $obj2->public; // Works
echo $obj2->private; // Undefined
echo $obj2->protected;
echo $obj2->printHello();