

<style>
  #banner {
    display: none;
  }
</style>

<section id="box-form">

  <div id="caja-generador">


    <div class='container'>
    <?php

include "html/funcionesPHP/verificarRegistro.php";

if (isset($errorCampo)) {
    foreach ($errorCampo as $error) {
        echo "<div id='boxErrores'>$error</div>  ";
    }
} else if (!isset($errorCampo) && $_SERVER["REQUEST_METHOD"] == "POST") {

    //echo "<meta http-equiv='refresh' content='0;url=?ph=registroSucces'>";
    // header('Location: registroSucces.php'); //Con esto me petaba pero mi intención era hacerlo con el header
    // exit();

    //COMPROVACION DE CAMPOS:
    //echo $usuario . " " . $dni . " " . $nombre . " " . $apellidos;

}
//echo "<p class='green'>Tus datos han sido enviados con extio!</p>";
?>
     <section id="form-section">
        <div id="box-registro">


          <div class="contenedorForm">
            <div class="user signinBx">
              <div class="imgBx"><img src="img/img-inicio-sesion.jpg" alt="" /></div>
              <div class="formBx">
                <form action="<?php
echo htmlspecialchars($_SERVER['PHP_SELF']);
?>"  method="post">
                <a href="?ph=home"><img src="/Web/img/robot.png" id="robotRegistro"/></a>
                  <h2>Iniciar sesión</h2>
             <?php 
             if (!empty($message)){
               echo '<p>'.$message.'</p>';
             } 
             ?>
    

                  <input type="text" name="email" placeholder="@Usuario" />
                  <input type="password" name="passwd" placeholder="Contraseña" />
                  <input type="submit" name="login" value="Entrar" />
                  <p class="signup">
                    ¿Eres nuevo aquí?<br>
                    <a href="#" onclick="toggleForm();">Registrate.</a>
                  </p>
                </form>
              </div>
            </div>
            <div class="user signupBx">
              <div class="formBx">



                <form method="post" action="<?php
echo htmlspecialchars($_SERVER['PHP_SELF'] . "?ph=E02-Formulario-registro");
?>" enctype="multipart/form-data">
                  <h2>Crear cuenta</h2>

                 <?php

/*Pruebas*/

//echo $_FILES['imgPerfil']['type'];
//echo image_type_to_extension($_FILES['imgPerfil']['name'][2]);

?>
                  <input type="text" name="mail" placeholder="Correo electrónico *"  value=<?php
if ((isset($_POST["mail"]))) {
    echo filtroForm($_POST["mail"]);
}
?>>
                  <input type="password" name="password" placeholder="Contraseña*" value=<?php
if ((isset($_POST["password"]))) {
    echo filtroForm($_POST["password"]);
}
?>>
                  <div id="sexo">
                    <p>Sexo*:</p>
                    <div>
                      <input type="radio" name="sexo" value="masculino"<?php
if ($sexo == "masculino") {
    echo "checked";
}

?> >Masculino</input>
                    </div>
                    <div>
                      <input type="radio" name="sexo" value="femenino" <?php
if ($sexo == "femenino") {
    echo "checked";
}

?>>Femenino</input>
                    </div>
                  </div>

  <select name="tipoDocumento">
    <option value="Pasaporte" <?php if (isset($_POST["tipoDocumento"]) == "Pasaporte") {echo 'selected="selected"';}?>>
      Pasaporte
    </option>

    <option value="NIF" <?php if (isset($_POST["tipoDocumento"]) == "NIF") {echo 'selected="selected"';}?>>
    NIF
    </option>
  </select>

  <br>
                  <input type="text" name="dni" placeholder="DNI*" value=<?php
if ((isset($_POST["dni"]))) {
    echo filtroForm($_POST["dni"]);
}
?>>

                  <input type="text" name="nombre" placeholder="Nombre*" value=<?php
if ((isset($_POST["nombre"]))) {
    echo filtroForm($_POST["nombre"]);
}
?>>

                  <input type="text" name="apellidos" placeholder="Apellidos*" value=<?php
if ((isset($_POST["apellidos"]))) {
    echo filtroForm($_POST["apellidos"]);
}
?>>

                  <input type="date" name="fechaNacimiento" placeholder="Fecha Nacimiento*" value=<?php
if ((isset($_POST["fechaNacimiento"]))) {
    echo ($_POST["fechaNacimiento"]);
}
?>>

                  <input type="text" name="direccion" placeholder="Dirección" value=<?php
if (isset($_POST["direccion"])) {
    echo (filtroForm($_POST["direccion"]));
}
?>>
                  <input type="text" name="cp" placeholder="Codigo Postal" value=<?php
if ((isset($_POST["cp"]))) {
    echo (filtroForm($_POST["cp"]));
}
?>>
                  <input type="text" name="poblacion" placeholder="Población" value=<?php
if ((isset($_POST["poblacion"]))) {
    echo (filtroForm($_POST["poblacion"]));
}
?>>
                  <input type="text" name="provincia" placeholder="Provincia" value=<?php
if ((isset($_POST["provincia"]))) {
    echo (filtroForm($_POST["provincia"]));
}
?>>
                  <input type="tel" name="telefono" placeholder="Telefono" value=<?php
if ((isset($_POST["telefono"]))) {
    echo (filtroForm($_POST["telefono"]));
}
?>>
<input type="file" name="imgPerfil" >

                  <input type="submit" name="submitRegistro" value="Crear Cuenta">
                  <p class="signup">
                    ¿Ya tiene una cuenta?<br>
                    <a href="#" onclick="toggleForm();">Iniciar sesión.</a>
                  </p>



                </form>
              </div>
              <div class="imgBx"><img src="img/img-registro.jpg" alt="" /></div>

            </div>
          </div>
        </div>




      </section>