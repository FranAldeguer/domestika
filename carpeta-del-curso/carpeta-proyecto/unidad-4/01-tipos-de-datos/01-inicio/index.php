<?php
// Configura la salida de errores por pantalla
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$all_posts = [
	[
		'id' => 1,
		'title' => 'Lorem ipsum dolor sit amet',
		'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae pulvinar turpis',
		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae pulvinar turpis. Nam ut arcu tellus. Morbi sit amet elit lacinia, tincidunt leo a, posuere mi. Mauris nec odio at quam lacinia consequat. Fusce mattis orci ex, eget accumsan neque vehicula et. Vivamus consectetur tempor lacus, in tincidunt massa rutrum ut. Pellentesque augue felis, iaculis eu interdum et, semper eu purus. Vestibulum a viverra justo.',
		'published_on' => '2018-01-11 10:15:00',
	],
	[
		'id' => 2,
		'title' => 'Nunc eget enim vulputate',
		'excerpt' => 'Integer placerat hendrerit pharetra. Nunc eget enim vulputate, efficitur dolor pretium',
		'content' => 'Integer placerat hendrerit pharetra. Nunc eget enim vulputate, efficitur dolor pretium, pharetra nulla. Proin mattis aliquam sem. Morbi vel mi ac magna consequat tempus vitae eget diam. Aliquam ac sapien a tortor rutrum faucibus nec nec urna. Ut et nisl magna. Vivamus elit risus, rhoncus vitae elit suscipit, porta pulvinar justo. Aliquam sodales urna eu scelerisque ultrices. Fusce et neque id risus gravida vestibulum a et urna. Curabitur aliquam accumsan leo, pharetra tempus velit condimentum et. Donec dapibus faucibus lorem a tincidunt. Donec ultricies id metus et aliquam. Vestibulum dapibus magna nec elit ultrices, ornare pretium nisi dictum.',
		'published_on' => '2018-01-11 10:15:00',
	],
];

function get_post_1_titulo() {
	$post_1_titulo = 'Lorem ipsum dolor sit amet';
	return $post_1_titulo;
}

function get_post_1_contenido() {
	$post_1_contenido = 'Mauris lobortis, turpis sit amet pulvinar hendrerit, elit ligula accumsan ligula, ut interdum ipsum ex in sapien. Morbi et ullamcorper orci, in egestas risus. Sed rhoncus a odio quis fringilla. Nunc sodales risus at turpis venenatis, ac accumsan ex porttitor. Fusce porttitor metus sit amet mi aliquet, quis interdum purus feugiat. ';
	return $post_1_contenido;
}
function get_post_2_titulo() {
	$post_2_titulo = 'Mauris lobortis, turpis sit amet pulvinar hendrerit';
	return $post_2_titulo;
}

function get_post_2_contenido() {
	$post_2_contenido = 'Maecenas malesuada malesuada eleifend. Nam lobortis risus in est sollicitudin, ut egestas nibh ultricies. Morbi tincidunt rhoncus velit, ac aliquet lectus rhoncus vel. Aenean hendrerit sapien consectetur tempus sagittis. ';
	return $post_2_contenido;
}

// Enteros: Integers
$positivo = 10;
$cero = 0;
$negativo = -10;

// Punto flotante (reales): Floats, doubles
$numero = 1.234;
$exponente_1 = 0.01234e2; // 0.01234 * 10^2
$exponente_2 = 1234E-3; // 1234 * 10^-3

// Cadenas: Strings
$nombre = 'Ignacio'; // Comillas simples
$apellido = "Cruz"; // Comillas dobles

var_dump( "Mi nombre es $nombre" );
var_dump( 'Mi nombre es $nombre' );

// Escapar caracteres en cadenas
var_dump( "Mi variable se llama \$mi_nombre" );
var_dump( "Esto produce un \"error\"" );

// Booleanos
$verdadero = true;
$falso = false;

// Muy útiles para comprobar en condicionales
$error = true;
if ( $error ) {
	var_dump( 'Hay un error. Vuelve a intentarlo' );
}

// Array
// Notación antigua
$alimentos = array( 'pera', 'manzana', 'carne' );
// Notación nueva
$colores = [ 'azul', 'verde', 'rojo' ];

var_dump( $colores[0] );
var_dump( $colores[2] );

// Array asociativo
$edades = [ 'Pedro' => 22, 'Ana' => 15, 'Susana' => 38 ];
var_dump( $edades['Pedro'] );
var_dump( $edades['Susana'] );

// Añadir elementos a arrays
$colores[] = 'morado';
$edades['Juan'] = 45;

var_dump($edades);
var_dump($colores);

// Valores que son "false"
$cero = 0;
$cadena_vacia = '';
$nulo = null;
$array_vacio = [];

var_dump( (bool) $cero );
var_dump( (bool) $cadena_vacia );
var_dump( (bool) $nulo );
var_dump( (bool) $array_vacio );

// Valores que son "true"
var_dump( (bool) $positivo );
var_dump( (bool) $negativo );
var_dump( (bool) $edades );
var_dump( (bool) $nombre );

if ( $cadena_vacia ) {
	// No se ejecuta porque la cadena no tiene nada
}

if ( $edades ) {
	// Se ejecuta porque el array no está vacío
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Micro CMS</title>
	<link rel="stylesheet" href="assets/style.css"></head>
<body>

<nav id="site-navigation" role="navigation" class="row row-center">
	<div class="column">
		<h1>
			<a href="index.php">Micro CMS</a>
		</h1>
		<ul class="main-menu column clearfix">
		</ul>
	</div>
</nav>

<div id="content" >
	<div class="posts">
		<div>
			<h2><?php echo get_post_1_titulo(); ?></h2>
			<div><?php echo get_post_1_contenido(); ?></div>
		</div>
		<div>
			<h2><?php echo get_post_2_titulo(); ?></h2>
			<div><?php echo get_post_2_contenido(); ?></div>
		</div>
	</div>
</div>

<footer id="footer">
	<div id="inner-footer">
		Curso de Introducción a PHP en Domestika
	</div>
</footer>
</body>
</html>
