<?php
/**
 * Devuelve todos los posts
*/
function get_all_posts(){
  global $app_db;
  $result = $app_db->query("SELECT * FROM posts order by id DESC");
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
  $query = "INSERT into posts
  (title, excerpt, content, published_on)
  VALUES ('$title','$excerpt','$content','$published_on')";
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
