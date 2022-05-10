<?php require __DIR__ . '/../../templates/header.php';?>
<div class="center">
  <h2>Administración</h2>

  <h4>Posts</h4>
  <ul>
    <li><a href="?action=list-posts"> Listado de posts </a></li>
    <li><a href="?action=new-post"> Nuevo post</a></li>
  </ul>

  <h4>Usuarios</h4>
  <ul>
    <li><a href="?action=list-users"> Listado de usuarios </a></li>
    <li><a href="?action=new-user"> Nuevo usuario </a></li>
  </ul>

</div>

<?php require __DIR__ . '/../../templates/footer.php'; ?>
