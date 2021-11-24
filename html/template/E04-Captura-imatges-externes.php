
        <section id="generador-codigo-no-color">



<div id="box_E03">



    <div id="titulo-generador">
        <h2>E05 - Captura d'imatges externes</h2>


        <span class="tecnologia_usada">
            <img src="/Web/img/html.png">
            <img src="/Web/img/css-3.png">
            <img src="/Web/img/php.png">
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