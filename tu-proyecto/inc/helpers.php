<?php
// En este fichero añadiremos funciones que nos harán mas facil las tareas;

// Con esta función, solo tenemos que usar la ruta relativa a la página que queramos redirigir
function redirect_to($path){
  header( 'Location:' . SITE_URL . '/' . $path);
  die();
}

/* Función para evitar el CROSS-SITE REQUEST FORGERY
  Crearemos un hash según la cadena que nos llegue
*/
function generate_hash( $action ){
    return md5 ( $action );
}

/* Función para evitar el CROSS-SITE REQUEST FORGERY
   Le pasaremos un hash, ya creado por la función anterior.
   Tambien le pasamos la cadena con la que debería haberse creado el hash
*/
function check_hash( $action, $hash ){
  if (generate_hash($action) === $hash){
    return true;
  }
  return false;
}

function is_logged_in(){
  $is_user_loged_in = isset($_SESSION['user']) && $_SESSION['user'] === ADMIN_USER;
  return $is_user_loged_in;
}

// Función para loguearse desde las credenciales de config.php
function loggin($userlog, $passlog){
  if( $userlog === ADMIN_USER && $passlog === ADMIN_PASS){
    $_SESSION['user'] = ADMIN_USER;
    return true;
  }
    return false;
}

// Función para loguearse desde DB
function logginDB($userlog, $passlog){
  global $app_db;

  if(!$app_db){
    die("Error al conectar con la base de datos");
  }

  $query = "SELECT * FROM users WHERE username = '$userlog' AND password = '$passlog'" ;

  $result = mysqli_query ($app_db, $query);


  if( $result ){
    // mysqli_fetch_assoc nos devuelve únicamente el primer resultado de la query y de forma asociativa
    $user_found = mysqli_fetch_assoc( $result);

    if(!isset($user_found)){
      die("El usuario o la contraseña son incorrectos");
    }
    else{
      $_SESSION['user'] = $userlog;
      return true;
    }
  }  else {
    die(mysqli_error($app_db));
  }


}



function logout(){
  unset ($_SESSION['user']);
  redirect_to('index.php');
  session_destroy();
}

function generate_update_post_url($id, $text){
  return "<a href=" . SITE_URL . "/admin?action=new-post&update-post=" . $id . "&hash=". generate_hash( 'update-post-'.$id) .">".$text."</a>";
}

function generate_delete_post_url($id, $text){
  ?>
  <a href="<?php echo SITE_URL ?>/admin?action=list-posts&delete-post=<?php echo $id; ?>&hash=<?php echo generate_hash( 'delete-post-' . $id); ?>"> <?php echo $text ?> </a>
  <?php
}
