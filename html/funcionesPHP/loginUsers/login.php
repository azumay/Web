<?php

include 'dateBase.php';


if (!empty($_POST['email']) && !empty($_POST['passwd'])) {

    $records = $conn->prepare('SELECT * FROM tbl_usuaris WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $mensaje = '';

    /*echo var_dump($results);
    echo count($results);
     */
   
    if (!empty($results)) {

        if (count($results) > 0 && $_POST['passwd'] == $results['password']) {
            $_SESSION['user_id'] = $results['id'];
            //header("Location: /index.php?ph=E02-Formulario-registro");
            echo "dentro";
            echo '<meta http-equiv="refresh"
            content="0; url=http://localhost/Web/index.php?ph=home">';

        }} else {
            
            echo '<meta http-equiv="refresh"
            content="0; url=http://localhost/Web/index.php?ph=E02-Formulario-registro">';
            
           //header("Location: /index.php?ph=E02-Formulario-registro");
            $message = 'La contraseña o mail es incorrecta';
            echo $mensaje;

 

    }
}
//Recogemos los datos del login
