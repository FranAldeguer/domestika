<?php

// Configura la salida de errores por pantalla
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

setlocale( LC_TIME, 'es', 'spa', 'es_ES' );
date_default_timezone_set( 'Australia/Sydney' );

// Conexión a la base de datos
$host = 'localhost';
$user = $password = 'root';
$database = 'microcms';
$port = '8889';

$app_db = mysqli_connect( $host, $user, $password, $database, $port );
if ( $app_db === false ) {
	die( 'Error al conectar con la base de datos' );
}

require( 'inc/posts.php' );
