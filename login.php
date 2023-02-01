<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /seleccion');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /seleccion");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="tres">
    

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    
    
    <form action="signup.php"><button class="dos">Registrate</button></form>
<section id="registrate">
<form action="login.php" method="POST">
      <input class="registrarse" name="email" type="text" placeholder="Enter your email">
      <input class="registrarse" name="password" type="password" placeholder="Enter your Password">
      <input class="boton" type="submit" value="Submit">
    </form>
</section>
    
  </body>
</html>