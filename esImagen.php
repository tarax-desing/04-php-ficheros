<?php
/* comprueba si un archivo es de tipo img, los tipos válidos son : jpg, jpeg, png, gif, bmp, y svg
se ponen con la @param  string $rutaCompleta la ruta completa del archivo.
devuelve: un booleano.... @return bool indica si el archivo es una imagen o no.

*/
function esImagen($rutaCompleta)
{
    // {
//     $rutaCompleta = $directorio . $ruta;
    $extension = strtolower(pathinfo($rutaCompleta, PATHINFO_EXTENSION));
    $validImageExtensions = [

        'jpg',
        'jpeg',
        'png',
        'gif',
        'bmp',
        'webp',
        'svg',
    ];
    return in_array($extension, $validImageExtensions);
}


