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
function loggin_noseguro($userlog, $passlog){
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

function loggin($userlog, $passlog){
  global $app_db;

  $query = "SELECT * FROM users WHERE username = '$userlog'" ;

  $result = $app_db->query($query);

  $user = $app_db->fetch_assoc( $result );

  if(!isset($user)){
    die("El usuario es incorrecto");
  }

  if(!password_verify($passlog, $user['password'])){
    die("La contraseña es incorrecta");
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

function generate_update_user_url($id, $text){
    return "<a href=" . SITE_URL . "/admin?action=new-user&update-user=" . $id . "&hash=". generate_hash( 'update-user-'.$id) .">".$text."</a>";
}

function generate_delete_user_url($id, $text){
    ?>
  <a href="<?php echo SITE_URL ?>/admin?action=list-users&delete-user=<?php echo $id; ?>&hash=<?php echo generate_hash( 'delete-user-' . $id); ?>"> <?php echo $text ?> </a>
  <?php
}

/**
 * 
 * @param $_FILES['img'] $imgInput
 * @param int $anchoInput
 * @param int $altoInput
 * @param string $nombre
 */
function redimensionarImg($imgInput, $anchoInput, $altoInput, $nombre, $imgDir) {
    
    
    $image = imagecreatefromjpeg($imgInput['tmp_name']);
    $filename = $imgDir . $nombre . '-'.$anchoInput.'x'.$altoInput.'.jpg';
    
    $thumb_width = $anchoInput;
    $thumb_height = $altoInput;
    
    $width = imagesx($image);
    $height = imagesy($image);
    
    $original_aspect = $width / $height;
    
    $thumb_aspect = $thumb_width / $thumb_height;
    
    if ( $original_aspect >= $thumb_aspect ) {
        // If image is wider than thumbnail (in aspect ratio sense)
        $new_height = $thumb_height;
        $new_width = $width / ($height / $thumb_height);
        
    } else {
        // If the thumbnail is wider than the image
        $new_width = $thumb_width;
        $new_height = $height / ($width / $thumb_width);
        
    }
    
    $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
    
    // Resize and crop
    imagecopyresampled( $thumb,
    $image,
    0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
    0 - ($new_height - $thumb_height) / 2, // Center the image vertically
    0, 0,
    $new_width,
    $new_height,
    $width,
    $height);
    imagejpeg($thumb, $filename, 80);
}

function imgToServer($imgInput, $nameInput, $rutaInput){
    // Array de tipos de archivo que admitimos en nuestro servidor
    $extensiones = array(
    0 => 'image/jpg',
    1 => 'image/jpeg',
    2 => 'image/png',
    3 => 'image/gif'
      );
    
    
    // Tamaño máximo del archivo en bits 1MB
    $maxSize = 1024 * 1024 * 8;
    // Cogemos la ruta del servidor, que luego nos servirá para seleccionar la carpeta de destino
    $ruta_server = dirname(realpath(__FILE__));
    // Nombre y ruta temporal
    $origen = $imgInput['tmp_name'];
    
    // Guardamos la extensión del archivo a parte para poder crear y llamar a varias versiones del archivo
    $extension = pathinfo($imgInput['name'], PATHINFO_EXTENSION);
    
    
    // Ruta de destino a la carpeta del servidor donde se guardarán las fotos
    $destino = $ruta_server . '/'. $rutaInput . $nameInput . '-original.' . $extension;
    
    
    
    if (in_array($imgInput['type'], $extensiones)) {
        
        if ($imgInput['size'] < $maxSize) {
            
            if (move_uploaded_file($origen, $destino)) {
                echo '<script>alert("Fichero guardado con éxito")</script>';
            }
        } else {
            echo '<script>alert("Archivo demasiado grande")</script>';
        }
    }
}

