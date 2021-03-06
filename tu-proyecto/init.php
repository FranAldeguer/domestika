<?php

if( ! file_exists( __DIR__ . '/config.php' )){
  die( 'ERROR: No existe el fichero config.php' );
}

session_start();

require 'config.php';

error_reporting(E_ALL);
ini_set ( 'display_errors', 1);
// Configuración de la zona horaria
setlocale( LC_TIME, SITE_LANG);
date_default_timezone_set(SITE_TIMEZONE);


/*
 * La función mysqli_connect devuelve un RECURSO
 * Este recurso, si hubiera un error en la conexión, devolvería FALSE

$app_db = mysqli_connect ( DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT );
if ($app_db == false){
  die("Error al conectar con la base de datos");
}
*/


require('inc/class-db.php');
require('inc/class-user.php');
//require('inc/posts_sinPOO.php');
require('inc/class-post.php');
require('inc/helpers.php');

$app_db = new Db(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);

if(isset($_GET['logout'])){
  logout();
}
