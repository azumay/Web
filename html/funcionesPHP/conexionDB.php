<?php
$usrConsultas= mysqli_connect('localhost', 'usr_consulta', 'Thico@2020', 'myweb');
$usrGenerico = mysqli_connect('localhost', 'usr_generic', 'Thico@2020', 'myweb');


if(!$usrConsultas){
    //echo "No se ha podido establecer conexión";
    //exit;

    
    

    
}
else{
    echo "Conexión establecida!";

    //Controlar si ya es usuario

    $consultaMail = mysqli_query($usrConsultas, 'SELECT FROM tbl_usuaris WHERE email = $usuario');
    $resultado = mysqli_num_rows($consultaMail);


 
    if( $resultado  > 0){
        echo "Error el usuario ya existe";
    
    }
    else{
          $datosToInto = mysqli_query($usrGenerico, "INSERT INTO tbl_usuaris(email, password, tipusIdent, numeroIdent, nom, cognoms, sexe, datanaixement, adreca, codiPostal, poblacio, provincia, telefon, imatge) VALUES ($usuario, $contraseña, dni, $dni, $nombre, $apellidos, $sexo, $fechaNacimiento, $direccion, $cp, $poblacion, $provincia, $telefono, $imgPerfil)");
          
          
          echo "no existe usuario";
          echo $consultaMail;
          echo $resultado;
     
    }
}


?>