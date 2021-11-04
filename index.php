<?php

//Incluyo el documento con las cookies
include "cookies/idioma.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/9d7641bf78.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="img/elefante.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/fontello.css"> 
    <link rel="stylesheet" href="css/baner.css">
    <link rel="stylesheet" href="css/generador-codigo.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="css/media-queries.css">
    <link rel="stylesheet" href="css/servicios.css">

    <title>Xavi Yamuza - M7</title>
</head>

<body>

    <main>

        <section id="banner">

            <img src="img/sky--purple-kracked.jpg">

            <div class="contenedor">
                <div id="logo">
                    <img src="img/elefante.png" style="width: 15%;">
                </div>
                <h2>M7 - PHP</h2>
                <p><?php echo $titleWeb ?></p>
            </div>
        </section>

        <section id="navegador">
            <nav>
                <ul>
                    <li><a href="index.php"><?php echo $mainHome ?></a></li>
                    <li><a href="#"><?php echo $mainExercise ?></a>

                        <div>

                            <ul>
                                <li class="titulo lila "><a href=""></a></li>
                                <li><a href="html/E01-Metodos.php"><?php echo $ejer1 ?></a></li>
                                <li><a href="html/E02-Sintaxi-de-variables.php"><?php echo $ejer2 ?></a></li>
                                <li><a href="html/E03-EstructuresControl.php"><?php echo $ejer3 ?></a></li>
                                <li><a href="html/E05-CapturaImatgesExternes.php"><?php echo $ejer5 ?></a></li>
                            </ul>

                            <ul>
                                <li class="titulo lila"><a href=""></a></li>
                                <li><a href="html/E06-Webscraping.php"><?php echo $ejer6 ?></a></li>
                                <li><a href="html/E07-Cotitzacions.php"><?php echo $ejer7 ?></a></li>
                                <li><a href=""><?php echo $soon ?></a></li>
                                <li><a href=""><?php echo $soon ?></a></li>
                            </ul>
<!--
                            <ul>
                                <li class="titulo verde"><a href="">Categoria #1</a></li>
                                <li><a href="">Categoria #2</a></li>
                                <li><a href="">Categoria #3</a></li>
                                <li><a href="">Categoria #4</a></li>
                                <li><a href="">Categoria #5</a></li>
                            </ul>
-->
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
                    <li><a href="#"><?php echo $mainProducts ?></a></li>
                    <li><a href="#"><?php echo $mainAbout ?></a></li>
                    <li><a href="#"><?php echo $mainLanguage ?></a>
                    <div id="boxIdioma">
                        <ul>
                                <li><a href="?lang=es"><img src="img/flag/spain.jpg"> Español</a></li>
                                <li><a href="?lang=cat"><img src="img/flag/cat.jpg"> Catalan</a></li>
                                <li><a href="?lang=en"><img src="img/flag/english.jpg"> English</a></li>
                                <li><a href="?lang=ger"><img src="img/flag/ger.jpg"> Deutsh</a></li>
                                <li><a href="?lang=fr"><img src="img/flag/fr.jpg"> Français</a></li>

                        </ul>
                    </div>
                    </li>
                </ul>
            </nav>
        </section>



        <section id="servicios">

            <div class="contenedor boxEjercicios">
                <a href="html/E02-Sintaxi-de-variables.php">
                    <article>
                        <img src="img/e01.png">
                        <h4 class="titulo-ejercicio"><?php echo $e02 ?></h4>
                    </article>
                </a>
                <a href="html/E03-EstructuresControl.php">
                    <article>
                        <img src="img/eo3.png">
                        <h4 class="titulo-ejercicio"><?php echo $e03 ?></h4>
                    </article>
                </a>
                <a href="html/E05-CapturaImatgesExternes.php">
                    <article>
                        <img src="img/eo5.png">
                        <h4 class="titulo-ejercicio"><?php echo $e05 ?></h4>
                    </article>
                </a>
                <a href="html/E06-Webscraping.php">
                    <article>
                        <img src="img/e06-scraping.png">
                        <h4 class="titulo-ejercicio"><?php echo $e06 ?></h4>
                    </article>
                </a>
                <a href="html/E07-Cotitzacions.php">
                    <article>
                        <img src="img/e07.png">
                        <h4 class="titulo-ejercicio"><?php echo $e07 ?></h4>
                    </article>
                </a>
            </div>
        </section>

        <footer>
  <div class="contenedor">
  <p class="copy">Xavi Yamuza &copy; 2021</p>
  <div class="redes">
  <a href="https://github.com/azumay" target="_blank"><i class="fab fa-github"></i></a>
  <a href="https://www.instagram.com/azumay404/" target="_blank" class="icon-instagram"></a>
  <a href="https://www.linkedin.com/in/xavi-yamuza-3016a2144/" target="_blank"><i class="fab fa-linkedin"></i></a>

  </div>
  </div>
</footer>
    </main>



</body>

</html>
