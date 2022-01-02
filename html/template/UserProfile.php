

<div id="boxProfile">
<?php
  $nameUser = $user['nom'];
  

echo "<img src='$img_user' id='imgProfile'>";
echo "<h2>👋 Hola,   $nameUser </h2>";


?>
</div>

<div id="boxDatosUsuario">
<?php

echo "<div><h3>Detalles de la cuenta: </h3> </div><br>";
echo "<dt>DNI:</dt>"."<p>".$user['numeroIdent']."</p>";
echo "<dt>Nombre:</dt>"."<p>".$user['nom']."</p>";
echo "<dt>Apellidos:</dt>"."<p>".$user['cognoms']."</p>";
echo "<dt>Mail:</dt>"."<p>".$user['email']."</p>";
echo "<dt>Fecha Nacimiento:</dt>"."<p>".$user['datanaixement']."</p>";

//var_dump($user);
?>


</div>