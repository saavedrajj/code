<?php 
class Pagina {
	private $titulo;
	private $posicion;

	public function iniciar($tit,$pos) {
		$this->titulo=$tit;
		$this->posicion=$pos;
	}
	public function imprimir() {
		echo "<div align='".$this->posicion."'>".$this->titulo."</div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Video 2</title>
</head>
<body>
	<?php
	$pa = new Pagina();
	$pa->iniciar("titulo de prueba","center");
	$pa->imprimir();
	?>
</body>
</html>