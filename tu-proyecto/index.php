<?php
// Tipos de cabecera
// header( 'Content-Type: application/pdf'); -> Cambiamos el tipo de contenido y le decimos que es un pdf
// http_response_code( 404 ); -> Esto le envía un código de error 404.
// El contenido se segurá mostrando, pero Google verá un Not Found y jamás lo indexará
?>
<?php require('init.php');?>
<?php

// Recuperar todos los posts de la base de datos
$all_posts = Post::_getAllPosts();

// var_dump($all_posts);

$post_found = false;

// $posttemp = Post::_getPost($_GET['view']);
// var_dump($posttemp);
// Recupera un post de la base de datos
if (isset($_GET['view'])) {

    $all_posts = [
        Post::_getPost($_GET['view'])
    ];
    if ($post_found) {
        die("llega ok - index.php:19");

        $all_posts = $post_found;
    }
    $post_found = true;
}
?>

<!-- Insertamos el archivo templates/header.php con las cabeceras -->
<?php require('templates/header.php') ?>

<!-- MENSAJES DE ERROR -->
<?php if( isset( $_GET['success'] ) ):?>
<div class="success">El post ha sido creado</div>
<?php endif; ?>
<?php if( isset( $_GET['updated'] ) ):?>
<div class="success">El post ha sido modificado</div>
<?php endif; ?>
<!-- END MENSAJES DE ERROR -->

<div class="posts">
	<?php foreach ($all_posts as $post): ?>
    
  
  
  
     <?php if(isset($_GET['view'])) : ?>
     <div>
          <div>
      <?php else : ?>
      <div class="wrapper">
       <div class="one">
      <?php endif; ?>
  
  
      <a href="?view=<?php echo $post->getId() ?>">
      <?php if(isset($_GET['view'])) : ?>
          <img
        src=" <?php echo IMGS_URL ."/". $post->getImgName()."-".IMG_POST_HEADER_w."x".IMG_POST_HEADER_h.".jpg"; ?>">
      <?php else : ?>
         <img
        src=" <?php echo IMGS_URL ."/". $post->getImgName()."-".IMG_POST_PREVIEW_w."x".IMG_POST_PREVIEW_h.".jpg"; ?>">
      <?php endif; ?>
    </a>
    </div>
     <?php if(isset($_GET['view'])) : ?>
          <div>
      <?php else : ?>
       <div class="two">
      <?php endif; ?>
      <article class="post">

        <!-- Título del post -->
        <header>

          <h2 class="post-title">
            <a href="?view=<?php echo $post->getId() ?>"> <?php echo $post->getTitle(); ?></a>
          </h2>

        </header>


        <!-- Extracto o contendio del post -->
        <div class="post-content">
        <?php

    if ($post_found) {
        if (isset($_GET['updated'])) {
            echo 'Extracto : ' . $post->getExcerpt() . '</div><div class="post-content"><br>Contenido :<br>';
        }
        echo $post->getContent();
    } else {
        echo $post->getExcerpt();
    }
    ?>
      </div>

			<?php if(is_logged_in() && isset($_GET['view'])) : ?>
				<div class="post-content">
          <br>
          <p><?php echo generate_update_post_url($post->getId(), "Modificar post");?></p>
        </div>
    
    
			<?php endif; ?>
      <footer>
      <span class="post-date"> Publicado en:
          <?php echo strftime('%d %b %Y', strtotime($post->getPublished_on())) . " por " . User::_getUser($post->getUser_id())->getName(); ?>
        </span>
    </footer>
    </article>
</div>
 </div>
  <?php endforeach; ?>
   
</div>

<!-- Insertamos el archivo templates/footer.php con el pie de página -->
<?php require('templates/footer.php') ?>
