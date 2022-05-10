<?php 

$texto = "Toy encriptao";

var_dump( $texto );

$var_encriptada = password_hash($texto, 1);

var_dump($var_encriptada);
 
if(password_verify("Toy encriptao", $var_encriptada)){
    echo "Son iguales";
}else {
    echo "no son iguales";
}
?>