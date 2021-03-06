<?php include("../includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
  <?php include("../includes/head-tag-contents.php");?>
  
  <style>
    a {
      transition: filter .5s ease-in-out;
      -webkit-filter: grayscale(0%);
      filter: grayscale(0%);
    }

    a:hover {
      filter: grayscale(100%);
      -webkit-filter: grayscale(100%);
    }
  </style>
</head>
<body>

<?php include("../includes/navigation.php");?>

<!-- CONTENIDO -->

<body class="bg-light" id="page-top"><!--Modificado-->
  <div class="container bg-light">
    <section id="projects" class="projects-section bg-light">
      <!-- Gama alta  -->
      <div class="row">
        <div class="col-md-12">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white text-center">GAMA ALTA</h4>
                <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-md-4">
          <!-- Audi -->
          <a href="audi.php">
            <img class="img-fluid" src="../img/marcas/audi-logo.jpg" alt="Audi">
          </a>
        </div>
        <div class="col-md-4">
          <!-- BMW -->
          <a href="bmw.php">
            <img class="img-fluid" src="../img/marcas/bmw-logo.jpg" alt="BMW">
          </a>
        </div>
        <div class="col-md-4">
          <!-- Mercedes-Benz -->
          <a href="mercedes.php">
            <img class="img-fluid" src="../img/marcas/mercedes-logo.jpg" alt="Mercedes Benz">
          </a>
        </div>
      </div>
      <!-- Gama media -->
      <div class="row">
        <div class="col-md-12">
          <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-left">
                  <h4 class="text-white text-center">GAMA MEDIA</h4>
                  <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-md-4">
          <!-- Citroën -->
          <a href="citroen.php">
            <img class="img-fluid" src="../img/marcas/citroen-logo.jpg" alt="Citroen">
          </a>
        </div>
        <div class="col-md-4">
          <!-- Renault -->
          <a href="renault.php">
            <img class="img-fluid" src="../img/marcas/renault-logo.jpg" alt="Renault">
          </a>
        </div>
        <div class="col-md-4">
          <!-- Volkswagen -->
          <a href="volkswagen.php">
            <img class="img-fluid" src="../img/marcas/vw-logo.jpg" alt="Volkswagen">
          </a>
        </div>
      </div>
      <!-- Gama baja -->
      <div class="row">
        <div class="col-md-12">
          <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-left">
                  <h4 class="text-white text-center">GAMA BAJA</h4>
                  <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-md-4">
          <!-- Dacia -->
          <a href="dacia.php">
            <img class="img-fluid" src="../img/marcas/dacia-logo.jpg" alt="Dacia">
          </a>
        </div>
        <div class="col-md-4">
          <!-- Hyundai -->
          <a href="hyundai.php">
            <img class="img-fluid" src="../img/marcas/hyundai-logo.jpg" alt="Hyundai">
          </a>
        </div>
        <div class="col-md-4">
          <!-- SEAT -->
          <a href="seat.php">
            <img class="img-fluid" src="../img/marcas/seat-logo.jpg" alt="SEAT">
          </a>
        </div>
      </div>
      <section id="projects" class="projects-section bg-light" style="margin-bottom:-200px">
        <div align="center" class="row justify-content-center no-gutters mb-5 mb-lg-0">
          <div class="col-md-12">
            <iframe width="75%" height="550" src="https://www.youtube-nocookie.com/embed/YIyQeM5KUh0?rel=0&amp;showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </section>
    </section>
  </div>
</body>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>

</body>
</html>