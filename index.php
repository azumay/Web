<?php
session_start();

//Incluyo el documento con las cookies
include "cookies/idioma.php";

 
error_reporting(E_ALL);
ini_set("display_errors", 1);

?>

<!DOCTYPE html>
<html lang="es">
<?php
include "html/partes-html/head.php";
?>
<body>

    <main>

    <?php

include "html/partes-html/menu.php";

/* Fichero para confirmar que hay conexion con la base de datos*/

//include "html/funcionesPHP/conexionDB.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET["ph"])) {

        $pagina = $_GET["ph"];

        include "html/template/" . $pagina . ".php";
    } 
    else {

        include "html/template/home.php";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["submitContacto"])) {
        include "html/template/E09-Formulario-contacto.php";
    }
    elseif(isset($_POST["submitRegistro"])){
        
        include "html/template/E02-Formulario-registro.php";
    }

}

include "html/partes-html/footer.php";
?>



</main>

</body>

</html>
