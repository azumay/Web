<?php

//Datos usuario a la conexion DB
$server = 'localhost';
$username = 'usr_consulta';
$password = 'Thico@2020';
$database = 'myweb';

//Probamos la conexion
try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $error) {
    die('Connection Failed: ' . $error->getMessage());
}

?>