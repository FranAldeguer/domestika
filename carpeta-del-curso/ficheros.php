<?php

function getDirContents( $dir, &$results = [] ) {
	$files = scandir( $dir );

	foreach ( $files as $key => $value ) {
		$path               = realpath( $dir . DIRECTORY_SEPARATOR . $value );
		$ext                = pathinfo( $path, PATHINFO_EXTENSION );
		$allowed_extensions = [ 'php', 'sql' ];
		if ( ! is_dir( $path ) ) {
			if ( in_array( $ext, $allowed_extensions ) ) {
				$results[] = $path;
			}
		} else if ( $value != "." && $value != ".." ) {
			getDirContents( $path, $results );
			if ( in_array( $ext, $allowed_extensions ) ) {
				$results[] = $path;
			}
		}
	}

	return $results;
}

$folders = [
	'Unidad 3' => [
		'Lección 2: Variables, constantes y funciones' => './carpeta-proyecto/unidad-3/02-variables-constantes-y-funciones',
		'Lección 3: Depurado de errores'               => './carpeta-proyecto/unidad-3/03-depurado-de-errores',
	],
	'Unidad 4' => [
		'Lección 1: Tipos de datos'                                                         => './carpeta-proyecto/unidad-4/01-tipos-de-datos',
		'Lección 2: Loops. Iterando para mostrar las entradas'                              => './carpeta-proyecto/unidad-4/02-loops_iterando-para-mostrar-entradas',
		'Lección 3: Trabajo con fechas en PHP'                                              => './carpeta-proyecto/unidad-4/03-trabajo-con-fechas-en-php',
		'Lección 5: Estructuras de control y operadores: Mostrando un sólo post al usuario' => './carpeta-proyecto/unidad-4/05-estructuras-de-control-y-operadores_mostrando-un-sólo-post-al-usuario',
	],
	'Unidad 5' => [
		'Lección 1: Incluir ficheros en PHP: Hora de reorganizar' => './carpeta-proyecto/unidad-5/01-incluir-ficheros-en-php',
		'Lección 2: Formularios: Creando entradas en el blog'     => './carpeta-proyecto/unidad-5/02-formularios-creando-entradas-en-el-blog',
	],
	'Unidad 6' => [
		'Lección 2: Integración de MySQL en nuestro proyecto'        => './carpeta-proyecto/unidad-6/02-integración-con-la-base-de-datos',
		'Lección 3: Guardado y borrado de datos en la Base de Datos' => './carpeta-proyecto/unidad-6/03-guardado-y-borrado-de-datos-en-la-bbdd',
		'Lección 4: Redirecciones y cabeceras'                       => './carpeta-proyecto/unidad-6/04-redirecciones-y-cabeceras',
	],
	'Unidad 7' => [
		'Lección 1: Seguridad básica'                        => './carpeta-proyecto/unidad-7/01-seguridad-basica',
		'Lección 2: Login mediante sistema de sesiones'      => './carpeta-proyecto/unidad-7/02-login-con-sesiones',
		'Lección 3: Un controlador frontal para nuestro CMS' => './carpeta-proyecto/unidad-7/03-front-controller',
		'Lección 4: Clases y Objetos'                        => './carpeta-proyecto/unidad-7/04-clases-y-objetos',
	],

];
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>Introducción a PHP</title>

	<link rel="stylesheet" href="./assets/css/inicio.css">
</head>
<body>
<header>
	<div class="nav">
		<a class="logo">DOMESTIKA</a>
		<a href=".">Inicio</a>
		<a class="current" href=".">Ficheros del proyecto</a>
		<a href="./lecciones.html">Lecciones</a>
	</div>
</header>

<h1 class="page-title">Curso de Introducción a PHP</h1>

<div id="content">
	<?php foreach ( $folders as $unit_name => $folder ): ?>
		<div class="unit">
			<h3><?php echo $unit_name; ?></h3>
			<?php foreach ( $folder as $lesson_name => $lesson ): ?>
				<div class="lesson">
					<h4>
						<?php echo $lesson_name; ?>
						<a href="ficheros-lector.php?lesson=<?php echo urlencode( $lesson . '/01-inicio' ); ?>&unit_name=<?php echo urlencode( $unit_name ); ?>&lesson_name=<?php echo urlencode( $lesson_name ); ?>">[INICIO]</a>
						/
						<a href="ficheros-lector.php?lesson=<?php echo urlencode( $lesson . '/02-final' ); ?>&unit_name=<?php echo urlencode( $unit_name ); ?>&lesson_name=<?php echo urlencode( $lesson_name ); ?>">[FINAL]</a>
					</h4>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endforeach; ?>
</div>

</div>
</body>
</html>

