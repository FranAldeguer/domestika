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
      $user = '';
      $published_on = '';
      $img_ext = '';
      $img_input = '';
      $img_name = '';
      $img_dir = '../media/';
      
      $nuevoPost = new Post($title, $excerpt, $content, $published_on, $user, $img_name, $img_ext);
      
      
      if(isset($_POST['submit-new-post']) || isset($_POST['submit-update-post'])){
          $nuevoPost->setTitle(filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING ));
          //$excerpt = $_POST['excerpt']; -- ESTO NO ES SEGURO
          $nuevoPost->setExcerpt(filter_input( INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING ));
          
          $nuevoPost->setContent(strip_tags($_POST['content'], '<br><p><b><a><img>'));
      }
      
      
      if (isset($_POST['submit-new-post']) && isset($_FILES['post-img'])) {
    //if (isset($_POST['submit-new-post'])) {

        
        
        
        $nuevoPost->setImgExt(pathinfo($_FILES['post-img']['name'], PATHINFO_EXTENSION));
        
        $img_name = "IMG_" . date("Ymd_His");
        
        $nuevoPost->setImgName($img_name);
        
        $img_input = $_FILES['post-img'];
        redimensionarImg($img_input, IMG_POST_PREVIEW_h, IMG_POST_PREVIEW_w, $img_name, $img_dir); // En helpers.php
        redimensionarImg($img_input, 400, 250, $img_name, $img_dir);
        redimensionarImg($img_input, IMG_POST_HEADER_w, IMG_POST_HEADER_h, $img_name, $img_dir);
        imgToServer($img_input, $img_name, $img_dir);
        //alert($nuevoPost->getImgExt());
        
        if( empty($nuevoPost->getTitle()) || empty($nuevoPost->getContent())){
          $error = true;
        }else{
            $nuevoPost->insert();
          //insert_post($title, $excerpt, $content, $img_name, $img_ext);
          // Redirigimos a la home, después de insertar
          redirect_to ('admin?success=true&action=list-posts');
        }
      }
        
        if (isset($_POST['submit-update-post'])){
            $nuevoPost->setId(filter_input( INPUT_POST, 'postid', FILTER_SANITIZE_STRING ));
            $nuevoPost->setUser_id(filter_input( INPUT_POST, 'userid', FILTER_SANITIZE_STRING ));

            if( empty($nuevoPost->getTitle()) || empty($nuevoPost->getContent())){
            $error = true;
          }else{

              if ( !check_hash ('update-post-' . $nuevoPost->getId(), $_GET['hash'] ) ){
              die( 'No toques las cosas de tocar ;)');
            }
            
            //die($nuevoPost);
            
            $nuevoPost->update();
            // Redirigimos a la vista del post, después de insertar
            redirect_to ('?updated=true&view='.$nuevoPost->getId());
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
        
    	$post = Post::_getPost($_GET['delete-post']);
    	$post->delete();
    	
    	redirect_to( 'admin/index.php?delete-post-ok=ok&action=list-posts');
    }

    $all_posts = Post::_getAllPosts();

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
