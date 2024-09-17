<?php
require 'esImages.php';
require 'redimensionarImagen.php';


define("MAX_FILE_SIZE", 1 * 1024 * 1024);
define("TARGET_WIDTH", 300);
define("UPLOAD_DIR", 'uploads/');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
    $file = $_FILES['imagen'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error al subir el archivo");
    }
    if ($file['size'] > MAX_FILE_SIZE) {
        die('eL archivo es demasiado grande. max. 1MB.');
    }
    if (!esImagen($file['name'])) {
        die('El archivo no es una imagen válida');
    }
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $nombreArchivo = 'image_' . date('YmdHis') . '.' . $extension;
    $rutaDestino = UPLOAD_DIR . $nombreArchivo;
    if (!is_dir(UPLOAD_DIR)) {
        mkdir(UPLOAD_DIR, 0775, true);

    }
    redimensionarImagen($file['tmp_name'], $rutaDestino, TARGET_WIDTH);
    echo 'Imagen subida y procesada con éxito. HOMBRE YA!';


} else {
    echo '<h1>Subir archivos</h1>
<form action="" method="post" enctype="multipart/form-data">
<input type= "file" name="imagen" accept="image/*" required>
<input type= "submit" value="Subir imagen">

</form>';

}




