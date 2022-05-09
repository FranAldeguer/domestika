<?php require __DIR__ . '/../../templates/header.php';?>



  <h1>Mi perfil </h1>
  <table>
      <tr> <td>Usuario: </td> <td> <?php echo $_SESSION['user_name']; ?></td></tr>
      <tr> <td>Email: </td> <td> <?php echo $_SESSION['user_email']; ?></td></tr>
      <tr> <td>Rol: </td> <td> <?php echo $_SESSION['user_role']; ?></td> </tr>
  </table>


<?php require __DIR__ . '/../../templates/footer.php'; ?>
