<?php
/**
 * Devuelve todos los posts
*/
function get_all_posts(){
  // Con esto llamamos a la variable global $app_db que está en int.php
  global $app_db;
  // Cogemos el recurso desde init.php y si es false, paramos la ejecución
  if( !$app_db ){
  	die( "Error en la conexión de la base de datos" );
  }else{
  	//echo "Conexión OK";
  }

  // Creamos la query que queramos ejecutar
  $query = "SELECT * FROM posts order by id DESC";

  /*
   * Le pasamos el objeto que contiene la conexión a la DB y la query que tiene que ejecutar
   * mysqli_query no nos devuelve los datos como tal
   * nos devuelve el siguiente objeto:

     object(mysqli_result)[2]
      public 'current_field' => int 0
      public 'field_count' => int 5 ---- El número de campos que ha contado
      public 'lengths' => null ---- La longitud de los campos
      public 'num_rows' => int 9 ---- La cantidad de filas que ha devuleto
      public 'type' => int 0
   */
  $result = mysqli_query ($app_db, $query);

  //var_dump($result);

  if(!$result){
    die(mysqli_error($app_db));
  }else {
    /* mysqli_fetch_all( $result ) -> Nos devuelve un array numérico y no sabríamos que número corresponde a que campo
        7 => **** MAL ****
           array (size=5)
             0 => string '3' (length=1)
             1 => string 'Mi título' (length=10)
             2 => string 'Mi extracto' (length=11)
             3 => string 'Este es mi puto nuevo contenido' (length=31)
             4 => string '2022-02-01 21:26:00' (length=19)

     * Para averiguarlo, necesitamos que nos devuelva un Array Asociativo,
     * para eso le añadimos la constante MYSQLI_ASSOC
         7 => **** BIEN ****
           array (size=5)
             'id' => string '3' (length=1)
             'title' => string 'Mi título' (length=10)
             'excerpt' => string 'Mi extracto' (length=11)
             'content' => string 'Este es mi puto nuevo contenido' (length=31)
             'published_on' => string '2022-02-01 21:26:00' (length=19)
     */
    return mysqli_fetch_all( $result, MYSQLI_ASSOC);
  }
}

/*
 * Devuelve un único post si se le pasa un id valido
 * Si no, no de vuelve nada.
 */
function get_post( $id ){
  global $app_db;

  // Inyección de sql
  // Si nos queremos asegurar que un campo en concreto sea siempre un número
  // La función intval ($var) nos devuelve la misma función convertida en un número

  $id = intval ( $id );

  $query = "SELECT * FROM posts WHERE id = " . $id;

  $result = mysqli_query ($app_db, $query);

  if( $result ){
    // mysqli_fetch_assoc nos devuelve únicamente el primer resultado de la query y de forma asociativa
    $post_found = mysqli_fetch_assoc( $result);
    return [ $post_found ];
  }  else {
    die(mysqli_error($app_db));
  }
}

/**
 * Inserta un post en la base de datos
 */
function insert_post($title, $excerpt, $content){
  global $app_db;

  $published_on = date("Y-m-d H:i:s");

  /*
   * Inyecciones de sql
   * Intentar meter, dentro de una variable, una consulta a la base de datos
   * $title = mysqli_real_escape_string ($app_db, $title);
   * Le enviaos el objeto de DB y la variable y nos devuelve la misma variable saneada.
   * Esta función sanea la variable para que sea válida para pasarla como parámetro a la query
   * Además, escapa algunos caracteres como comillas, etc...
   * Esta fucnión solo funciona con strings
   * https://www.php.net/manual/es/mysqli.real-escape-string.php
   */

  $title = mysqli_real_escape_string( $app_db, $title);
  $excerpt = mysqli_real_escape_string( $app_db, $excerpt);
  $content = mysqli_real_escape_string( $app_db, $content);

  $query = "INSERT into posts
  (title, excerpt, content, published_on)
  VALUES ('$title','$excerpt','$content','$published_on')";

  $result = mysqli_query( $app_db, $query);

  if(!$result){
    // mysqli_error va a coger el último error que haya habido en $app_db y lo va a mostrar por pantalla
    die(mysqli_error($app_db));
  }
}

function delete_post( $id ){
  global $app_db;

  $id = intval ( $id );
  $query = "DELETE FROM posts WHERE id = '$id'";

  $result = mysqli_query( $app_db, $query);
  if(!$result){
    // mysqli_error va a coger el último error que haya habido en $app_db y lo va a mostrar por pantalla
    die(mysqli_error($app_db));
  }

}

/**
 * Inserta un post en la base de datos
 */
function update_post($id, $title, $excerpt, $content){
  global $app_db;

  $id = intval($id);
  $title = mysqli_real_escape_string( $app_db, $title);
  $excerpt = mysqli_real_escape_string( $app_db, $excerpt);
  $content = mysqli_real_escape_string( $app_db, $content);


  $query = "UPDATE posts SET
  title = '$title',
  excerpt = '$excerpt',
  content = '$content'
  WHERE id='$id'";



  $result = mysqli_query( $app_db, $query);

  if(!$result){
    // mysqli_error va a coger el último error que haya habido en $app_db y lo va a mostrar por pantalla
    die(mysqli_error($app_db));
  }
}

?>
