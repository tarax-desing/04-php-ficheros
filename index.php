<?php
// mostrar lista de archivos del directorio
//variable con el nomb de directorio
require 'esImages.php';
$directorio = 'imagenes/';


//funcion para comprobar si un archivo es una img
// function esImagen($directorio, $ruta)
// {
//     $rutaCompleta = $directorio . $ruta;
//     $tipoMime = mime_content_type($rutaCompleta);

//     echo "Tipo mime $tipoMime";
//     return strpos($tipoMime, 'image/') === 0;
// }
//función par mostrar las img
function mostrarImagen($directorio, $imagen)
{
    echo "<img src='$directorio$imagen' alt='imagen de prueba' width='200px'>";
}
//comprobamos si el directorio existe
if (is_dir($directorio)) {
    if ($dh = opendir($directorio)) {
        echo "<h1>Archivos de imagen en el directorio $directorio</h1>";
        echo "<ul>";
        //leemos cada entrada del directorio




        while (($archivo = readdir($dh)) !== false) {
            if ($archivo != "." && $archivo != "..") {
                $rutaCompleta = $directorio . $archivo;
                if (esImagen($rutaCompleta)) {
                    echo "<li>$archivo</li>";
                    echo "<li>";
                    mostrarImagen($directorio, $archivo);
                    echo "</li>";
                }
            }

        }
        echo "</ul>";
    }
} else {
    echo "EL DIRECTORIO $directorio NO EXISTE.";
}