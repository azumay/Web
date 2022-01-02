<?php

session_start();

/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
 */

require 'html/funcionesPHP/loginUsers/dateBase.php';

if (isset($_SESSION['user_id'])) {

    $records = $conn->prepare('SELECT * FROM tbl_usuaris WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }

} else {

// missatge d'usuari no autoritzat

}

//Incluyo el documento con las cookies
include "cookies/idioma.php";

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

    if (isset($_GET["cerrar_sesion"])) {
        session_unset();
        session_destroy();
        echo '<meta http-equiv="refresh"
        content="0; url=http://localhost/Web/index.php?ph=home">';

    } else if (isset($_GET["user"])) {
        $pagina = $_GET["user"];

        include "html/template/UserProfile.php";

    } else if (isset($_GET["ph"])) {

        $pagina = $_GET["ph"];

        include "html/template/" . $pagina . ".php";
    } else {

        include "html/template/home.php";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["submitContacto"])) {
        include "html/template/E09-Formulario-contacto.php";
    } elseif (isset($_POST["submitRegistro"])) {

        include "html/template/E02-Formulario-registro.php";
    } elseif (isset($_POST["login"])) {

        include "html/funcionesPHP/loginUsers/login.php";
    }

}

include "html/partes-html/footer.php";
?>



</main>

</body>

</html>
