<?php
class MiClase {
  public static $cantidadDeObjetos = 0;

  public function __construct()
  {
    ++self::$cantidadDeObjetos;
  }
}

// al llamar a una propiedad estática
// el signo $ va después de los :
echo 'Cantidad de objetos: ' . MiClase::$cantidadDeObjetos . '<br />';
$obj1 = new MiClase();
echo 'Cantidad de objetos: ' . MiClase::$cantidadDeObjetos . '<br />';
$obj2 = new MiClase();
echo 'Cantidad de objetos: ' . MiClase::$cantidadDeObjetos . '<br />';
echo 'Cantidad de objetos: ' . $obj2::$cantidadDeObjetos . ', mostrando desde el objeto';
?>
