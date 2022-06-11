<?php require __DIR__ . '/../../templates/header.php'; ?>

<?php $is_update = isset($_GET['update-post']) ?>

<h2> <?php echo $is_update ? "Actualizar post" : "Nuevo post" ?> </h2>

<!-- Mostramos el error si lo hubiera -->
<?php if($error):?>
<div class="error">
 <?php echo "Error en el formulario"; ?>
</div>
<?php endif;?>
<?php

if($is_update){
    $update_post = Post::_getPost($_GET['update-post']);
    $title = $update_post->getTitle();
    $excerpt = $update_post->getExcerpt();
    $content = $update_post->getContent();
    $user = $update_post->getUser_id();
    $id = $update_post->getId();
}

 ?>
<!-- Inicio del formulario -->
<form action="" method="post" enctype="multipart/form-data">
  <!--
                                  SANEAR CONTENIDO DE SALIDA
          Con htmlspecialchars convertimos los caracteres espceciales en entidades html
          Un signo < lo convertirá en &lt; Unas comillas simples '' en #039; etc...
          Todo dependerá del tipo de filtro de saneamiento que le pongamos
          https://www.php.net/manual/es/function.htmlspecialchars.php
  -->
  <label for="title"> Título </label>
  <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title, ENT_QUOTES); ?>">
      
  <label for="excerpt"> Extracto </label>
  <input type="text" name="excerpt" id="excerpt" value="<?php echo htmlspecialchars($excerpt, ENT_QUOTES); ?>">

  <label for="content"> Contenido </label>
  <textarea name="content" id="content" cols="30" rows="30"><?php echo htmlspecialchars($content, ENT_QUOTES); ?></textarea>
  
  <label for="post-img">Imagen principal</label>
  <input type="file" id="post-img" name="post-img"><br>


  <input type="submit"
    name="<?php echo !$is_update ? 'submit-new-post' : 'submit-update-post'?>"
    value="<?php echo !$is_update ? 'Nuevo Post' : 'Actualizar post'?>"
  >


    <input type="hidden" id="postid" name="postid" value="<?php echo $id; ?>">
    <input type="hidden" id="published_on" name="published_on" value="<?php echo $id; ?>">
    <?php if ($is_update):?>
      <input type="hidden" id="userid" name="userid" value="<?php echo $user; ?>">
    <?php endif;?>
    
</form>

<!-- Fin del formulario -->

<?php require __DIR__ . '/../../templates/footer.php'; ?>
