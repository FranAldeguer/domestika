<?php

/*
 * Duplicar el archivo
 * Renombrarlo como config.php
 * Modificar la url del sitio, la conexión a la DB y el usuario ADMIN
 */ 

// Mostrar errores por pantalla
error_reporting(E_ALL);
ini_set ( 'display_errors', 1);

// Configuración de la url del sitio
define( 'SITE_URL', 'http://localhost/url-correcta');

// Configuración de la zona horaria
define( 'SITE_TIMEZONE', 'Australia/Sydney');
define( 'SITE_LANG', ['es', 'spa', 'es_ES'] );

// Configuración de la conexión a la base de datos
define( 'DB_HOST', 'localhost');
define( 'DB_USER', '');
define( 'DB_PASS', '');
define( 'DB_DATABASE', '');
define( 'DB_PORT', '3306');

// Configuración del usuario admin
define( 'ADMIN_USER', '');
define( 'ADMIN_PASS', '');
