<?php

include "usuariosBaseDatos.php";
include "verificarRegistro.php";

$ultimoRegistro = $_GET['last_user'];


if($ultimoRegistro > 0){

    $updateId= "UPDATE tbl_usuaris SET status=1 WHERE id=$ultimoRegistro";
    $consultaMail = "SELECT email from tbl_usuaris where id=$ultimoRegistro";

    mysqli_query($usrGenerico, $updateId);

    $mailVerificado = mysqli_query($usrConsultas, $consultaMail);

    $fila = mysqli_fetch_row($mailVerificado);
    
  

    echo "<div id='boxSuccess2'>
        <h2>¡Enhorabuena!</h2>
        <img src='img/verificado.gif' width='100' height='100'><br>
        <p>Tu cuenta <b>$fila[0]</b> ha sido verificada </p>
        </div>";
    
    
        mysqli_close($usrGenerico);
        mysqli_close($usrConsultas);
}
else{
    echo "Hay un error";
    mysqli_close($usrGenerico);
    mysqli_close($usrConsultas);
}



 


?>