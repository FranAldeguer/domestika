<?php
// Tipos de cabecera
	//header( 'Content-Type: application/pdf'); -> Cambiamos el tipo de contenido y le decimos que es un pdf
	// http_response_code( 404 ); -> Esto le envía un código de error 404.
			//El contenido se segurá mostrando, pero Google verá un Not Found y jamás lo indexará
?>
<?php require('init.php');?>
<?php

#Recuperar todos los posts de la base de datos
$all_posts = get_all_posts();
$post_found = false;

// Recupera un post de la base de datos
if( isset($_GET['view'])){
	$all_posts = get_post($_GET['view']);
	if ( $post_found ){
		$all_posts = [$post_found];
	}
	$post_found = true;
}

?>

<!-- Insertamos el archivo templates/header.php con las cabeceras -->
<?php require('templates/header.php') ?>

<!-- MENSAJES DE ERROR -->
<?php if( isset( $_GET['success'] ) ):?>
	<div class="success">
		 El post ha sido creado
	</div>
<?php endif; ?>
<?php if( isset( $_GET['updated'] ) ):?>
	<div class="success">
		 El post ha sido modificado
	</div>
<?php endif; ?>
<!-- END MENSAJES DE ERROR -->

<div class="posts">
	<?php foreach ($all_posts as $post): ?>
		<article class="post">
			<header>
				<a href ="?view=<?php echo $post['id']; ?>" ><h2 class="post-title"> <?php echo $post['title']; ?> </a>
				</header>
				<div class="post-content">
					<?php if($post_found){
						echo $post['content'];
					} else {
						echo $post['excerpt']; } ?>
					</div>
					<footer>
						<span class="post-date"> Publicado en:
							<?php echo strftime('%d %b %Y', strtotime($post['published_on'])) ?>
						</span>
					</footer>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- Insertamos el archivo templates/footer.php con el pie de página -->
		<?php require('templates/footer.php') ?>
