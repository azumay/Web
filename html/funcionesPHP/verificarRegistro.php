<?php
global $sexo;
$telefono = "";
$cp = "";
function filtroForm($datos)
{
    $newstr = trim($datos); //Elimino posibles espacios
    $newstr = htmlspecialchars($datos); //Traduzco caracteres especiales en HTML
    $newstr = filter_var($datos, FILTER_SANITIZE_STRING); //Filtra una variable con el filtro de mail
    $newstr = strip_tags($datos); //Retira las etiquetas HTML y PHP de un string
    $newstr = stripslashes($datos); //Quita las barras de un string con comillas escapadas

    return $newstr; //Devuelvo el dato limpio
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

if (isset($_POST["submitRegistro"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    // Limpiamos los valores
    filtroForm($_POST["usuario"]);
    filtroForm($_POST["password"]);

    filtroForm($_POST["dni"]);
    filtroForm($_POST["nombre"]);
    filtroForm($_POST["apellidos"]);

    filtroForm($_POST["direccion"]);
    filtroForm($_POST["cp"]);
    filtroForm($_POST["poblacion"]);
    filtroForm($_POST["provincia"]);
    filtroForm($_POST["telefono"]);

    //Control campo USERNAME
    if (empty($_POST["usuario"])) {
        $errorCampo[] = "⚠️ El nombre de USUARIO es obligatorio";
    }

    //Control campo CONTRASEÑA
    if (empty($_POST["password"])) {
        $errorCampo[] = "⚠️ La CONTRASEÑA es obligatoria";
    } else {
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $_POST["password"])) {
            $errorCampo[] = "⚠️ La CONTRASEÑA es poco segura";
        }
    }

    //Control campo SEXO
    if (empty($_POST["sexo"])) {
        $errorCampo[] = "⚠️ Indica tú sexo";
        $sexo = "";
    } else {
        $sexo = $_POST["sexo"];
    }

    //Control campo DNI
    if (empty($_POST["dni"])) {
        $errorCampo[] = "⚠️ El DNI es obligatorio";
    } else {

        if (dni($_POST["dni"]) == 'false') {
            $errorCampo[] = "⚠️ El DNI no es correcto";
        }
    }

    //Control campo NOMBRE
    if (empty($_POST["nombre"])) {
        $errorCampo[] = "⚠️ El NOMBRE es obligatorio";
    } else {
        if (is_numeric($_POST["nombre"])) {
            $errorCampo[] = "⚠️ No se admiten numeros en el campo NOMBRE";
        }
    }

    //Control campo APELLIDO
    if (empty($_POST["apellidos"])) {
        $errorCampo[] = "⚠️ El APELLIDO es obligatorio";
    } else {
        if (is_numeric($_POST["apellidos"])) {
            $errorCampo[] = "⚠️ No se admiten numeros en el campo APELLIDO";
        }
    }

    //Control campo FECHA NACIMIENTO
    if (empty($_POST["fechaNacimiento"])) {
        $errorCampo[] = "⚠️ La FECHA de nacimiento es obligatoria";
    }

    //Control campo CODIGO POSTAL
    if (!empty($_POST["cp"])) {
        if (!is_numeric($_POST["cp"])) {
            $errorCampo[] = "⚠️ No se admiten LETRAS en el campo CODIGO POSTAL";
        }
    }

    //Control campo POBLACION
    if (is_numeric($_POST["poblacion"])) {
        $errorCampo[] = "⚠️ No se admiten numeros en el campo POBLACION";
    }

    //Control campo PROVINCIA
    if (is_numeric($_POST["provincia"])) {
        $errorCampo[] = "⚠️ No se admiten numeros en el campo PROVINCIA";
    }

    //Control campo TELEFONO
    if (!empty($_POST["telefono"])) {

        if (strlen($_POST["telefono"]) != 9) {
            $errorCampo[] = "⚠️ El número de telefono no es correcto";
        }
        if (!is_numeric($_POST["telefono"])) {
            $errorCampo[] = "⚠️ El formato del telefono no es correcto";
        }
    }

    //Control campo FILE
    /*if ($_FILES['imgPerfil']['name'] == null) {
        $errorCampo[] = "⚠️ Debes subir una imagen de perfil";
    } else {

        if ($_FILES['imgPerfil']['size'] > 2097152) {
            $errorCampo[] = "⚠️ La imagen tiene que tener un tamaño máximo 2 Mb";
        }
        if ($_FILES['imgPerfil']['type'] != "image/jpeg") {
            $errorCampo[] = "⚠️ Formato de imagen no soportado";
        }
       
        
    }*/

    if (empty($errorCampo)) { //Una vez no hay errores...

        //Guardamos los datos y los limpiamos
        $usuario = filtroForm($_POST["usuario"]);
        $dni = filtroForm($_POST["dni"]);
        $nombre = filtroForm($_POST["nombre"]);
        $apellidos = filtroForm($_POST["apellidos"]);
        $contraseña = filtroForm($_POST["password"]);
        $direccion = filtroForm($_POST["direccion"]);
        $cp = filtroForm($_POST["cp"]);
        $poblacion = filtroForm($_POST["poblacion"]);
        $provincia = filtroForm($_POST["provincia"]);
        $telefono = filtroForm($_POST["telefono"]);
        $sexo = $_POST['sexo'];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        
        //Tratamiento IMG
        
        $imgTempName = $_FILES['imgPerfil']['tmp_name'];

        $target_path= $_SERVER['DOCUMENT_ROOT']."/Web/uploads/";
        
        $target_path = $target_path . date('d-m-Y_h:i:s_') . $_FILES['imgPerfil']['name'];

        move_uploaded_file($imgTempName, $target_path );

        //Conexion Base de datos

        include "conexionDB.php";

        


        //Borro los valores introducidos en los inputs
        unset($_POST["nombre"], $_POST["apellidos"], $_POST["dni"], $_POST['sexo'], $_POST["fechaNacimiento"], $_POST["usuario"], $_POST["password"], $_POST["radio"], $_POST["direccion"], $_POST["cp"], $_POST["poblacion"], $_POST["provincia"], $_POST["telefono"]);

    }
}
