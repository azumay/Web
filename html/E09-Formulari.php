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
    <link rel="stylesheet" href="../css/form.css">

    <title>Xavi Yamuza - M7</title>
</head>

<body>

    <main>

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
                                <li><a href="E09-Formulari.php">E09 - Formulari de contacte</a></li>
                                <li><a href="">Proximamente...</a></li>
                            </ul>
                            <!--
                            <ul>
                                <li class="titulo verde"><a href="">Categoria #1</a></li>
                                <li><a href="">Proximamente...</a></li>
                                <li><a href="">Categoria #3</a></li>
                                <li><a href="">Categoria #4</a></li>
                                <li><a href="">Categoria #5</a></li>
                            </ul>

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




        <section id="box-form">

            <div id="caja-generador">
                <div id="titulo-generador">
                    <h2>E09 Formulari de contacte</h2>
                    <p>Formulario de contacto mediante PHP</p>
                    <span class="tecnologia_usada">
                        <img src="../img/html.png">
                        <img src="../img/css-3.png">
                        <img src="../img/php.png">
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
         if(strlen($_POST["mensaje"]) > 256){
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
        $pathXML = '../xml/contacto.xml';

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
    $xml -> load ('../xml/contacto.xml');

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

    $xml -> save('../xml/contacto.xml');
     */

    }
}

?>

                <form id="formContact" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

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
    echo "<img style='width: 80px;' src='../img/check.png'>";
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