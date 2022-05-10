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

        $title = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING );
        //$excerpt = $_POST['excerpt']; -- ESTO NO ES SEGURO
        $excerpt = filter_input( INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING );

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

          if( empty($title) || empty($content) ){
            $error = true;
          }else{

            if ( !check_hash ('update-post-' . $id, $_GET['hash'] ) ){
              die( 'No toques las cosas de tocar ;)');
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
    if (isset ($_GET['delete-post']) && isset($_GET['hash'])) {

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

  case 'view-profile': {
    require 'templates/user-profile.php';
    break;
  }

  case 'new-user':{
    $error = false;
    $id  = "";
    $name = "";
    $email = "";
    $password = "";
    $role = "";

    $nuevoUsuario = new User($name, $email, $password, $role);

    if(isset($_POST['submit-update-user']) || isset($_POST['submit-new-user'])){
      $nuevoUsuario->setName(filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING ));
      $nuevoUsuario->setEmail(filter_input( INPUT_POST, 'email', FILTER_SANITIZE_STRING ));
      $nuevoUsuario->setPassword(password_hash(filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING ), PASSWORD_BCRYPT));
      $nuevoUsuario->setRole(filter_input( INPUT_POST, 'role', FILTER_SANITIZE_STRING ));
    }

    if(isset($_POST['submit-new-user'])){
        $nuevoUsuario->insertUser();
        redirect_to('admin?action=list-users&success=new');
    }

    if(isset($_POST['submit-update-user'])){
        $nuevoUsuario->setId(filter_input( INPUT_POST, 'userid', FILTER_SANITIZE_STRING ));
        $nuevoUsuario->updateUser();
        redirect_to ('admin?action=list-users&success=update');

    }

    require 'templates/new-user.php';
    break;
  }

  case 'list-users':{
    $error = false;
    $all_users = User::_getAllUsers();

    if(isset($_GET['delete-user']) && isset($_GET['hash'])){
        if(check_hash("delete-user-".$_GET['delete-user'], $_GET['hash'])){
            User::_getUser($_GET['delete-user'])->deleteUser();
        }
        redirect_to('admin?action=list-users&delete-post-ok=ok');
    }

    require 'templates/list-users.php';
    break;

  }

  default:{
    require 'templates/admin.php';
    break;
  }
}
