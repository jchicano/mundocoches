<?php $CURRENT_PAGE = "Marcas principales"; ?>
<?php $PAGE_TITLE = "Marcas | Citroën"; ?>
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
    <!-- CITROËN  -->
    <div class="row">
      <div class="col-md-12">
        <div class="bg-black text-center h-100 project">
          <div class="d-flex h-100">
            <div class="project-text w-100 my-auto text-center text-lg-left">
              <h4 class="text-white text-center">CITROËN</h4>
              <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
      <div class="col-md-4">
        <!-- C4 -->
        <a href="c4.php">
          <img class="img-fluid" src="../img/marcas/citroen-c4-01.jpg" alt="C4">
          <div class="letrero">C4</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- C4 CACTUS -->
        <a href="c4_cactus.php">
          <img class="img-fluid" src="../img/marcas/citroen-c4-cactus-01.jpg" alt="C4 Cactus">
          <div class="letrero">C4 Cactus</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- c3 -->
        <a href="c3.php">
          <img class="img-fluid" src="../img/marcas/citroen-c3-01.jpg" alt="C3">
          <div class="letrero">C3</div>
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