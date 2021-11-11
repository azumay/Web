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
    <link rel="stylesheet" href="../css/estilos_E03.css">
    <link rel="stylesheet" href="../estilos.css">

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


        <section id="generador-codigo">



            <div id="box_E03">



                <div id="titulo-generador">
                    <h2>E03 - Funcions html</h2>

                    <p>Funcions generadores d'html</p>
                    <span class="tecnologia_usada">
                        <img src="../img/html.png">
                        <img src="../img/css-3.png">
                        <img src="../img/php.png">
                    </span>
                    <br><br>
                    <p>HTML que debemos generar mediante PHP</p>
                    <pre>
    <code>
    <textarea readonly="readonly" id="code">

    <label  for="cars">Choose a car:</label>
<select name="cars" id="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="mercedes">Mercedes</option>
    <option value="audi">Audi</option>
</select>
        </textarea>
    </code>
</pre>
                    <div id="html_generateSelect">
                        <h3>Funcion html_generateSelect:</h3>
                        <br>

                        <?php

// ZONA DE ARRAYS

$cars = [
    "volvo" => "Volvo",
    "saab" => "Saab",
    "mercedes" => "Mercedes",
    "audi" => "Audi",
];

$asignaturas = [
    "m7" => "M7",
    "m3" => "M3",
    "m9" => "M9",
    "m8" => "M8",
    "m6" => "M6",
];

// EJERCICIO 1

function html_generateSelect($arrayDatos, $fraseLabel = "", $class = "")
{

    $label = "<label for='$class'>" . $fraseLabel . "</label><br>";

    $label .= "<select name='$class' id='$class'>";

    foreach ($arrayDatos as $key => $value) {
        $label .= "<option value=\"$key\">" . $value . "</option>";

    }
    $label .= "</select>";

    return $label;
}

$ejercicio1 = html_generateSelect($asignaturas, "Elije una asignatura", "coches");

echo $ejercicio1;

?>



                    </div>


                    <div id="html_generateCheckBox">
                        <h3>Funcion html_generateCheckBox:</h3>
                        <br>

                        <?php

$garaje = [
    "vehicle1" => "Bike",
    "vehicle2" => "Car",
    "vehicle3" => "Boat",

];

/* EJERCICIO 2 */

function html_generateCheckBox($arrayDatos, $class = null, $fraseLabel)
{

    $labels = "";

    if ($class == null) {

        foreach ($arrayDatos as $key => $value) {
            $labels .= "<input type='checkbox' id=\"$key\" name=\"$key\" value=\"$value\"> ";
            $labels .= " <label for=\"$key\" class=\"$class\">" . "$fraseLabel   $value  </label> <br>";

        }
    } else {

        foreach ($arrayDatos as $key => $value) {
            $labels .= "<input type='checkbox' id=\"$key\" name=\"$key\" value=\"$value\" >  ";
            $labels .= " <label for=\"$key\" >" . "$fraseLabel  $value  </label> <br>";
        }

    }

    return $labels;

}

$ejer2 = html_generateCheckBox($garaje, "etiquetas", "Yo tengo un ");

echo $ejer2;

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

        <footer>
            <div class="contenedor">
                <p class="copy">Xavi Yamuza &copy; 2021</p>

            </div>
        </footer>

    </main>



</body>

</html>