<?php require __DIR__ . '/../../templates/header.php';?>
<?php if( isset( $_GET['delete-post-ok'] ) ):?>
  <div class="delete-post">
    El post ha sido borrado
  </div>
<?php endif; ?>
<?php if( isset( $_GET['success'] ) ):?>
  <div class="success">
    El post ha sido creado
  </div>
<?php endif; ?>

  <table>
    <?php foreach ($all_posts as $post) : ?>
      <tr>
        <td> <?php echo $post->getId(); ?> </td>
        <td> <?php echo $post->getTitle(); ?> </td>
        <td>
          <?php echo generate_update_post_url($post->getId(), "Modificar"); ?>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo generate_delete_post_url($post->getId(), "Eliminar"); ?>
        </td>
      </tr>
    <?php endforeach?>
  </table>

<?php require __DIR__ . '/../../templates/footer.php'; ?>
