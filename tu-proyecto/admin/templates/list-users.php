<?php require __DIR__ . '/../../templates/header.php';?>
<?php if( isset( $_GET['delete-post-ok'] ) ):?>
  <div class="delete-post">
    El usuario ha sido borrado
  </div>
<?php endif; ?>
<?php if( isset( $_GET['success'] ) ):?>
  <div class="success">
  	El usuario ha sido <?php echo $_GET['success'] == "new" ? 'creado' : 'modificado';?> correctamente
  </div>
<?php endif; ?>

  <table>
    <?php foreach ($all_users as $user) : ?>
      <tr>
        <td> <?php echo $user->getName(); ?> </td>
        <td> <?php echo $user->getEmail(); ?> </td>
        <td> <?php echo $user->getRole(); ?> </td>
        <td>
          <?php echo generate_update_user_url($user->getId(), "Modificar"); ?>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo generate_delete_user_url($user->getId(), "Eliminar"); ?>
        </td>
      </tr>
    <?php endforeach?>
  </table>

<?php require __DIR__ . '/../../templates/footer.php'; ?>
