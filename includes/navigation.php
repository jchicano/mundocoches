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
      <img src="img/logo.png" alt="" width="50%">
    </a>
    <?php } else { ?>
    <a class="navbar-brand js-scroll-trigger" href="../index.php">
      <img src="../img/logo.png" alt="" width="50%">
    </a>
    <?php } ?>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="plantilla.php">Plantilla</a>
				</li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">Marcas</a>
        </li>
        <li class="nav-item">
					<?php if ($CURRENT_PAGE == "Index") { ?>
						<a class="nav-link" href="analisis/index.php">Análisis</a>
					<?php }
						else { ?>
							<a class="nav-link" href="#">Análisis</a>
					<?php
						}
					?>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#">Accesorios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#projects">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>