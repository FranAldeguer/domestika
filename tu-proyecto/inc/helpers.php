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

function loggin($userlog, $passlog){
  if( $userlog === ADMIN_USER && $passlog === ADMIN_PASS){
    $_SESSION['user'] = ADMIN_USER;
    return true;
  }
    return false;
}

function logout(){
  unset ($_SESSION['user']);
  redirect_to('index.php');
  session_destroy();
}
