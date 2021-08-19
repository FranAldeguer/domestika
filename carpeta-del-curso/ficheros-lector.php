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

$path = $_GET['lesson'];

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<title>Introducción a PHP</title>

	<link rel="stylesheet" href="./assets/css/inicio.css">
	<link rel="stylesheet"
		  href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
	<script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous"></script>
</head>
<body>
<header>
	<div class="nav">
		<a class="logo">DOMESTIKA</a>
		<a href=".">Inicio</a>
		<a class="current" href="./ficheros.php">Ficheros del proyecto</a>
		<a href="./lecciones.html">Lecciones</a>
	</div>
</header>

<h1 class="page-title">Ficheros de: <?php echo $_GET['unit_name'] . ' - ' . $_GET['lesson_name']; ?></h1>

<div id="content">
	<?php foreach ( getDirContents( $path ) as $file ): ?>
		<div class="unit">
			<?php
				$file_relative = str_replace( __DIR__, '', $file );
				$ext = pathinfo( $file )['extension'];
			?>
			<h3><code><?php echo $file_relative; ?></code></h3>
			<div class="file-controls">
				<p><button class="button">Mostrar/Ocultar contenido</button></p>
			</div>
			<div class="file-content">
				<?php $content = file_get_contents( $file ); ?>
				<pre><code class="<?php echo $ext; ?>>"><?php echo htmlentities( $content ); ?></code></pre>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<script>
	$(document).ready(function() {
		$('pre code').each(function(i, block) {
			hljs.highlightBlock(block);
		});

		function toggle( $unit ) {
			! $unit.hasClass( 'closed' ) ? $unit.addClass( 'closed' ) : $unit.removeClass( 'closed' )
		}
		$('.unit').each(function( key, unit ) {
			toggle( $(unit) );
		});

		$( '.file-controls button' ).click( function( e ) {
			toggle( $(e.target).parents('.unit') );
		} );
	});
</script>
</body>
</html>

