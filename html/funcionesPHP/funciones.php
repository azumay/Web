<?php

global $sexo;
$telefono = "";
$cp = "";
function filtroForm($datos) //Funcion para filtrar datos Formulario
{
    $datos = trim($datos); //Elimino posibles espacios
    $datos = strip_tags($datos); //Retira las etiquetas HTML y PHP de un string
    $datos = stripslashes($datos); //Quita las barras de un string con comillas escapadas

    return $datos; //Devuelvo el dato limpio
}

function getPlatform($user_agent) //Funcion para obtener Sistema Operativo
{
    $plataformas = array(
        'Windows 10' => 'Windows NT 10.0+',
        'Windows 8.1' => 'Windows NT 6.3+',
        'Windows 8' => 'Windows NT 6.2+',
        'Windows 7' => 'Windows NT 6.1+',
        'Windows Vista' => 'Windows NT 6.0+',
        'Windows XP' => 'Windows NT 5.1+',
        'Windows 2003' => 'Windows NT 5.2+',
        'Windows' => 'Windows otros',
        'iPhone' => 'iPhone',
        'iPad' => 'iPad',
        'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
        'Mac otros' => 'Macintosh',
        'Android' => 'Android',
        'BlackBerry' => 'BlackBerry',
        'Linux' => 'Linux',
    );
    foreach ($plataformas as $plataforma => $pattern) {
        if (preg_match('/(?i)' . $pattern . '/', $user_agent)) {
            return $plataforma;
        }

    }
    return 'Otras';
}



$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getBrowser($user_agent) //Funcion para obtener el navegador Web
{

    if (strpos($user_agent, 'MSIE') !== false) {
        return 'Internet explorer';
    } elseif (strpos($user_agent, 'Edge') !== false) //Microsoft Edge
    {
        return 'Microsoft Edge';
    } elseif (strpos($user_agent, 'Trident') !== false) //IE 11
    {
        return 'Internet explorer';
    } elseif (strpos($user_agent, 'Opera Mini') !== false) {
        return "Opera Mini";
    } elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== false) {
        return "Opera";
    } elseif (strpos($user_agent, 'Firefox') !== false) {
        return 'Mozilla Firefox';
    } elseif (strpos($user_agent, 'Chrome') !== false) {
        return 'Google Chrome';
    } elseif (strpos($user_agent, 'Safari') !== false) {
        return "Safari";
    } else {
        return 'No hemos podido detectar su navegador';
    }

}

function dni($dni) //Funcion para verificar los dni
{
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);

    if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
        return false;
    } else {
        return true;
    }
}
