<?php
/*
Methods Visibility 

Class methods may be defined as public, private, or protected. Methods declared without any explicit visibility keyword are defined as public. 
*/

/**
 * Define MyClass
 */
class MyClass {
	// Declare a public constructor
	public function __construct() {}

	// Declare a public method
	public function MyPublic() {
		echo "MyPublic function<br/>";
	}

	// Declare a private method
	private function MyPrivate() {
		echo "MyPrivate function<br/>";		
	}

	// Declare a protected method
	protected function MyProtected() {
		echo "MyProtected function<br/>";		
	}

	// This is public 
	function Foo() {
		$this->MyPublic();
		$this->MyPrivate();
		$this->MyProtected();
	}

}

$myclass = new MyClass;
//$myclass->MyPublic(); // Works
//$myclass->MyPrivate(); // Fatal Error
//$myclass->MyProtected(); // Fatal Error
$myclass->Foo();

/**
 * Define MyClass2
 */
class MyClass2 extends MyClass {
	//
	function Foo2() {
		$this->MyPublic();
		//$this->MyPrivate(); // Fatal Error
		$this->MyProtected();
	}
}

$myclass2 = new MyClass2;
//$myclass2->myPublic(); // Works
$myclass2->Foo2(); // Public and Protected work, no t Private

class Bar {
	public function test() {
		$this->testPublic();
		$this->testPrivate();		
	}

	public function testPublic() {
		echo __CLASS__."::testPublic<br/>";
	}

	private function testPrivate() {
		echo __CLASS__."::testPrivate<br/>";
	}	
}

class Foo extends Bar {
	public function testPublic() {
		echo __CLASS__."::testPublic<br/>";
	}

	public function testPrivate() {
		echo "Foo::testPrivate<br/>";
	}
}

$myFoo = new Foo();
$myFoo->test(); // Bar::testPrivate
				// Foo::testPublic