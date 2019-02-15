<!-- CODIGO ORIGINAL DEL FRAMEWORK
<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "About") {?>active<?php }?>" href="about.php">About Us</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="contact.php">Contact</a>
	  </li>
	</ul>
</div>
-->

<?php if ($CURRENT_PAGE == "Index" || $CURRENT_PAGE == "Gestion" || $CURRENT_PAGE == "Registro" || $CURRENT_PAGE == "Política de privacidad" || $CURRENT_PAGE == "Términos legales") {
  include("db/loginUsuario.php");
} else {
  include("../db/loginUsuario.php");
}
?>

<!--<script src="../js/loginDemo.js"></script>-->

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

<!-- Se rellenan las variables de sesión --><!--
<span id="idUserLogin" style="display: none;"></span>
<span id="nombreUserLogin" sytle="display: none;"></span>
<span id="rolUserLogin" style="display: none;"></span>-->


  <div class="container">
    <?php if($CURRENT_PAGE == "Index") { ?>
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <img src="../img/logo.png" alt="MundoCoches" width="149.42px" height="42.69px">
    </a>
    <?php } else { ?>
    <a class="navbar-brand" href="../index.php">
      <img src="../img/logo.png" alt="MundoCoches" width="149.42px" height="42.69px">
    </a>
    <?php } ?>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <?php if ($CURRENT_PAGE == "Index") { //Si la página es Index ?>
            <a class="nav-link" href="noticias/">Noticias</a>
          <?php } else if ($CURRENT_PAGE == "Noticias") { //Si la página es Noticias ?>
            <a class="nav-link active js-scroll-trigger" href="#page-top">Noticias</a>
          <?php } else if ($CURRENT_PAGE != "Noticias") { ?><!-- Si la página no es ninguna de las anteriores-->
            <a class="nav-link" href="../noticias/">Noticias</a>
					<?php } else { ?>
            <a class="nav-link" href="#">Noticias</a>
					<?php
						}
					?>
        </li>
        <li class="nav-item">
          <?php if ($CURRENT_PAGE == "Index") { ?>
            <a class="nav-link" href="marcas/">Marcas</a>
          <?php } else if ($CURRENT_PAGE == "Marcas") { ?>
            <a class="nav-link active js-scroll-trigger" href="#page-top">Marcas</a>
          <?php } else if ($CURRENT_PAGE != "Marcas") { ?><!-- -->
            <a class="nav-link" href="../marcas/">Marcas</a>
					<?php } else { ?>
          <a class="nav-link" href="#">Marcas</a>
					<?php
						}
					?>
        </li>
        <li class="nav-item">
					<?php if ($CURRENT_PAGE == "Index") { //La pagina es index ?>
						<a class="nav-link" href="analisis/">Análisis</a>
					<?php } else if ($CURRENT_PAGE == "Analisis") { ?>
            <a class="nav-link active js-scroll-trigger" href="#page-top">Análisis</a>
          <?php } else if ($CURRENT_PAGE != "Analisis") { ?><!-- -->
            <a class="nav-link" href="../analisis/">Análisis</a>
					<?php	} else { //La pagina no es index ni analisis ?>
            <a class="nav-link" href="#">Análisis</a>
          <?php
            }
					?>
        </li>
        <li class="nav-item">
          <?php if ($CURRENT_PAGE == "Index") { ?>
            <a class="nav-link" href="accesorios/">Accesorios</a>
          <?php } else if ($CURRENT_PAGE == "Accesorios") { ?>
            <a class="nav-link active js-scroll-trigger" href="#page-top">Accesorios</a>
          <?php } else if ($CURRENT_PAGE != "Accesorios") { ?><!-- -->
            <a class="nav-link" href="../accesorios/">Accesorios</a>
          <?php } else { ?>
            <a class="nav-link" href="#">Accesorios</a>
          <?php
            }
          ?>
        </li>
        <?php if ($CURRENT_PAGE == "Index") { ?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">Nosotros</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#projects">Reciente</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#signup">Contacto</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="../index.php#about">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="../index.php#signup">Contacto</a>
        </li>
        <?php
          }
        ?>
        </li>

        <!-- Boton Login sin logearse nadie -->
        <?php if(!isset($_SESSION["idUser"]) && !isset($_SESSION["nombreUser"]) && !isset($_SESSION["rolUser"])) { ?>
        <li class="nav-item dropdown" id="dropdownLoginLI">
          <button style="padding:12px; margin-top:10px;" type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn nav-link js-scroll-trigger btn-outline-secondary dropdown-toggle"><i class="fas fa-user"></i> <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-menu-right mt-2">
                <li class="px-3 py-2">
                    <form class="form" role="form" action="" method="post">
                        <!--<span style="color: red;" id="loginError"></span>-->
                        <div class="form-group">
                            <input id="emailInput" name="emailInput" placeholder="Email" class="form-control form-control-sm" type="email" required="">
                        </div>
                        <div class="form-group">
                            <input id="passwordInput" name="passwordInput" placeholder="Contraseña" class="form-control form-control-sm" type="password" required="">
                        </div>
                        <input type="hidden" name="loginCorrecto" id="loginCorrecto">
                        <div class="form-group">
                            <button type="submit" id="botonLogin" name="botonLogin" class="btn btn-primary btn-block quitarMayus">Iniciar sesión</button>
                        </div>
              
                        <hr>

                        <div class="form-group">
                            <button type="button" id="googleSignInBtn2" class="btn btn-danger quitarMayus" style="white-space: normal; width:300px;"><i class="fab fa-google mr-2"></i>Iniciar sesión con Google</button>
                        </div>
                        
                        <div class="form-group text-center">
                        <?php if ($CURRENT_PAGE == "Index") { ?>
                          <small><a href="registro.php">¿No tienes cuenta? ¡Regístrate!</a></small>
                        <?php } else { ?>
                          <small><a href="../registro.php">¿No tienes cuenta? ¡Regístrate!</a></small>
                        <?php
                          }
                        ?>
                            
                        </div>
                    </form>
                </li>
            </ul>
        </li>

        <?php } else { ?>
        
        <!-- Boton Login una vez logeado -->
        <li class="nav-item dropdown" id="dropdownLoginLI">
          <button style="padding:12px; margin-top:10px;" type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn nav-link js-scroll-trigger quitarMayus btn-outline-secondary dropdown-toggle"><span class="caret"><?php echo $_SESSION["nombreUser"]; ?></span></button>
          <ul class="dropdown-menu dropdown-menu-right mt-2">
                <li class="px-3 py-2">
                    <form class="form" role="form" action="/cerrarSesion.php" method="post">
                        <?php if($_SESSION["rolUser"] == 1) { ?>
                        <div class="form-group">
                          <a href="/gestionUsuarios.php" id="botonGestion" name="botonGestion" class="btn btn-primary btn-block quitarMayus">Gestionar usuarios</a>
                        </div>
                        <hr>

                        <?php } ?>
                        <!-- Variable de sesión que guarda/sobreescribe la página actual para cuando cierra sesión el usuario -->
                        <?php $_SESSION["pagActual"] = $_SERVER["PHP_SELF"];?>
                        <div class="form-group">
                            <button type="submit" id="botonLogin" name="botonLogin" class="btn btn-primary btn-block quitarMayus">Cerrar sesión</button>
                        </div>
              
                        
                    </form>
                </li>
            </ul>
        </li>

        <?php } ?>


      </ul>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="modalLogin">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        
            <!-- Modal body -->
            <div class="modal-body text-center">
            <span id="modalLoginComentarioMensaje" class="h6"></span>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
        </div>
    </div>


<!-- Script para activar el modal al intentar iniciar sesión si el email o la contraseña son incorrectos --> 
<?php if(isset($show_modalLogin) && $show_modalLogin){ ?>
    <script>
        $("#modalLoginComentarioMensaje").text("Email o contraseña incorrecta.");
        $("#modalLogin").modal(); 
    </script>
<?php } ?>