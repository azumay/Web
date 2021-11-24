

        <section id="generador-codigo">



<div id="box_E03">



    <div id="titulo-generador">
        <h2>E03 - Funcions html</h2>

        <p>Funcions generadores d'html</p>
        <span class="tecnologia_usada">
            <img src="/Web/img/html.png">
            <img src="/Web/img/css-3.png">
            <img src="/Web/img/php.png">
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