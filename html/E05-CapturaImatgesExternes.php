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
    
    <link rel="stylesheet" href="../css/baner.css">
    <link rel="stylesheet" href="../css/generador-codigo.css">
    <link rel="stylesheet" href="../css/estilos_E03.css">
    <link rel="stylesheet" href="../css/estilos_E05.css">
   

    <title>Xavi Yamuza - M7</title>
</head>

<body>

    <main>

        <!--CABECERA Y TITULO WEB -->

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

        <!--INICIO MENU -->

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



        <!--INICIO BOX EJERCICIO -->


        <section id="generador-codigo-no-color">



            <div id="box_E03">



                <div id="titulo-generador">
                    <h2>E05 - Captura d'imatges externes</h2>


                    <span class="tecnologia_usada">
                        <img src="../img/html.png">
                        <img src="../img/css-3.png">
                        <img src="../img/php.png">
                    </span>
                    <br><br>

                    <div id="box-imagenes">
                        <h3>Tabla de imagenes:</h3>
                        <br>



                        <?php

//Obetenemos los datos de la siguiente URL
$data = file_get_contents("https://www.portalmochis.net/humor/comic/");
 
//Hacemos un primer filtro de todos los datos hasta los <hr>
$filtro1 = substr($data, strpos($data, "<hr>"));

//Aquí divido el resultado anterior en varios trozos desde la posicion de href
$filtro2 = explode('href="', $filtro1);

//Obtengo el largo de la variable anterior para el bucle
$numeroImagenes = sizeof($filtro2);

echo "<table id='tabla-img'>";

for ($i = 3 ; $i < $numeroImagenes ; $i++){ //Empiezo en la posicion 3, ya que las primeras img son iconos y no cargan
  
  echo "<tr>";

  //Creo una variable con el valor desde el primer valor de la posicion 0 hasta las comillas dobles que sería el final del path
  $imgPath = substr($filtro2[$i],0, strpos($filtro2[$i], '"'));

  for ($x = 0 ; $x < 3 ; $x++){ // Este bucle me va crear las 3 columnas con imagenes
    echo "<td>";
    $imgPath = substr($filtro2[$i],0, strpos($filtro2[$i], '"'));

      echo "<img src='http://www.portalmochis.net$imgPath'";
    
    $i++; //Aquí incremento en 1 para la siguiente imagen
    echo "</td>";
  }
 
 
  echo "</tr>";
  }

echo "<table/>";

?>


                    </div>


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
        <!-------------- FOOTER MEJORAR
<footer>
  <div class="contenedor">
  <p class="copy">Informática 24 &copy; 2019</p>
  <div class="redes">
  <a href="" class="icon-facebook-squared"></a>
  <a href="" class="icon-instagram"></a>
  <a href="" class="icon-twitter-squared"></a>

  </div>
  </div>
</footer>

---------------------------------------->



    </main>



</body>

</html>