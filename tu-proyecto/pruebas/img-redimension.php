<?php require('../init.php');?>

<?php
if (isset($_POST['enviar-img']) || isset($_FILES['image-input'])) {
    
    $img_input = $_FILES['image-input'];
    $img_name = "IMG_" . date("Ymd_His");
    $img_dir = '../pruebas/imgs/';
    
    redimensionarImg($img_input, 500, 500, $img_name, $img_dir); // En helpers.php
    redimensionarImg($img_input, 400, 250, $img_name, $img_dir);
    
    imgToServer($img_input, $img_name, $img_dir);
    
    
    
    /*
    // Array de tipos de archivo que admitimos en nuestro servidor
    $extensiones = array(
        0 => 'image/jpg',
        1 => 'image/jpeg',
        2 => 'image/png',
        3 => 'image/gif'
    );
    
    
    // Tamaño máximo del archivo en bits 1MB
    $maxSize = 1024 * 1024 * 8;
    // Cogemos la ruta del servidor, que luego nos servirá para seleccionar la carpeta de destino
    $ruta_server = dirname(realpath(__FILE__));
    // Nombre y ruta temporal
    $origen = $_FILES['image-input']['tmp_name'];
    // El nombre de la imagen es IMG_fecha_hora.jpg
    $img_name = "IMG_" . date("Ymd_His");
    // Guardamos la extensión del archivo a parte para poder crear y llamar a varias versiones del archivo
    $extension = pathinfo($_FILES['image-input']['name'], PATHINFO_EXTENSION);
    //Nombre de la carpeta que contiene las imágenes
    $img_dir = 'imgs/';
    
    // Ruta de destino a la carpeta del servidor donde se guardarán las fotos
    $destino = $ruta_server . '/'. $img_dir . $img_name . '-original.' . $extension;

    

    if (in_array($_FILES['image-input']['type'], $extensiones)) {

        if ($_FILES['image-input']['size'] < $maxSize) {
            redimensionarImg($_FILES['image-input'], 500, 500, $img_name, $img_dir); // En helpers.php
            redimensionarImg($_FILES['image-input'], 400, 250, $img_name, $img_dir);
            if (move_uploaded_file($origen, $destino)) {
                echo '<script>alert("Fichero guardado con éxito")</script>';
            }
        } else {
            echo '<script>alert("Archivo demasiado grande")</script>';
        }
    }

    
    
    echo "Nombre original del archivo: " . $_FILES['image-input']['name'] . "<br>"; // nombre del fichero subido
    echo "Ruta y nombre del archivo temporal: " . $_FILES['image-input']['tmp_name'] . "<br>"; // Nombre temporal
    echo "Tipo de imagen: " . $_FILES['image-input']['type'] . "<br>"; // Tipo de fichero
    echo "Tamaño del archivo en bits: " . $_FILES['image-input']['size'] . "<br>"; // Tamaño en bytes x/1024 = kb || kb / 1024 = MB
    echo "Código de error (0 = ok): " . $_FILES['image-input']['error'] . "<br>"; // Codigos de error de la subida (0 = ok)
    
    // Array de tipos de archivo que admitimos en nuestro servidor
    $extensiones = array(
    0 => 'image/jpg',
    1 => 'image/jpeg',
    2 => 'image/png',
    3 => 'image/gif'
        );
    
    
    
    // Tamaño máximo del archivo en bits 1MB
    $maxSize = 1024 * 1024 * 8;
    // Cogemos la ruta del servidor, que luego nos servirá para seleccionar la carpeta de destino
    $ruta_server = dirname(realpath(__FILE__));
    // Nombre y ruta temporal
    $origen = $_FILES['image-input']['tmp_name'];
    // El nombre de la imagen es IMG_fecha_hora.jpg
    $img_name = "IMG_" . date("Ymd_His");
    // Guardamos la extensión del archivo a parte para poder crear y llamar a varias versiones del archivo
    $extension = pathinfo($_FILES['image-input']['name'], PATHINFO_EXTENSION);
    //Nombre de la carpeta que contiene las imágenes
    $img_dir = 'imgs/';
    // Ruta de destino a la carpeta del servidor donde se guardarán las fotos
    $destino = $ruta_server . '/'. $img_dir . $img_name . '-original.' . $extension;
    
    echo "<br>";
    echo "Ruta index : " . $ruta_server;
    echo "<br>";
    echo "Origen: " . $origen;
    echo "<br>";
    echo "Destino: " . $destino;
    echo "<br>";
    echo "Extensión de archivo: " . $extension;
    echo "<br>";
    
    if (in_array($_FILES['image-input']['type'], $extensiones)) {
        echo "Es una imagen<br><br>";
        if ($_FILES['image-input']['size'] < $maxSize) {
            echo "Pesa menos de 1MB<br>";
            redimensionarImg($_FILES['image-input'], 500, 500, $img_name, $img_dir);
            redimensionarImg($_FILES['image-input'], 400, 250, $img_name, $img_dir);
            if (move_uploaded_file($origen, $destino)) {
                echo 'Fichero guardado con éxito';
            }
        } else {
            echo "Archivo muy pesado";
        }
    }
    
    
    */
    
    ?>
<img src="<?php ?>">

<?php

}
?>