<section id="generador-codigo">

<form method="post">
    <div id="caja-generador">
        <div id="titulo-generador">
            <h2>E02 Sintaxi de variables</h2>
            <p>Generador de claves mediante PHP</p>
            <span class="tecnologia_usada">
                <img src="/Web/img/html.png">
                <img src="/Web/img/css-3.png">
                <img src="/Web/img/php.png">
            </span>


        </div>
        <p id="password">

            <?php


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
            <button name="boton" formaction="?ph=E02-Sintaxis-variables">

                Generar
                <span id="candado"> <img src="/Web/img/contrasena.png"></span>

            </button>
        </div>
    </div>
</form>


</section>