<?php
// Configura la salida de errores por pantalla
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

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
