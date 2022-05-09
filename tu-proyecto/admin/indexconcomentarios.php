<?php
require '../init.php';

if(!is_logged_in()){
  redirect_to("login.php");
}

$action = '';
if(isset($_GET['action'])){
  $action = $_GET['action'];
}

switch ( $action ) {

  case 'new-post': {
      $error = false;
      $title = '';
      $excerpt = '';
      $content = '';
      $id = '';
      $published_on = '';

      if (isset($_POST['submit-new-post'])){
                            /******************************
                             * SANEAR LA ENTRADA DE DATOS *
                             ******************************/
        /*
         * Con filter_input cogemos la variable externa que queramos para sanearla
         * INPUT_POST = $_POST()
         * 'title' el nombre de la variable
         * FILTER_SANITIZE_STRING = Elimina todas las <etiquetas> del texto
         * Hay muchos más filtros con muchas opciones aquí: https://www.php.net/manual/es/function.filter-input.php
         */

         // $title = $_POST['title']; -- ESTO NO ES SEGURO
        $title = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING );
        //$excerpt = $_POST['excerpt']; -- ESTO NO ES SEGURO
        $excerpt = filter_input( INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING );

        /*
         * Con strip_tags eliminamos todas las <etiquetas>, excepto las que le indiquemos a continuación
         * Esto puede ser útil en textareas donde podríamos querer que el usuario añada párrafos, negritas, imágenes...
         */
        // $content = $_POST['content']; -- ESTO NO ES SEGURO
        $content = strip_tags($_POST['content'], '<br><p><b><a><img>');

        if( empty($title) || empty($content)){
          $error = true;
        }else{
          insert_post($title, $excerpt, $content);
          // Redirigimos a la home, después de insertar
          redirect_to ('admin?success=true&action=list-posts');
        }
      }

        if (isset($_POST['submit-update-post'])){
          $title = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING );
          $excerpt = filter_input( INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING );
          $id = filter_input( INPUT_POST, 'postid', FILTER_SANITIZE_STRING );
          $content = strip_tags($_POST['content'], '<br><p><b><a><img>');

          $id = $_POST['postid'];

          if( empty($title) || empty($content)){
            $error = true;
          }else{

            if ( !check_hash ('update-post-' . $id, $_GET['hash'] ) ){
              die( 'No toques las cosas de tocar');
            }

            update_post($id, $title, $excerpt, $content);
            // Redirigimos a la vista del post, después de insertar
            redirect_to ('?updated=true&view='.$id);
          }
        }

    require 'templates/new-post.php';
    break;
  }
  case 'list-posts': {
    if (isset ($_GET['delete-post'])) {

    	if ( !check_hash ('delete-post-' . $_GET['delete-post'], $_GET['hash'] ) ){
    		die( 'hackeando, no?');
    	}

    	delete_post($_GET['delete-post']);
    	redirect_to( 'admin/index.php?delete-post-ok=ok&action=list-posts');
    }

    $all_posts = get_all_posts();

    require 'templates/list-posts.php';

    break;
  }

  default:{
    require 'templates/admin.php';
  }
}
