<?php
/**
 * Devuelve todos los posts
*/
function get_all_posts(){
  global $app_db;
  //$query = "SELECT * FROM posts order by id DESC";
  $query = "SELECT p.*, u.username FROM posts p, users u WHERE p.user = u.id order by p.id DESC";

  $result = $app_db->query($query);
  return $app_db->fetch_all($result);

}

/*
 * Devuelve un único post si se le pasa un id valido
 * Si no, no de vuelve nada.
 */
function get_post( $id ){
  global $app_db;
  $id = intval ( $id );
  $query = "SELECT * FROM posts WHERE id = " . $id;
  $query = "SELECT p.*, u.username FROM posts p, users u WHERE p.user = u.id and p.id = " . $id;

  $result = $app_db->query ($query);
  return $app_db->fetch_all($result);
}

/**
 * Inserta un post en la base de datos
 */
function insert_post($title, $excerpt, $content){
  global $app_db;
  $published_on = date("Y-m-d H:i:s");
  $title = $app_db->real_escape_string( $title);
  $excerpt = $app_db->real_escape_string($excerpt);
  $content = $app_db->real_escape_string($content);
  $author = null;
  if(isset($_SESSION['user_name'])){
    $author = $_SESSION['user_id'];
  }
  $query = "INSERT into posts
  (title, excerpt, content, published_on, user)
  VALUES ('$title','$excerpt','$content','$published_on', '$author')";
  $app_db->query( $query );
}

function delete_post( $id ){
  global $app_db;
  $id = intval ( $id );
  $query = "DELETE FROM posts WHERE id = '$id'";
  $app_db->query($query);
}

/*
 * Modificar un post en la base de datos
 */
function update_post($id, $title, $excerpt, $content){
  global $app_db;

  $id = intval($id);
  $title = $app_db->real_escape_string($title);
  $excerpt = $app_db->real_escape_string($excerpt);
  $content = $app_db->real_escape_string($content);

  $query = "UPDATE posts SET
  title = '$title',
  excerpt = '$excerpt',
  content = '$content'
  WHERE id='$id'";

  $title = $app_db->real_escape_string($title);
  $excerpt = $app_db->real_escape_string($excerpt);
  $content = $app_db->real_escape_string($content);

  $app_db->query($query);
}

?>
