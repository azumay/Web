<?php

if (!isset($_SESSION['user_id'])){
   
    echo '<div id="alert-permisos">
    <iframe src="https://giphy.com/embed/uIGfoVAK9iU1y" width="150" height="150" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            <h2><a href="?ph=E02-Formulario-registro">Inicia sesión</a> para ver el contenido</h2>
          </div>';
    
    die();
   

}
else if ($user['status']== 0){

    echo '<div id="alert-permisos">
    <iframe src="https://giphy.com/embed/uIGfoVAK9iU1y" width="150" height="150" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            <h2><a href="?ph=E02-Formulario-registro">Inicia sesión</a> con una cuenta verificada para ver el contenido</h2>
          </div>';

    die();

}

?>
 <section id="generador-codigo-no-color">



<div id="box_E03">



    <div id="titulo-generador">
        <h2>E07 - Cotitzacions</h2>

        <span class="tecnologia_usada">
            <img src="/Web/img/html.png">
            <img src="/Web/img/css-3.png">
            <img src="/Web/img/php.png">
        </span>
        <br><br>

        <div id="box-actualiza">
            <p><strong>Auto refresh cada 5s 🔄 </strong> </p>
            <br>
            <a href="?ph=E07-Cotizaciones">
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