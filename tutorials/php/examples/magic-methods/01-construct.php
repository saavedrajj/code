<?php
//__construct is called when an object of a class is created. It is the first method which is called when object is created.
class BaseClass {
	function __construct() {
		echo "In BaseClass constructor<br/>";
	}
}

class SubClass extends BaseClass {
	function __construct() {
       //parent::__construct();
		echo "In SubClass constructor<br/>";
	}
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}

// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();
?>