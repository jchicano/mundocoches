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

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
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

        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-user"></i></a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
              <li><a href="#">JavaScript</a></li>
            </ul>
          </div>
        </li>

        <li id="dropdownLoginLI" class="dropdown">
            <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle"><i class="fas fa-user"></i> <span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu-right mt-2">
                <li class="px-3 py-2">
                    <form class="form" role="form">
                        <div class="form-group">
                            <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" required="">
                        </div>
                        <div class="form-group">
                            <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text" required="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="text-center">
                            <small>or</small>
                        </div>

                        <div class="form-group">
                            <button id="googleSignInBtn" class="btn-google">SIGN IN WITH GOOGLE</button>
                        </div>
                        
                        <div class="form-group text-center">
                            <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
                        </div>
                    </form>
                </li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>