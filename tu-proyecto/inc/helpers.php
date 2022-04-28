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

// Función para comprobar si el usuario está logueado, cuando se loguea con config.php
function is_logged_in_CONFIGPHP(){
  $is_user_loged_in = isset($_SESSION['user']) && $_SESSION['user'] === ADMIN_USER;
  return $is_user_loged_in;
}

// Función para comprobar si el usuario está logueado, cuando se loguea con DB
function is_logged_in(){
  $is_user_loged_in = isset($_SESSION['user_name']) && isset($_SESSION['user_id']);
  return $is_user_loged_in;
}

// Función para loguearse desde las credenciales de config.php
function loggin_CONFIGPHP($userlog, $passlog){
  if( $userlog === ADMIN_USER && $passlog === ADMIN_PASS){
    $_SESSION['user'] = ADMIN_USER;
    return true;
  }
    return false;
}

// Función para loguearse desde DB
function loggin($userlog, $passlog){
  global $app_db;

  $query = "SELECT * FROM users WHERE username = '$userlog' AND password = '$passlog'" ;

  $result = $app_db->query($query);

  $user = $app_db->fetch_assoc( $result );


  if(!isset($user)){
    die("El usuario o la contraseña son incorrectos");
  }
  else{

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['username'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_role'] = $user['role'];

    return true;
  }

}

function logout(){
  unset ($_SESSION['user_id']);
  unset ($_SESSION['user_name']);
  unset ($_SESSION['user_email']);
  unset ($_SESSION['user_role']);

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
