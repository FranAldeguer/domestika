<?php require __DIR__ . '/../../templates/header.php'; ?>
<h2>Crear nuevo post</h2>

<?php if ( $error ): ?>
	<div class="error">
		Error en el formulario.
	</div>
<?php endif; ?>

<form action="" method="post">
	<label for="title">Título (requerido)</label>
	<input type="text" name="title" id="title" value="<?php echo htmlspecialchars( $title, ENT_QUOTES ); ?>">

	<label for="excerpt">Extracto</label>
	<input type="text" name="excerpt" id="excerpt" value="<?php echo htmlspecialchars( $excerpt, ENT_QUOTES ); ?>">

	<label for="content">Contenido (Requerido)</label>
	<textarea name="content" id="content" cols="30" rows="30"><?php echo htmlspecialchars( $content, ENT_QUOTES ); ?></textarea>

	<p>
		<input type="submit" name="submit-new-post" value="Nuevo post">
	</p>
</form>
<?php require __DIR__ . '/../../templates/footer.php'; ?>
