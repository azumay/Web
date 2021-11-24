
        <section id="box-form">

<div id="caja-generador">
    <div id="titulo-generador">
        <h2>E09 Formulari de contacte</h2>
        <p>Formulario de contacto mediante PHP</p>
        <span class="tecnologia_usada">
            <img src="/Web/img/html.png">
            <img src="/Web/img/css-3.png">
            <img src="/Web/img/php.png">
        </span>


    </div>
    <?php

//Filtro comun para los campos del formulario
function filtroForm($datos)
{
    $newstr = trim($datos); //Elimino posibles espacios
    $newstr = htmlspecialchars($datos); //Traduzco caracteres especiales en HTML
    $newstr = filter_var($datos, FILTER_SANITIZE_STRING); //elimina caracteres no deseados o codificados
    return $newstr;
}

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nombre"])) {
        $errorCampo[] = "❌ El nombre es obligatorio";
    } else {
        if (is_numeric($_POST["nombre"])) {
            $errorCampo[] = "❌ No se admiten numeros";
        }
    }
    if (empty($_POST["mail"])) {
        $errorCampo[] = "❌ El mail es obligatorio";
    } else {
        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $errorCampo[] = "❌ El formato del mail no es correcto";
        }
    }
    if (empty($_POST["mensaje"])) {
        $errorCampo[] = "❌ El mensaje es obligatorio";
    }
    if (strlen($_POST["mensaje"]) > 256) {
        $errorCampo[] = "❌ El mensaje supera los 256 caracteres";
    }
    if (empty($errorCampo)) {
        $nombre = filtroForm($_POST["nombre"]);
        $mail = filtroForm($_POST["mail"]);
        $mensaje = filtroForm($_POST["mensaje"]);

        $_POST["nombre"] = "";
        $_POST["mail"] = "";

//Zona para agregar datos validos al XML
        $inicio = '<?xml';
        $final = "</datos>";
        $pathXML = '/Web/xml/contacto.xml';

        $fechaActual = date('d-m-Y');

        $pagina = file_get_contents($pathXML);
        $pos = strpos($pagina, "</datos>");

        $posIni = strpos($pagina, $inicio, 0);
        $posFin = strpos($pagina, $final, $posIni);

        $tr = substr($pagina, $posIni, $posFin);

        $abrir = fopen($pathXML, 'r+');

        fwrite($abrir,
            "$tr<contacto>
<fecha>$fechaActual</fecha>
<nombre>$nombre</nombre>
<email>$mail</email>
<mensaje>$mensaje</mensaje>
</contacto>
</datos>");
        fclose($abrir);

//Modo Orientado a objectos
        /*
    $xml = new DOMDocument("1.0", "UTF=8");
    $xml -> load ('/Web/xml/contacto.xml');

    $datosTag = $xml -> getElementsByTagName("datos")->item(0);
    $contactoTag = $xml -> createElement("contacto");

    $fechaActual = date('d-m-Y');
    $saltoLinea = "<br>";

    $fechaTag = $xml ->createElement("fecha",  $fechaActual );
    $nombreTag = $xml -> createElement("nombre", $nombre );
    $mailTag = $xml -> createElement("mail", $mail);
    $mensajeTag = $xml -> createElement("mensaje", $mensaje);

    //Aqui agrego los datos dentro de <contacto>
    $contactoTag -> appendChild($fechaTag);
    $contactoTag -> appendChild($nombreTag );
    $contactoTag -> appendChild($mailTag);
    $contactoTag -> appendChild($mensajeTag );

    $datosTag -> appendChild($contactoTag);

    $xml -> save('/Web/xml/contacto.xml');
     */

    }
}

?>

    <form id="formContact" method="post" action="<?php echo htmlspecialchars($_SERVER["E09-Formulario-contacto.php"]); ?>">

        <div id="form_container">


            <div class="form_description">
                <h2>Contáctanos 📧</h2>
                <p>¿En que podemos ayudarte?</p>
            </div>
            <ul>

                <li id="li_1">
                    <label class="description">Nombre </label>
                    <div>
                        <input id="element_1" name="nombre" class="element text medium" type="text"
                         value="<?php if (isset($_POST['nombre'])) {echo $_POST['nombre'];}?>" />
                    </div>
                </li>
                <li id="li_2">
                    <label class="description">Email </label>
                    <div>
                        <input id="element_2" name="mail" class="element text medium" type="text"
                        value="<?php if (isset($_POST['mail'])) {echo $_POST['mail'];}?>" />
                    </div>
                </li>
                <li id="li_3">
                    <label class="description">Mensaje </label>
                    <div>
                        <textarea id="element_3" name="mensaje" class="element textarea medium"
                        value="<?php if (isset($_POST['mensaje'])) {echo $_POST['mensaje'];}?>"></textarea>
                    </div>
                </li>
                <ul>
                    <?php

if (isset($errorCampo)) {
    foreach ($errorCampo as $error) {
        echo "<li class='red'> $error </li>";
    }
} else if (!isset($errorCampo) && $_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<img style='width: 80px;' src='/Web/img/check.png'>";
    echo "<p class='green'>Tus datos han sido enviados con extio!</p>";

}

?>


                </ul>
                <li class="buttons">

                    <input type="submit" name="submit" value="Enviar">
                </li>
            </ul>
    </form>

     <br>

</div>




</section>