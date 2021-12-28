
   <section id="banner">

            <img src="img/sky--purple-kracked.jpg">

            <div class="contenedor">
                <div id="logo">
                    <a href="?ph=home"><img src="img/elefante.png" style="width: 15%;"></a>
                </div>
                <h2>M7 - PHP</h2>
                <p><?php echo $titleWeb ?></p>
    <?php 
    if(!empty($user)){
        $mail_usuario = $user['email'];
        $img_user = $user['imatge'];
        $img_user = substr($img_user, 18);
        
        echo "<ul id='account-user'>
            <li> 
            
                <img src='$img_user' style='width: 90px;'>
          </li>
           <li>
                <p>$mail_usuario</p> 
         
            </li>
            <li>
                <p>
                    <img id='logout' src='/Web/img/cerrar-sesion.png'>
                    <a href='?cerrar_sesion'>
                        Logout
                    </a>
                </p>
            </li>
            
         </ul>";

     
    }
    ?>
      
            </div>
    </section>

        <section id="navegador">
            <nav>
                <ul>
                    <li><a href="?ph=home"><?php echo $mainHome ?></a></li>
                    <li><a href="#"><?php echo $mainExercise ?></a>

                        <div>

                            <ul>
                                <li class="titulo lila "><a href=""></a>UF1</li>
                                <li><a href="?ph=uf1E01"><?php echo $ejer1 ?></a></li>
                                <li><a href="?ph=E02-Sintaxis-variables"><?php echo $ejer2 ?></a></li>
                                <li><a href="?ph=E03-Estructures-Control"><?php echo $ejer3 ?></a></li>
                                <li><a href="?ph=E04-Captura-imatges-externes"><?php echo $ejer5 ?></a></li>
                                <li><a href="?ph=E6-Web-scraping"><?php echo $ejer6 ?></a></li>
                                <li><a href="?ph=E07-Cotizaciones"><?php echo $ejer7 ?></a></li>
                                <li><a href="?ph=E09-Formulario-contacto">E09 - Formulari de contacte</a></li>
                            </ul>

                            <ul>
                                <li class="titulo lila"><a href=""></a>UF2</li>
                                
                                <li><a href="?ph=E02-Formulario-registro">E02 - Formulario Registro</a></li>
                            </ul>
<!--
                            <ul>
                                <li class="titulo verde"><a href="">Categoria #1</a></li>
                                <li><a href="">Categoria #2</a></li>
                                <li><a href="">Categoria #3</a></li>
                                <li><a href="">Categoria #4</a></li>
                                <li><a href="">Categoria #5</a></li>
                            </ul>

                            
            <ul>
              <li class="titulo rojo"><a href="">Categoria #1</a></li>
              <li><a href="">Categoria #2</a></li>
              <li><a href="">Categoria #3</a></li>
              <li><a href="">Categoria #4</a></li>
              <li><a href="">Categoria #5</a></li>
            </ul>

            <ul>
              <li class="titulo naranja"><a href="">Categoria #1</a></li>
              <li><a href="">Categoria #2</a></li>
              <li><a href="">Categoria #3</a></li>
              <li><a href="">Categoria #4</a></li>
              <li><a href="">Categoria #5</a></li>
            </ul>
            -->   

        </div>
                     

                    </li>
                    <li><a href="#"><?php echo $mainProducts ?></a></li>
                    <li><a href="?ph=E02-Formulario-registro">Login🔐</a></li>
                    <li><a href="#"><?php echo $mainLanguage ?></a>
                    <div id="boxIdioma">
                        <ul>
                                <li><a href="?lang=es"><img src="img/flag/spain.jpg"> Español</a></li>
                                <li><a href="?lang=cat"><img src="img/flag/cat.jpg"> Catalan</a></li>
                                <li><a href="?lang=en"><img src="img/flag/english.jpg"> English</a></li>
                                <li><a href="?lang=ger"><img src="img/flag/ger.jpg"> Deutsh</a></li>
                                <li><a href="?lang=fr"><img src="img/flag/fr.jpg"> Français</a></li>

                        </ul>
                    </div>
                    </li>
                </ul>
            </nav>
        </section>
