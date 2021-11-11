<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../img/elefante.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/baner.css">
    <link rel="stylesheet" href="../css/generador-codigo.css">
    <link rel="stylesheet" href="../estilos.css">

    <title>Xavi Yamuza - M7</title>
</head>

<body>

    <main>

        <section id="banner">

            <img src="../img/sky--purple-kracked.jpg">

            <div class="contenedor">
                <div id="logo">
                    <img src="../img/elefante.png" style="width: 15%;">
                </div>
                <h2>M7 - PHP</h2>
                <p>Desenvolupament web en entorn servidor</p>
            </div>
        </section>

        <section id="navegador">
            <nav>
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="#">Ejercicios</a>

                        <div>

                        <ul>
                            <li class="titulo negro"><a href=""></a></li>
                            <li><a href="E01-Metodos.php">E01: Mètodes HTML</a><li>
                                <li><a href="E02-Sintaxi-de-variables.php">E02 - Operadors bàsics</a></li>
                                <li><a href="E03-EstructuresControl.php">E03 - Funcions html</a></li>
                                <li><a href="E05-CapturaImatgesExternes.php">E05 - Captura d'imatges externes</a></li>
                            </ul>

                            <ul>
                                <li class="titulo azul"><a href=""></a></li>
                                <li><a href="E06-Webscraping.php">E06 - Web scraping</a></li>
                                <li><a href="E07-Cotitzacions.php">E07-Cotitzacions</a></li>
                                <li><a href="E09-Formulari.php">E09 - Formulari de contacte</a></li>
                                <li><a href="">Proximamente...</a></li>
                            </ul>
  <!--

                            <ul>
                                <li class="titulo verde"><a href="">Categoria #1</a></li>
                                <li><a href="">Categoria #2</a></li>
                                <li><a href="">Categoria #3</a></li>
                                <li><a href="">Categoria #4</a></li>
                                <li><a href="">Categoria #5</a></li>
                            </ul>
                            <!--
            <ul>
              <li class="titulo rojo"><a href="">Categoria #1</a></li>
              <li><a href="">Categoria #2</a></li>
              <li><a href="">Categoria #3</a></li>
              <li><a href="">Categoria #4</a></li>
              <li><a href="">Categoria #5</a></li>
            </ul>

            <ul>
              <li class="titulo naranja"><a href="">Categoria #1</a></li>
              <li><a href="">Categoria #2</a></li>
              <li><a href="">Categoria #3</a></li>
              <li><a href="">Categoria #4</a></li>
              <li><a href="">Categoria #5</a></li>
            </ul>
-->
                        </div>

                    </li>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Acerca de</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </section>




        <section id="generador-codigo">

            <form method="post">
                <div id="caja-generador">
                    <div id="titulo-generador">
                        <h2>E02 Sintaxi de variables</h2>
                        <p>Generador de claves mediante PHP</p>
                        <span class="tecnologia_usada">
                            <img src="../img/html.png">
                            <img src="../img/css-3.png">
                            <img src="../img/php.png">
                        </span>


                    </div>
                    <p id="password">

                        <?php

/* MANERA 1:

//Defino una variable con los caracteres
$caracteres = 'QWERTYUIOPASDFGHJKLZXCVBNM123456789';

#Defino otra variable y le paso la anterior variable
$aleatorio = substr(str_shuffle($caracteres), 0, 6);

echo $aleatorio;
 */

$numeros = range(0, 9);
$caracteres = range('A', 'Z');

$fusionArrays = array_merge($numeros, $caracteres);
$resultado = array();

if ($_POST) {
    for ($x = 0; $x <= 5; $x++) {
        $pos = rand(0, 35);
        array_push($resultado, $fusionArrays[$pos]);
    }
}

foreach ($resultado as $cadena) {
    echo $cadena;
}

?>


                    </p>
                    <div id="caja-buton-pass">
                        <button name="boton" formaction="E02-Sintaxi-de-variables.php">

                            Generar
                            <span id="candado"> <img src="../img/contrasena.png"></span>

                        </button>
                    </div>
                </div>
            </form>


        </section>





        <section id="servicios">
            <div class="contenedor">
                <article>
                    <img src="../img/pc-medida.png">
                    <h4>Montaje PC a medida</h4>
                </article>

                <article>
                    <img src="../img/web.png">
                    <h4>Diseño web a medida</h4>
                </article>

                <article>
                    <img src="../img/reparar-pc.png">
                    <h4>Reparación de equipos e instalación de S.O</h4>
                </article>


            </div>

        </section>
        <footer>
            <div class="contenedor">
                <p class="copy">Xavi Yamuza &copy; 2021</p>

            </div>
        </footer>
    </main>



</body>

</html>