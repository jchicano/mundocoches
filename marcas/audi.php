<?php $CURRENT_PAGE = "Marcas principales"; ?>
<?php $PAGE_TITLE = "Marcas | Audi"; ?>
<!DOCTYPE html>
<html>
<head>
  <?php include("../includes/head-tag-contents.php");?>
<style>
    .letrero {
        background: #000;
        color: #FFF;
        opacity: .8;
        text-align: center;
        position: relative;
        bottom: 25px;
    }

    .letrero:hover{
        text-decoration: none;
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
              <h4 class="text-white text-center">AUDI</h4>
              <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
      <div class="col-md-4">
        <!-- A5 Sportback -->
        <a href="a5_sportback.php">
          <img class="img-fluid" src="../img/analisis/audi_a5_sportback.jpg">
          <div class="letrero">A5 Sportback</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- RS7 Sportback -->
        <a href="#">
          <img class="img-fluid" src="../img/marcas/audi_rs7_sportback_01.jpg">
          <div class="letrero">RS7 Sportback</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- R8 Coupe -->
        <a href="#">
          <img class="img-fluid" src="../img/marcas/audi_r8_coupe_01.jpg">
          <div class="letrero">R8 Coupe</div>
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