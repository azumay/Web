

<section id="box-form">

<div id="caja-generador">


  <div class='container'>

<?php
include "../funcionesPHP/verificarRegistro.php";
echo "<img src='img/success.gif'>";
echo "<div id='boxSuccess'><p>Tu cuenta se ha creado correctamente ✅</p></div>  ";
echo "<a href='?ph=home'>Volver al Inicio</a>";

echo $_FILES['imgPerfil']['size'];
?>

</div>
          </div>
        </div>





</main>

</body>

</html>