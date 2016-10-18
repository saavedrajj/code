<?php
// Ejemplo #4 Autocarga con manejo de excepciones para 5.3.0+: Excepción personalizada ausente
spl_autoload_register(function ($nombre) {
    echo "Intentando cargar $nombre.<br/>";
    throw new ExcepciónAusente("Imposible cargar $nombre.");
});

try {
    $obj = new ClaseNoCargable();
} catch (Exception $e) {
    echo $e->getMessage(), "<br/>";
}
?>
