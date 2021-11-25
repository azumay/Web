<?php

function filtroForm($datos)
{
    $newstr = trim($datos); //Elimino posibles espacios
    $newstr = htmlspecialchars($datos); //Traduzco caracteres especiales en HTML
    $newstr = filter_var($datos, FILTER_SANITIZE_STRING); //elimina caracteres no deseados o codificados
    return $newstr;
}

function dni($dni)
{
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);

    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
        return false;
    } else {
        return true;
    }
}

if (isset($_POST["submitRegistro"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nombre"])) {
        $errorCampo[] = "❌ El nombre es obligatorio";
    }

    if (empty($_POST["dni"])) {
        $errorCampo[] = "❌ El DNI es obligatorio";

    } else {

        if (dni($_POST["dni"]) == 'false') {
            $errorCampo[] = "❌ dni no es correcto";
        }
    }

    if (empty($_POST["apellidos"])){
      $errorCampo[] = "❌ El apellido es obligatorio";
    }

    if (empty($_POST["fechaNacimiento"])){
      $errorCampo[] = "❌ La fecha de nacimiento es obligatoria";
    }

//Una vez no hay errores guardamos los datos
    if (empty($errorCampo)) {
        $userName = $_POST["nombre"];
        $dni = filtroForm($_POST["dni"]);
    }
}
