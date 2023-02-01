<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Seleccion</title>
</head>
<body>
    <header>
        <div class="container">
            <p class="logo">Seleccion Argentina</p>
            <nav>
                <a href="#messi">Messi</a>
                <a href="#referentes">Nuestros referentes</a>
                <a href="#jugadores"> Jugadores de la seleccion</a>
                <a href="signup.php">Registrate</a>
                <a href="login.php">Iniciar sesion</a>
                <a href="#comentarios">Comentar</a>
            </nav>
        </div>

    </header>
    
    <section id="banner">
    <?php if(!empty($user)): ?>
      <br> 
      <h1>Bienvenido</h1> <h1><?= $user['email']; ?></h1>
      <br><h1>Has iniciado sesion correctamente</h1>
      <form action="logout.php"><button>logout</button></form>
    <?php else: ?>
        <h1>¿Queres saber mas sobre<br> los jugadores de la seleccion?</h1>
        <form action="signup.php">
            <button>registrate</button>
        </form>
        <form action="login.php">
        <button>Iniciar sesion</button>
        </form>
    <?php endif; ?>
        
        

    </section>
    <section id="messi">
     <div class="container">
        <div class="img-messi"></div>
        <div class="carta">
        <h2>Lionel Messi</h2>
        <p>Lionel Andrés Messi Cuccittini (Rosario, 24 de junio de 1987), conocido como Leo Messi, es un futbolista argentino que juega como delantero o centrocampista. Jugador histórico del Fútbol Club Barcelona, al que estuvo ligado veinte años, desde 2021 integra el plantel del Paris Saint-Germain de la Ligue 1 de Francia. Es también internacional con la selección de Argentina, equipo del que es capitán.</p>
        <br>
        <p>Considerado con frecuencia el mejor jugador del mundo y uno de los mejores de todos los tiempos,9​ es el único futbolista en la historia que ha ganado, entre otras distinciones, siete veces el Balón de Oro, seis premios de la FIFA al mejor jugador del mundo, seis Botas de Oro y dos Balones de Oro de la Copa Mundial de Fútbol. En 2020, se convirtió en el primer futbolista y el primer argentino en recibir un premio Laureus, además de ser incluido en el Dream Team del Balón de Oro.</p>
        <form action="https://es.wikipedia.org/wiki/Lionel_Messi">
            <button>+info</button>
        </form>
    </div>
    </div>
    </section>

    <section id="referentes">
        <div class="container">
            <h2>Referentes</h2>
         <div class="programa">
            <div class="cartas">
                <h2>Di maria</h2>
                <p>Ángel Fabián Di María (Rosario, 14 de febrero de 1988) es un futbolista argentino. Juega de extremo en la Juventus de Turín de la Serie A de Italia. Es jugador internacional con la selección argentina.</p>
                <form action="https://es.wikipedia.org/wiki/%C3%81ngel_Di_Mar%C3%ADa">
                    <button>+info</button>
                </form>
            </div>
            <div class="cartas">
                <h2>Otamendi</h2>
                <p>Nicolás Hernán Gonzalo Otamendi (Ciudad Autónoma de Buenos Aires,​ Argentina, 12 de febrero de 1988) es un futbolista argentino que juega como defensor y su actual equipo es el S. L. Benfica de la Primeira Liga de Portugal y para la selección argentina.</p>
                <form action="https://es.wikipedia.org/wiki/Nicol%C3%A1s_Otamendi">
                    <button>+info</button>
                </form>
            </div>
            <div class="cartas">
                <h2>Aguero</h2>
                <p>Sergio Leonel Agüero del Castillo (Ciudad Autónoma de Buenos Aires, Argentina; 2 de junio de 1988), conocido comúnmente como Kun Agüero, es un exfutbolista, empresario y comentarista deportivo argentino que jugaba como delantero y su último equipo fue F. C. Barcelona de la Primera División de España.</p>
                <form action="https://es.wikipedia.org/wiki/Kun_Ag%C3%BCero">
                    <button>+info</button>
                </form>
            </div>
         </div>
        </div>
    </section>

    <section id="jugadores">
        <div class="container">
                <h2>Jugadores</h2>
            <div class="programas">
                <div class="cartita">
                    <h2>Julian Alvarez</h2>
                    <p>Julián Álvarez (Calchín, Córdoba, 31 de enero de 2000) es un futbolista argentino que juega como delantero en el Manchester City F. C. de la Premier League de Inglaterra. Es internacional con la selección argentina desde 2021.</p>
                    <form action="https://es.wikipedia.org/wiki/Juli%C3%A1n_%C3%81lvarez_(futbolista)">
                        <button>+info</button>
                    </form>
                </div>
                <div class="cartita">
                    <h2>Dibu Martinez</h2>
                    <p>Damián Emiliano Martínez (Mar del Plata, 2 de septiembre de 1992), conocido comúnmente como «Dibu» Martínez, es un futbolista argentino que juega de arquero, en el Aston Villa de la Premier League de Inglaterra, y es internacional con la selección argentina.</p>
                    <form action="https://es.wikipedia.org/wiki/Emiliano_Mart%C3%ADnez">
                        <button>+info</button>
                    </form>
                </div>
                <div class="cartita">
                    <h2>Alexis Mac Allister</h2>
                    <p>Alexis Mac Allister (Santa Rosa, provincia de La Pampa; 24 de diciembre de 1998) es un futbolista argentino. Se desempeña como mediocampista ofensivo o volante mixto1​ en el Brighton & Hove Albion de la Premier League de Inglaterra</p>
                    <form action="https://es.wikipedia.org/wiki/Alexis_Mac_Allister">
                        <button>+info</button>
                    </form>
                </div>
            </div>
        </div>
            <section id="jugadores2">
            <div class="programas2">
                <div class="cartitas">
                    <h2>Enzo Fernandez</h2>
                    <p>Enzo Jeremías Fernández (San Martín, 17 de enero de 2001) es un futbolista argentino. Se desempeña como mediocampista y actualmente juega en el Sport Lisboa e Benfica de Portugal. Es internacional absoluto con la selección argentina.</p>
                    <form action="https://es.wikipedia.org/wiki/Enzo_Fern%C3%A1ndez">
                        <button>+info</button>
                    </form>
                </div>
                <div class="cartitas">
                    <h2>Rodrigo De Paul</h2>
                    <p>Rodrigo Javier de Paul Ferrarotti (Sarandí, Buenos Aires, 24 de mayo de 1994) es un futbolista profesional argentino que juega como centrocampista en el Atlético de Madrid de la Primera División de España. Es internacional con la selección argentina.</p>
                    <form action="https://es.wikipedia.org/wiki/Rodrigo_de_Paul">
                        <button>+info</button>
                    </form>
                </div>
                <div class="cartitas">
                    <h2>Cuti Romero</h2>
                    <p>Cristian Gabriel "Cuti" Romero (Córdoba, 27 de abril de 1998) es un futbolista argentino. Juega de defensor y su equipo es el Tottenham Hotspur F. C. de la Premier League de Inglaterra. Es internacional con la selección argentina. En la temporada 2020-21 fue condecorado con el premio al mejor defensor de la Serie A.1​</p>
                    <form action="https://es.wikipedia.org/wiki/Cristian_Romero">
                        <button>+info</button>
                    </form>
                </div>
            </div>
              </section>
              
              <form method="POST" action="enviarcomentarios.php">
            <section id="comentarios">
                
                            <h2>Comentarios</h2>
                            
                                
                                    <h3>¡Haz un Comentario!</h3>
                                    <br>
                                <div class="nombre">
                                    <label for="nombre" class="nombreee">Nombre</label>
                                    <input  class="nombree" name="nombre" type="text" id="nombre" placeholder="Escribe tu nombre" required >
                                </div>
                                    <br>
                                <div class="comentar">
                                    <label for="comentario" class="comentarrr">Comentario:</label>
                                    <textarea class="comentarr" name="comentario" cols="30" rows="5" type="text" id="comentario" 
                                    placeholder="Escribe tu comentario......"></textarea>
                                 </div>
                            <br>
                            <input class="enviar" type="submit"  value="Enviar Comentario">
                            <br>
                            <br>
                            <br>
                            <div class="caja">
                            <?php

$conexion=mysqli_connect("localhost","root","","blog"); 
$resultado= mysqli_query($conexion, 'SELECT * FROM comentarios');

while($comentario = mysqli_fetch_object($resultado)){

    ?>

    <b><?php echo($comentario->nombre);  ?></b>(<?php echo ($comentario->fecha); ?>) Dijo: 
    <br />
    <?php echo ($comentario->comentario);?>
    <br />
    <hr />




    <?php
}
 ?>
</div>
            </section>
            <footer>
                <span class="copyright">&copy;2023, krey Academy. All rights reserverd</span>
            </footer>
        
</body>
</html>