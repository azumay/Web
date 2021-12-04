<?php
$usrConsultas = mysqli_connect('localhost', 'usr_consulta', 'Thico@2020', 'myweb');
$usrGenerico = mysqli_connect('localhost', 'usr_generic', 'Thico@2020', 'myweb');

if (!$usrConsultas) {
    //echo "No se ha podido establecer conexión";
    //exit;

} else {
    //echo "Conexión establecida!";

    //Controlar si ya es usuario

    $sSql = "SELECT * FROM tbl_usuaris WHERE email = '$mail'";
    $consultaMail = mysqli_query($usrConsultas, $sSql);

    $resultado = mysqli_num_rows($consultaMail);

    if ($resultado > 0) {
        echo "
        <div id='alertUserExist'>
            <h4>⚠️ Dirección de correo electrónico ya en uso</h4>
            <p>ya existe una cuenta con la dirección de correo electrónico <b>$mail</b></p>
       </div>";
       mysqli_close($usrGenerico);
       mysqli_close($usrConsultas);

    } else {
//Tratamiento IMG

        move_uploaded_file($imgTempName, $target_path_img);

        $datosToInto = "INSERT INTO tbl_usuaris(email, password, tipusIdent, numeroIdent, nom, cognoms, sexe, datanaixement, adreca, codiPostal, poblacio, provincia, telefon, imatge, status , navegador, plataforma) VALUES ('$mail', '$contraseña', 'dni', '$dni', '$nombre', '$apellidos', '$sexo', '$fechaNacimiento', '$direccion', '$cp', '$poblacion', '$provincia', $telefono, '$target_path_img', 0, '$navegador', '$SO')";

        //var_dump ($datosToInto);

        if (mysqli_query($usrGenerico, $datosToInto)) {
            echo "Datos agregados a la base de datos";
            mysqli_close($usrGenerico);
            mysqli_close($usrConsultas);
        } else {
            echo "Error al procesar " . mysqli_error($usrGenerico);
            mysqli_close($usrGenerico);
            mysqli_close($usrConsultas);

        }

    }
}
