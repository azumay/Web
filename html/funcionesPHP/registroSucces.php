

<section id="box-form">

<div id="caja-generador">


  <div class='container'>

<?php


echo "<img src='img/success.gif'>";
echo "<div id='boxSuccess'><p>Tu cuenta se ha creado correctamente ✅</p></div>  ";


?>

<p>Para verificar tu cuenta deberes clicar al siguiente enlance:</p>
 <a href="?ph=../funcionesPHP/cuentaVerificada&last_user=<?php echo $ultimoRegistro = mysqli_insert_id($usrGenerico); ?>">Verificar</a>



</div>
          </div>
        </div>





</main>

</body>

</html>