<?php

include "funciones.php"; //Cargo las funciones php

if (isset($_POST["submitRegistro"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    // Limpiamos los valores
    filtroForm($_POST["mail"]);
    filtroForm($_POST["password"]);

    filtroForm($_POST["dni"]);
    filtroForm($_POST["nombre"]);
    filtroForm($_POST["apellidos"]);

    filtroForm($_POST["direccion"]);
    filtroForm($_POST["cp"]);
    filtroForm($_POST["poblacion"]);
    filtroForm($_POST["provincia"]);
    filtroForm($_POST["telefono"]);

    //Control campo Correo electronico
    if (empty($_POST["mail"])) {
        $errorCampo[] = "❌ El mail es obligatorio";
    } else {
        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $errorCampo[] = "❌ El formato del mail no es correcto";
        }
    }

    //Control campo CONTRASEÑA
    if (empty($_POST["password"])) {
        $errorCampo[] = "❌ La CONTRASEÑA es obligatoria";
    } else {
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/', $_POST["password"])) {
            $errorCampo[] = "❌ La CONTRASEÑA es poco segura";
        }
    }

    //Control campo SEXO
    if (empty($_POST["sexo"])) {
        $errorCampo[] = "❌ Indica tú sexo";
        $sexo = "";
    } else {
        $sexo = $_POST["sexo"];
    }

    //Control campo DNI
    if (empty($_POST["dni"])) {
        $errorCampo[] = "❌ El DNI es obligatorio";
    } else {

        if (dni($_POST["dni"]) == 'false') {
            $errorCampo[] = "❌ El DNI no es correcto";
        }
    }

    //Control campo NOMBRE
    if (empty($_POST["nombre"])) {
        $errorCampo[] = "❌ El NOMBRE es obligatorio";
    } else {
        if (is_numeric($_POST["nombre"])) {
            $errorCampo[] = "❌ No se admiten numeros en el campo NOMBRE";
        }
    }

    //Control campo APELLIDO
    if (empty($_POST["apellidos"])) {
        $errorCampo[] = "❌ El APELLIDO es obligatorio";
    } else {
        if (is_numeric($_POST["apellidos"])) {
            $errorCampo[] = "❌ No se admiten numeros en el campo APELLIDO";
        }
    }

    //Control campo FECHA NACIMIENTO
    if (empty($_POST["fechaNacimiento"])) {
        $errorCampo[] = "❌ La FECHA de nacimiento es obligatoria";
    }

    //Control campo CODIGO POSTAL
    if (!empty($_POST["cp"])) {
        if (!is_numeric($_POST["cp"])) {
            $errorCampo[] = "❌ No se admiten LETRAS en el campo CODIGO POSTAL";
        }
    }

    //Control campo POBLACION
    if (is_numeric($_POST["poblacion"])) {
        $errorCampo[] = "❌ No se admiten numeros en el campo POBLACION";
    }

    //Control campo PROVINCIA
    if (is_numeric($_POST["provincia"])) {
        $errorCampo[] = "❌ No se admiten numeros en el campo PROVINCIA";
    }

    //Control campo TELEFONO
    if (!empty($_POST["telefono"])) {

        if (strlen($_POST["telefono"]) != 9) {
            $errorCampo[] = "❌ El número de telefono no es correcto";
        }
        if (!is_numeric($_POST["telefono"])) {
            $errorCampo[] = "❌ El formato del telefono no es correcto";
        }
    }

    //Control campo FILE
    if ($_FILES['imgPerfil']['name'] == null) {
        $errorCampo[] = "❌ Debes subir una imagen de perfil";
    } else {

        if ($_FILES['imgPerfil']['size'] > 2097152) {
            $errorCampo[] = "❌ La imagen tiene que tener un tamaño máximo 2 Mb";
        }
        if ($_FILES['imgPerfil']['type'] != "image/jpeg") {
            $errorCampo[] = "❌ Formato de imagen no soportado";
        }

    }

    if (empty($errorCampo)) { //Una vez no hay errores...

        //Guardamos los datos y los limpiamos
        
        //Datos OBLIGATORIOS
        $mail = filtroForm($_POST["mail"]);
        $contraseña = filtroForm($_POST["password"]);
        $sexo = substr($_POST['sexo'], 0, 1); //Obtengo solo la 1r letra
        $tipoDocumento = $_POST["tipoDocumento"];
        $dni = filtroForm($_POST["dni"]);
        $nombre = filtroForm($_POST["nombre"]);
        $apellidos = filtroForm($_POST["apellidos"]);
        $fechaNacimiento = $_POST["fechaNacimiento"];

        //Datos OPCIONALES
        $direccion = filtroForm($_POST["direccion"]);
        if(is_null($direccion) !== true ){
            $direccion = 'NULL';
        }
        $cp = filtroForm($_POST["cp"]);
        if(is_null($cp) !== true ){
            $cp = 'NULL';
        }
        $poblacion = filtroForm($_POST["poblacion"]);
        if(is_null($poblacion) !== true ){
            $poblacion = 'NULL';
        }
        $provincia = filtroForm($_POST["provincia"]);
        if(is_null($provincia) !== true ){
            $provincia = 'NULL';
        }
        $telefono = filtroForm($_POST["telefono"]);
        if(is_null($telefono) !== true ){
            $telefono = 'NULL';
        }
        
        
        $navegador = getBrowser($user_agent);
        $SO = getPlatform($user_agent);
        
        
        $imgTempName = $_FILES['imgPerfil']['tmp_name'];

        $target_path = $_SERVER['DOCUMENT_ROOT'] . "/Web/uploads/";

        $target_path_img = $target_path . date('d-m-Y_h:i:s_') . $_FILES['imgPerfil']['name'];
        
        //Conexion Base de datos

        include "conexionDB.php";

        //Borro los valores introducidos en los inputs
        unset($_POST["nombre"], $_POST["apellidos"], $_POST["dni"], $_POST['sexo'], $_POST["fechaNacimiento"], $_POST["usuario"], $_POST["password"], $_POST["radio"], $_POST["direccion"], $_POST["cp"], $_POST["poblacion"], $_POST["provincia"], $_POST["telefono"]);

    }
}
