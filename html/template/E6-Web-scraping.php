<section id="generador-codigo-no-color">



            <div id="box_E03">



                <div id="titulo-generador">
                    <h2>E06 - Web scraping</h2>

                    <span class="tecnologia_usada">
                        <img src="/Web/img/html.png">
                        <img src="/Web/img/css-3.png">
                        <img src="/Web/img/php.png">
                    </span>
                    <br><br>

                    <div id="box-imagenes">
                        <h3>Web con cotizaciones IBEX 35:</h3>
                        <br>

                        <a target=”_blank" href = "https://www.inversis.com/inversiones/productos/cotizaciones-nacionales&pathMenu=3_1_0_0&esLH=N">
                        <img id="inversisWeb" src="/Web/img/inversisWeb.png">
                        </a>

<div><br>


                        <?php

//Obetenemos los datos de la siguiente URL
$web = file_get_contents("https://www.inversis.com/inversiones/productos/cotizaciones-nacionales&pathMenu=3_1_0_0&esLH=N");

$inicio = "<tr id=";
$final = "</tr>";
$pos = 0;
$posArray = 0;

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

echo '<pre id="pre-array">';
var_dump($datos);
echo "</pre>";

?>

</div>

                    </div>


        </section>