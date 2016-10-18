<?php
class Foo {
	public static function aStaticMethod() {
		// ...
	}
}

Foo::aStaticMethod();
$classname = new Foo;
$classname->aStaticMethod();