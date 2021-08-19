<?php

// Configura la salida de errores por pantalla
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

setlocale( LC_TIME, 'es', 'spa', 'es_ES' );
date_default_timezone_set( 'Australia/Sydney' );

require( 'inc/posts.php' );
