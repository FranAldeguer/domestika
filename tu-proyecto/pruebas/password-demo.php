<h1>Password demo </h1>

<?php
  $pass = "contraseña";

  var_dump($pass);

  var_dump(PASSWORD_BCRYPT);

  $opciones = [
    'cost' => 11
  ];

  $hash = password_hash($pass, PASSWORD_BCRYPT, $opciones);

  var_dump($hash);

  $auth = password_verify($pass, $hash);

  var_dump($auth);
?>
