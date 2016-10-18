<?php 
/**
 Las clases abstractas se declaran con la instrucción “abstract”, estas no necesitan ser instanciadas, así que podemos acceder a sus métodos de forma similar a la que se accedería a un método estático. 

 Por lo general declaramos una clase como abstracta cuando sabemos que no ha de ser instanciada y que su función es servir de clase “padre” a otra clase mediante la herencia, donde la clase “hija” si será instanciada.
 */
abstract class ClaseAbstracta {
	public function miMetodo() {
		echo "Método de una clase abstracta.<br/>";
	}
}

//$abs=new ClaseAbstracta();
//$abs->miMetodo();

ClaseAbstracta::miMetodo();

class ClaseHija extends ClaseAbstracta{
	public function miMetodoDos() {
			echo "Otro método de una clase abstracta.<br/>";	
	}
}

$abs=new ClaseHija();
$abs->miMetodo();
$abs->miMetodoDos();

