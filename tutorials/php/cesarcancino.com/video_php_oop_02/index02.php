<?php 
class Pagina {
	private $titulo;
	private $posicion;

	public function __construct($tit,$pos){
		$this->titulo=$tit;
		$this->posicion=$pos;
	}
	public function imprimir() {
		?>
		<div align="<?php echo $this->posicion; ?>"><?php echo $this->titulo; ?></div>
		<?php
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
	$pa = new Pagina("prueba con constructures","center");
	$pa->imprimir(); 
	?>
</body>
</html>