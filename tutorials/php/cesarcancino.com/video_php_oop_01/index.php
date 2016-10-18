<?php require_once("class/class.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Title</title>
</head>
<body>
	<?php
	$persona->iniciar_nombre("Juan José Saavedra Macco");
	$persona->iniciar_edad("41");
	echo "Nombre: " . $persona->mostrar_nombre()."<br>";
	echo "Edad: " . $persona->mostrar_edad()."<br>";	
	echo "Nomero de personas: " . $persona->contar_nombres();
	?>
</body>
</html>