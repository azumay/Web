<?php
session_start();

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

if (isset($_GET["ph"])) {

    $pagina = $_GET["ph"];

    include "html/template/" . $pagina . ".php";

} else {

    include "html/template/home.php";

}
include "html/partes-html/footer.php";
?>



</main>

</body>

</html>
