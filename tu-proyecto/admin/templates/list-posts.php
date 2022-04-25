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
        <td> <?php echo $post['title']; ?> </td>
        <td>
          <a href="<?php echo SITE_URL ?>/admin?action=new-post&update-post=<?php echo $post['id']; ?>"> Modificar </a>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <a href="<?php echo SITE_URL ?>/admin?action=list-posts&delete-post=<?php echo $post['id']; ?>&hash=<?php echo generate_hash( 'delete-post-' . $post['id']); ?>"> Eliminar </a>
        </td>
      </tr>
    <?php endforeach?>
  </table>

<?php require __DIR__ . '/../../templates/footer.php'; ?>
