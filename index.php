<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

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
                <p>Desenvolupament web en entorn servidor</p>
            </div>
        </section>

        <section id="navegador">
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Ejercicios</a>

                        <div>

                            <ul>
                                <li class="titulo"><a href=""></a></li>
                                <li><a href="html/E01-Metodos.php">E01: Mètodes HTML</a></li>
                                <li><a href="html/E02-Sintaxi-de-variables.php">E02 - Operadors bàsics</a></li>
                                <li><a href="html/E03-EstructuresControl.php">E03 - Funcions html</a></li>
                                <li><a href="html/E05-CapturaImatgesExternes.php">E05 - Captura d'imatges externes</a></li>
                            </ul>

                            <ul>
                                <li class="titulo azul"><a href=""></a></li>
                                <li><a href="html/E06-Webscraping.php">E06 - Web scraping</a></li>
                                <li><a href="html/E07-Cotitzacions.php">E07-Cotitzacions</a></li>
                                <li><a href="">Categoria #4</a></li>
                                <li><a href="">Categoria #5</a></li>
                            </ul>

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
                    <li><a href="#">Idioma</a>
                    <div id="boxIdioma">
                        <ul>
                                <li><a href=""><img src="img/spain.jpg"> Español</a></li>
                                <li><a href=""><img src="img/english.jpg"> English</a></li>
                                <li><a href=""><img src="img/ger.jpg"> Deutsh</a></li>
                                <li><a href=""><img src="img/fr.jpg"> Français</a></li>
                            
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
                        <h4 class="titulo-ejercicio">E02 Sintaxi de variables</h4>
                    </article>
                </a>
                <a href="html/E03-EstructuresControl.php">
                    <article>
                        <img src="img/eo3.png">
                        <h4 class="titulo-ejercicio">E03 - Funcions html</h4>
                    </article>
                </a>
                <a href="html/E05-CapturaImatgesExternes.php">
                    <article>
                        <img src="img/eo5.png">
                        <h4 class="titulo-ejercicio">E05 - Captura d'imatges externes</h4>
                    </article>
                </a>
                <a href="html/E06-Webscraping.php">
                    <article>
                        <img src="img/e06-scraping.png">
                        <h4 class="titulo-ejercicio">E06 - Web scraping</h4>
                    </article>
                </a>
                <a href="html/E07-Cotitzacions.php">
                    <article>
                        <img src="img/e07.png">
                        <h4 class="titulo-ejercicio">E07-Cotitzacions</h4>
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
