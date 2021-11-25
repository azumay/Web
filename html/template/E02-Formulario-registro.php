<section id="box-form">

<div id="caja-generador">
    <div id="titulo-generador">
        <h2>E02 Formulari de Registro</h2>
       
        <span class="tecnologia_usada">
            <img src="/Web/img/html.png">
            <img src="/Web/img/css-3.png">
            <img src="/Web/img/php.png">
        </span>


    </div>
   
    <div class='container'>
  
    <section id="form-section">
<div id="box-registro">
<?php

include "html/funcionesPHP/verificarRegistro.php";



?>

     <div class="contenedorForm">
      <div class="user signinBx">
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
        <div class="formBx">
          <form action="" onsubmit="return false;">
            <h2>Iniciar sesión</h2>
            <input type="text" name="" placeholder="Usuario@mail.com" />
            <input type="password" name="" placeholder="Contraseña" />
            <input type="submit" name="" value="Entrar" />
            <p class="signup">
            ¿Eres nuevo aquí?<br>
              <a href="#" onclick="toggleForm();">Registrate.</a>
            </p>
          </form>
        </div>
      </div>
      <div class="user signupBx">
        <div class="formBx">  
          


          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?ph=E02-Formulario-registro");?>">
            <h2>Crear cuenta</h2>
            

            <input type="text" name="dni" placeholder="DNI" value=<?php if (isset($_POST['dni'])) {echo $_POST['dni'];}?>>

            <input type="text" name="nombre" placeholder="Nombre" value=<?php if (isset($_POST['nombre'])) {echo $_POST['nombre'];}?>>

            <input type="text" name="apellidos" placeholder="Apellidos" value=<?php if (isset($_POST['apellidos'])) {echo $_POST['apellidos'];}?>>

            <input type="date" name="fechaNacimiento" placeholder="Fecha Nacimiento" value=<?php if (isset($_POST['fechaNacimiento'])) {echo $_POST['fechaNacimiento'];}?>>

            <input type="text" name="direccion" placeholder="Dirección" >
            <input type="text" name="cp" placeholder="Codigo Postal" >
            <input type="text" name="poblacion" placeholder="Población" >
            <input type="text" name="provincia" placeholder="Provincia" >
            <input type="tel" name="telefono" placeholder="Telefono">

            <input type="text" name="usuario" placeholder="@Username" >
            <input type="email" name="mail" placeholder="Email Address" >
            <input type="password" name="" placeholder="Contraseña">
            <input type="password" name="" placeholder="Confirma Contraseña" >
            <input type="submit" name="submitRegistro" value="Crear Cuenta" >
            <p class="signup">
              ¿Ya tiene una cuenta?<br>
              <a href="#" onclick="toggleForm();">Iniciar sesión.</a>
            </p>
          
            <?php

if (isset($errorCampo)) {
  foreach ($errorCampo as $error) {
      echo " $error ";
  }
} else if (!isset($errorCampo) && $_SERVER["REQUEST_METHOD"] == "POST") {
echo $userName;
echo $dni;
}
//echo "<p class='green'>Tus datos han sido enviados con extio!</p>";
?>

          </form>
        </div>
        <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
      
      </div>
    </div>
</div>




</section>
