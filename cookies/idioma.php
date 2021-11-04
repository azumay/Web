<?php
//Zona de COOKIES

//Controlamos primero si hay algo en la URL
if (isset($_GET["lang"])) {
    //Si tenemos algo en la url guardamos ese nombre en una variable
    $webLang = $_GET["lang"];
    //Creamos el tiempo de la cookie de 1 dia
    $caducidad = time() + 86400;
    //Creamos la cookie con un nombre, un valor de idioma y un tiempo de caducidad
    setcookie('idioma', $webLang, $caducidad);
}
//Si no hay nada en la URL comprobamos si tenemos una cookie
 elseif ( $_COOKIE["idioma"]) {
    $webLang = $_COOKIE["idioma"];
    $caducidad = time() + 86400;
    setcookie('idioma', $webLang, $caducidad);
}
// Y sino le damos una cookie por defecto
else{
    $webLang = 'es';
    $caducidad = time() + 86400;
    setcookie('idioma', $webLang, $caducidad);

}

//Aquí seleccionamos el idioma elejido y hacemos un include de ese fichero php con la traduccion
switch ($webLang) {

    case "en":
        include "lang/en.php";
        break;
    case "fr":
        include "lang/fr.php";
        break;
    case "ger":
        include "lang/ger.php";
        break;
    case "cat":
        include "lang/cat.php";
        break;
    default: //Idioma por defecto lo definimos aqui
        include "lang/es.php";
        break;

}


?>