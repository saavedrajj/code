<?php
//__set() is called when code tries to set a method that is not accessible.
class student{
	public $age;
	public function __set($name, $val) {
		$this->$name = $val;
	}   
	public function display(){
		echo $this->age;
	}
}
$stu = new student;
$stu->age = 5;
$stu->display();