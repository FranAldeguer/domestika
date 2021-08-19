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

  echo "<h2>Do While</h2>";
  $contador = 10;
  do {
    echo 'El contador es ' . $contador . '<br>';
    $contador++;
  } while ($contador <= 20);

  echo "<h2>For</h2>";
  $longitud_posts = count( $all_posts );
  for ($x = 0; $x < $longitud_posts; $x++){
    echo 'Post número ';
    echo $x+1;
    echo '<br>';
  }

  echo "<h2>Foreach</h2>";
  foreach ( $all_posts as $post ) {
    echo $post['title'];
    echo '<br>';
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Micro CMS</title>
	<link rel="stylesheet" href="assets/style.css">
</head>

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
    <?php foreach ($all_posts as $post): ?>
      <article class="post">
        <!-- POST 1 -->
        <header>
          <h2 class="post-title"><?php echo $post['title']; ?><h2>
        </header>
        <div class="post-content"><?php echo $post['content']; ?></div>
        <footer></footer>
      </article>
    <?php endforeach; ?>
  </div>
</div>

<footer id="footer">
	<div id="inner-footer">
		Curso de Introducción a PHP en Domestika
	</div>
</footer>
</body>
</html>
