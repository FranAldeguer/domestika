<?php

if(isset($_POST['llega'])){

  echo $_FILES['image-input']['name'] . "<br>"; // nombre del fichero subido
  echo $_FILES['image-input']['tmp_name'] . "<br>"; // Nombre temporal
  echo $_FILES['image-input']['type'] . "<br>"; // Tipo de fichero
  echo $_FILES['image-input']['size'] . "<br>"; // Tamaño en bytes x/1024 = kb || kb / 1024 = MB
  echo $_FILES['image-input']['error'] . "<br>"; //Codigos de error de la subida (0 = ok)

  echo "<br><br><br>";

  echo "\$_SERVER['SCRIPT_NAME']: ";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";

echo "\$_SERVER['PHP_SELF']: ";
echo $_SERVER['PHP_SELF'];
echo "<br>";

echo "\$_SERVER['SCRIPT_FILENAME']: ";
echo $_SERVER['SCRIPT_FILENAME'];
echo "<br>";

echo "basename(__FILE__): ";
echo basename(__FILE__);
echo "<br>";

echo "basename(__FILE__, '.php'): ";
echo basename(__FILE__, '.php');
echo "<br>";

echo "basename(\$_SERVER['PHP_SELF'], '.php'): ";
echo basename($_SERVER['PHP_SELF'], '.php');
echo "<br>";

echo "basename(\$_SERVER['PHP_SELF']): ";
echo basename($_SERVER['PHP_SELF']);
echo "<br>";

echo "pathinfo(__FILE__, PATHINFO_FILENAME): ";
echo pathinfo(__FILE__, PATHINFO_FILENAME);
echo "<br>";

echo "<br><br><br>";


  $extensiones = array(0 => 'image/jpg', 1=>'image/jpeg', 2=>'image/png' );

  $maxSize = 1024 * 10224 * 8;

  $ruta_indexphp = dirname(realpath(__FILE__));
  $origen = $_FILES['image-input']['tmp_name'];
  // $destino = $ruta_indexphp . '/imagenes/' . $_FILES['image-input']['name'];
  $fecha = date("YmdHis_");
  $destino = $ruta_indexphp . '/imgs/' . $fecha . $_FILES['image-input']['name'];

  echo "<br><br>";
  echo "Ruta index : " . $ruta_indexphp;
  echo "<br><br>";
  echo "Origen: ". $origen;
  echo "<br><br>";
  echo "Destino; " . $destino;
  echo "<br><br>";

  if(in_array($_FILES['image-input']['type'], $extensiones)){
    echo "Es una imagen<br><br>";

    if($_FILES['image-input']['size'] < $maxSize){
      echo "Pesa menos de 1MB";

      if( move_uploaded_file ( $origen, $destino ) ) {
              echo 'Fichero guardado con éxito';
         }
    }

  }
}
 ?>
