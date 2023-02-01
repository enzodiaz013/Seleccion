<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Nuevo usuario creado correctamente, ahora debes iniciar sesion.';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
    }
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="tres">

    

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    
    <form action="login.php"><button class="dos">Iniciar sesion</button></form>
    <section id="registrate">
    <form action="signup.php" method="POST">
      <input class="registrarse" name="email" type="text" placeholder="Enter your email">
      <input class="registrarse" name="password" type="password" placeholder="Enter your Password">
      <input class="registrarse" name="confirm_password" type="password" placeholder="Confirm Password">
      <input class="boton" type="submit" value="Submit">
    </form>

    </section>

    

  </body>
</html>