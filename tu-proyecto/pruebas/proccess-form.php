<?php require('init.php');?>
<?php require('templates/header.php');?>

<?php
if ( isset($_POST['submit-new-post'])){
  echo "Título: " .  $_POST[ 'title' ] . "</br>";
  echo "Extracto: " . $_POST['excerpt'] . "</br>";
  echo "Contenido: " . $_POST['content'] . "</br>";
}
?>
<?php require('templates/footer.php');?>
