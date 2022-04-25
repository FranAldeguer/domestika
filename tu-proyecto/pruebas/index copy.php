<?php

// Tipos de cabecera
	//header( 'Content-Type: application/pdf'); -> Cambiamos el tipo de contenido y le decimos que es un pdf
	// http_response_code( 404 ); -> Esto le envía un código de error 404.
			//El contenido se segurá mostrando, pero Google verá un Not Found y jamás lo indexará
?>
<?php require('init.php');?>
<?php

  error_reporting( E_ALL );
  ini_set('display_errors', 1);
  /*
  // Variables
  $nombre = 'Fran';
  $edad = "ah";
  ?><h1><?php echo $nombre ?> </h1><?php

  // Constantes
  // Se nombran siempre en mayúsculas, el valor puede ir en minusculas
  //define('NOMBRE', 'Valor');
  define('TIPO', 'Coche');
  define('MARCA', 'Ford');

  ?><h1><?php echo TIPO ?> </h1><?php
  */
  function get_post_1_titulo(){
    $post_1_titulo = 'Morbi eu volutpat ipsum. Nullam.';
    return $post_1_titulo;
  }

  function get_post_1_contenido(){
    $post_1_contenido = 'Sed ac mattis massa. Curabitur vestibulum, orci sed euismod luctus, nunc sapien mollis ex, non porttitor nibh nunc lobortis libero. Etiam fringilla molestie sapien, quis.';
    return $post_1_contenido;
  }

  function get_post_2_titulo(){
    $post_2_titulo = 'Aenean vel neque blandit, consequat turpis.';
    return $post_2_titulo;
  }

  function get_post_2_contenido(){
    $post_2_contenido = 'Nulla aliquet, ligula vel euismod aliquam, nisi odio pulvinar libero, eget euismod quam ipsum et enim. Phasellus placerat enim mauris, non euismod lectus dictum vitae.';
    return $post_2_contenido;
  }

  // Ambito de Variables
  $saludo = "Hola que tal?";
  function saludar(){
    $saludo = "hola";
    echo $saludo;
  }

  function saludar2(){
    global $saludo;
    echo $saludo;
    return $saludo;
  }

  //var_dump($saludo);
  $lista = ['uno', 'dos', 'tres', 2, 12, false, 1 == 1];

  // var_dump($lista);
  $num1 = 1.234;
  $num2 = 0.01234E2;
  $num3 = 1234e-3;

  // var_dump( $num1 );
  // var_dump( $num2 );
  // var_dump( $num3 );
  $comillas_simples = 'Francisco';
  $comillas_dobles = "Francisco";

// Si ponemos una frase entre comillas dobles, mostrará el valor de la variable
  var_dump( "Mi nombre es $comillas_simples" ); // => 'Mi nombre es Francisco'
  var_dump( "Mi nombre es $comillas_dobles" ); // => 'Mi nombre es Francisco'

// Si ponemos un string entre comillas simples, pondrá el NOMBRE de la variable
  var_dump( 'Mi nombre es $comillas_simples' );  // => 'Mi nombre es $comillas_simples'
  var_dump( 'Mi nombre es $comillas_dobles' ); // => 'Mi nombre es $comillas_dobles'

// Para mostrar el NOMBRE de la variable por pantalla con comillas dobles, usaremos el ESCAPADO DE CARACTERES
  var_dump( "Mi nombre es \$comillas_dobles" );

// Para mostrar las comillas dobles, dentro de comillas dobles usamos también el ESCAPADO DE CARACTERES
// Lo mismo para mostrar comillas simples dentro de comillas simples
  var_dump( "Esto produce un \"error\"");

  // Forma antigua
  $array1 = array(1, 2, 3);

  // Forma nueva
  $array2 = ['uno', 'dos', 'tres', 'catorse'];

  var_dump( $array2[3] );

  // Arrays asociativos
  $edades = array( 'Pedro' => 12, 'Juan' => 35, 'Jose' => 26);

  var_dump($edades['Pedro']);
  var_dump($edades['Jose']);

  $edades['Maria'] = 31;
  $array2[] = 'ventisinco';

  var_dump($array2);
  var_dump($edades);

  var_dump($edades['Maria']);

  var_dump("WTF is THIS?¿");

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

  echo '<hr>';
  echo "<h2>While</h2>";
  $contador = 1;
  while ($contador <= 10) {
    echo $contador;
    echo '<br>';
    $contador++;
  }


#Recuperar todos los posts de la base de datos
$all_posts = get_all_posts();
$post_found = false;

// Recupera un post de la base de datos
if( isset($_GET['view'])){
	$all_posts = get_post($_GET['view']);
	if ( $post_found ){
		$all_posts = [$post_found];
	}
	$post_found = true;
}

?>

<!-- Insertamos el archivo templates/header.php con las cabeceras -->
<?php require('templates/header.php') ?>

<!-- MENSAJES DE ERROR -->
<?php if( isset( $_GET['success'] ) ):?>
	<div class="success">
		 El post ha sido creado
	</div>
<?php endif; ?>
<?php if( isset( $_GET['updated'] ) ):?>
	<div class="success">
		 El post ha sido modificado
	</div>
<?php endif; ?>
<!-- END MENSAJES DE ERROR -->

<div class="posts">
	<?php foreach ($all_posts as $post): ?>
		<article class="post">
			<header>
				<a href ="?view=<?php echo $post['id']; ?>" ><h2 class="post-title"> <?php echo $post['title']; ?> </a>
				</header>
				<div class="post-content">
					<?php if($post_found){
						echo $post['content'];
					} else {
						echo $post['excerpt']; } ?>
					</div>
					<footer>
						<span class="post-date"> Publicado en:
							<?php echo strftime('%d %b %Y', strtotime($post['published_on'])) ?>
						</span>
					</footer>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- Insertamos el archivo templates/footer.php con el pie de página -->
		<?php require('templates/footer.php') ?>
