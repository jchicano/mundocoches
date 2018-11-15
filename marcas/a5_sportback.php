<?php $CURRENT_PAGE = "Marcas extendidas"; ?>
<?php $PAGE_TITLE = "Marcas | Audi A5 Sportback"; ?>
<!DOCTYPE html>
<html>
<head>
  <?php include("../includes/head-tag-contents.php");?>
  
  <style>
    a {
      transition: filter .5s ease-in-out;
      -webkit-filter: grayscale(100%);
      filter: grayscale(100%);
    }

    a:hover {
      filter: grayscale(0%);
      -webkit-filter: grayscale(0%);
    }
  </style>
</head>
<body>

<?php include("../includes/navigation.php");?>

<!-- CONTENIDO -->

<body class="bg-light" id="page-top"><!--Modificado-->
  <div class="container bg-light">
    <section id="projects" class="projects-section bg-light">
    <!-- AUDI  -->
    <div class="row">
      <div class="col-md-12">
        <div class="bg-black text-center h-100 project">
          <div class="d-flex h-100">
            <div class="project-text w-100 my-auto text-center text-lg-left">
              <h4 class="text-white text-center">A5 SPORTBACK</h4>
              <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
      <div class="col-md-4">
        <!-- A7 Sportback -->
        <a href="a7_sportback.php">
          <img class="img-fluid" src="../img/marcas/audi-logo.jpg">
        </a>
      </div>
      <div class="col-md-4">
        <!-- BMW -->
        <a href="#">
          <img class="img-fluid" src="../img/marcas/bmw-logo.jpg">
        </a>
      </div>
      <div class="col-md-4">
        <!-- Audi -->
        <a href="#">
          <img class="img-fluid" src="../img/marcas/mercedes-logo.jpg">
        </a>
      </div>
    </div>
    </section>
  </div>
</body>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>

</body>
</html>