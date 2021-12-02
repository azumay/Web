<?php
$usrConsultas= mysqli_connect('localhost', 'usr_consulta', 'Thico@2020', 'myweb');


if(!$usrConsultas){
    echo "No se ha podido establecer conexión";
    exit;
}
else{
    echo "Conexión establecida!";
}


?>