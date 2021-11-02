<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

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
    <link rel="stylesheet" href="../css/estilos_E03.css">
    <link rel="stylesheet" href="../css/estilos_E05.css">
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../css/menu.css">
    
    <!--Script para obtener iconos footer -->
    <script src="https://kit.fontawesome.com/9d7641bf78.js" crossorigin="anonymous"></script>

    <!--Script para actualizar la página cada 5s -->
    <script src="../script/script-refresh.js"></script>

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
                                <li><a href="E01-Metodos.php">E01: Mètodes HTML</a>
                                <li>
                                <li><a href="E02-Sintaxi-de-variables.php">E02 - Operadors bàsics</a></li>
                                <li><a href="E03-EstructuresControl.php">E03 - Funcions html</a></li>
                                <li><a href="E05-CapturaImatgesExternes.php">E05 - Captura d'imatges externes</a></li>
                            </ul>

                            <ul>
                                <li class="titulo azul"><a href=""></a></li>
                                <li><a href="E06-Webscraping.php">E06 - Web scraping</a></li>
                                <li><a href="E07-Cotitzacions.php">E07-Cotitzacions</a></li>
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
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
        </section>



        <!--INICIO BOX EJERCICIO -->


        <section id="generador-codigo-no-color">



            <div id="box_E03">



                <div id="titulo-generador">
                    <h2>E07 - Cotitzacions</h2>

                    <span class="tecnologia_usada">
                        <img src="../img/html.png">
                        <img src="../img/css-3.png">
                        <img src="../img/php.png">
                    </span>
                    <br><br>

                    <div id="box-actualiza">
                        <p><strong>Auto refresh cada 5s 🔄 </strong> </p>
                        <br>
                        <a href="E07-Cotitzacions.php">
                            <button id="btn-actualiza">
                                Recargar

                            </button>
                        </a>

                        <div><br>


                            <?php

                            //Obetenemos los datos de la siguiente URL
                            $web = file_get_contents("https://www.inversis.com/inversiones/productos/cotizaciones-nacionales&pathMenu=3_1_0_0&esLH=N");

                            $inicio = "<tr id=";
                            $final = "</tr>";
                            $pos = 0;
                            $posArray = 0;
                            $_SESSION['precio'] = array();

                            while (($posIni = strpos($web, $inicio, $pos)) !== false) {

                                $posIni += 28;
                                $posFin = strpos($web, $final, $posIni);

                                $tr = substr($web, $posIni, $posFin - $posIni);

                                //FILTRO NOMBRE
                                $valueN = 'value="N"';
                                $tdFinal = '</td>';
                                $posNombreIni = strpos($tr, $valueN, 0) + 12;
                                $posNombreFin = strpos($tr, $tdFinal, $posNombreIni);

                                //Agrego los datos al array datos
                                $datos[$posArray]["nombre"] = trim(substr($tr, $posNombreIni, $posNombreFin - $posNombreIni));

                                //FILTRO TICKER

                                $tdIni = '<td>';
                                $tdFinal = '</td>';
                                $posTickerIni = strpos($tr, $tdIni, $posNombreFin) + 4;
                                $posTickerFin = strpos($tr, $tdFinal, $posTickerIni);

                                //Agrego los datos al array datos
                                $datos[$posArray]["ticker"] = substr($tr, $posTickerIni, $posTickerFin - $posTickerIni);

                                //FILTRO MERCADO

                                $posMercadoIni = strpos($tr, $tdFinal, $posTickerFin) + 5;
                                $posMercadoFin = strpos($tr, $tdFinal, $posMercadoIni);

                                //Agrego los datos al array datos
                                $datos[$posArray]["mercado"] = trim(strip_tags(substr($tr, $posMercadoIni, $posMercadoFin - $posMercadoIni)));

                                //FILTRO PRECIO

                                $fieldIni = 'ultima_cotizacion">';

                                $posPrecioIni = strpos($tr, $fieldIni, $posMercadoFin) + 19;
                                $posMercadoFin = strpos($tr, $tdFinal, $posPrecioIni);

                                $datos[$posArray]["ultima_coti"] = trim(strip_tags(substr($tr, $posPrecioIni, $posMercadoFin - $posPrecioIni)));

                                //FILTRO DIVISA

                                $euIni = '"ac">';

                                $posDivisaIni = strpos($tr, $euIni, $posMercadoFin) + 5;
                                $posDivisaFin = strpos($tr, $tdFinal, $posDivisaIni);

                                $datos[$posArray]["divisa"] = substr($tr, $posDivisaIni, $posDivisaFin - $posDivisaIni);

                                //FILTRO VARIACION

                                $difIni = 'tdDif_';

                                $posVariacioIni = strpos($tr, $difIni, $posDivisaFin) + 10;
                                $posVariacionFin = strpos($tr, $tdFinal, $posVariacioIni);

                                $datos[$posArray]["variacio"] = trim(strip_tags(substr($tr, $posVariacioIni, $posVariacionFin - $posVariacioIni)));

                                //FILTRO % VARIACION

                                $difPorcIni = 'PorcDif_';
                                $spanFin = '</span>';

                                $posPorcVariacioIni = strpos($tr, $difPorcIni, $posVariacionFin) + 12;
                                $posPorcVariacionFin = strpos($tr, $spanFin, $posPorcVariacioIni);

                                $datos[$posArray]["variacio_percent"] = trim(substr($tr, $posPorcVariacioIni, $posPorcVariacionFin - $posPorcVariacioIni));

                                //FILTRO VOLUMEN

                                $fielVoluIni = 'volumen">';

                                $posVolumenIni = strpos($tr, $fielVoluIni, $posPorcVariacionFin) + 9;
                                $posVolumenFin = strpos($tr, $spanFin, $posVolumenIni);

                                $datos[$posArray]["volum"] = trim(substr($tr, $posVolumenIni, $posVolumenFin - $posVolumenIni));

                                //FILTRO MINIMO

                                $fielMiniIni = 'minimo">';

                                $posMinimoIni = strpos($tr, $fielMiniIni, $posVolumenFin) + 8;
                                $posMinimoFin = strpos($tr, $spanFin, $posMinimoIni);

                                $datos[$posArray]["mínim"] = trim(substr($tr, $posMinimoIni, $posMinimoFin - $posMinimoIni));

                                //FILTRO MAXIMO

                                $fielMaxIni = 'maximo">';

                                $posMaximoIni = strpos($tr, $fielMaxIni, $posMinimoFin) + 8;
                                $posMaximoFin = strpos($tr, $spanFin, $posMaximoIni);

                                $datos[$posArray]["màxim"] = trim(substr($tr, $posMaximoIni, $posMaximoFin - $posMaximoIni));

                                //FILTRO FECHA

                                $fielFechaIni = '_instituc">';

                                $posFechaIni = strpos($tr, $fielFechaIni, $posMaximoFin) + 11;
                                $posFechaFin = strpos($tr, $spanFin, $posFechaIni);

                                $datos[$posArray]["data"] = trim(substr($tr, $posFechaIni, $posFechaFin - $posFechaIni));

                                //FILTRO HORA

                                $fielHoraIni = 'cion_cotizvalores';

                                $posHoraIni = strpos($tr, $fielHoraIni, $posFechaFin) + 19;
                                $posHoraFin = strpos($tr, $spanFin, $posHoraIni);

                                $datos[$posArray]["hora"] = trim(strip_tags(substr($tr, $posHoraIni, $posHoraFin - $posHoraIni)));

                                //INCREMENTOS
                                $pos = $posFin;
                                $posArray++;
                            }




                            //INICIO CREACION DE LA TABLA
                            $datosTable = '<table id="datosTable">';
                            $datosTable .= '<thead> <tr> <th>Valor</th> <th>Ticker</th> <th>Mercado</th> <th>Precio</th> <th>Divisa</th>
    <th>Dif.</th> <th>%</th> <th>Volumen</th> <th>Mín. Intradiario</th> <th>Máx. Intradiario</th> <th>Fecha</th> <th>Hora</th>';

                            //Variables de sesion con datos viejos
                            $datosViejos = $_SESSION['datosAnteriores'];
                            $_SESSION['datosAnteriores'] = $datos;



                            //INICIO DE LA TABLA CON DATOS A MOSTRAR
                            foreach ($datos as $clave => $cotis) {
                                $datosTable .= '<tr>';

                                foreach ($cotis as $claveArray => $valor) {

                                    $tdTipo = '<td>';
                                    $valorCasilla = $valor;

                                    //Casteo del precio nuevo
                                    $precioCorregido = str_replace(",", ".", $valor);
                                    $valorNuevoInt = floatval($precioCorregido);

                                    //Casteo del precio viejo
                                    $valorViejoInt = str_replace(",", ".", $datosViejos[$clave]['ultima_coti']);
                                    $valorViejoInt = floatval($valorViejoInt);


                                    //CONTROL DE LOS PRECIOS NUEVOS CON LOS VIEJOS
                                    if ($claveArray == 'ultima_coti') {

                                        if ($valorViejoInt > $valorNuevoInt) {
                                            $tdTipo = '<td class="rojo">';
                                        } elseif ($valorViejoInt < $valorNuevoInt) {
                                            $tdTipo = '<td class="verde">';
                                        }
                                    }

                                    //CONTROL DE LA DIF Y % NUEVOS CON LOS VIEJOS
                                    if ($claveArray == 'variacio' || $claveArray == 'variacio_percent') {

                                        if ($valorNuevoInt < 0) {
                                            $tdTipo = '<td class="rojo">';
                                        } elseif ($valorNuevoInt > 0) {
                                            $tdTipo = '<td class=" verde">';
                                        } 
                                    }

                                    //Aqui agregamos el resultado final
                                    $datosTable .= $tdTipo . $valor . '</td>';
                                }

                                $datosTable .= '</tr>';
                            }

                            $datosTable .= '</table>';

                            //Y mostramos la table
                            echo $datosTable;

                            ?>

                        </div>

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