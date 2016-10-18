<?php
abstract class Fruit {
	private $color;

	abstract public function eat();
		

	public function setColor($c) {
		$this->color = $c;
	}
}

class Apple extends Fruit {
	public function eat() {
		// chew until core
		echo "eating apple<br/>";
	}
}

class Orange extends Fruit {
	public function eat() {
		// peel
		// chew
		echo "eating orange<br/>"; 
	}
}

$apple = new Apple();
$apple->eat();

//$fruit= new Fruit();
$fruit::eat();