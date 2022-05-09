<?php require __DIR__ . '/../../templates/header.php'; ?>

<?php $is_update = isset($_GET['update-user']) ?>

<h2> <?php echo $is_update ? "Actualizar usuario" : "Nuevo usuraio" ?> </h2>

<!-- Mostramos el error si lo hubiera -->
<?php if($error):?>
<div class="error">
 <?php echo "Error en el formulario"; ?>
</div>
<?php endif;?>
<?php

if($is_update){
    $nuevoUsuario = User::_getUser($_GET['update-user']);
    /*$title = $update_post[0]['title'];
    $excerpt = $update_post[0]['excerpt'];
    $content = $update_post[0]['content'];
    $id = $update_post[0]['id'];*/
}

 ?>
<!-- Inicio del formulario -->
<form action="" method="post">

  <label for="name"> Nombre </label>
  <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($nuevoUsuario->getName(), ENT_QUOTES); ?>">

  <label for="email"> Email </label>
  <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($nuevoUsuario->getEmail(), ENT_QUOTES); ?>">

  <label for="password"> Contraseña </label>
  <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($nuevoUsuario->getPassword(), ENT_QUOTES); ?>">

  <label for="role"> Rol </label>
  <select name="role" id="role">
    <option value=<?php echo htmlspecialchars("admin", ENT_QUOTES); echo $nuevoUsuario->getRole() == 'admin' ?  ' selected' : "";  ?>>Administrador</option>
    <option value=<?php echo htmlspecialchars("editor", ENT_QUOTES); echo $nuevoUsuario->getRole() == 'editor' ?  ' selected' : "";  ?>>Editor</option>
    <option value=<?php echo htmlspecialchars("creador", ENT_QUOTES); echo $nuevoUsuario->getRole() == 'creador' ?  ' selected' : "";  ?>>Creador</option>
  </select>

  <input type="submit"
    name="<?php echo !$is_update ? 'submit-new-user' : 'submit-update-user' ?>"
    value="<?php echo !$is_update ? 'Nuevo Usuario' : 'Actualizar Usuario'?>"
  >


    <input type="hidden" id="userid" name="userid" value="<?php echo $nuevoUsuario->getId(); ?>">

</form>

<!-- Fin del formulario -->

<?php require __DIR__ . '/../../templates/footer.php'; ?>
