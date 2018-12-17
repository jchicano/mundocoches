<?php $CURRENT_PAGE = "Marcas principales"; ?>
<?php $PAGE_TITLE = "Marcas | BMW"; ?>
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
    <!-- BMW  -->
    <div class="row">
      <div class="col-md-12">
        <div class="bg-black text-center h-100 project">
          <div class="d-flex h-100">
            <div class="project-text w-100 my-auto text-center text-lg-left">
              <h4 class="text-white text-center">BMW</h4>
              <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
      <div class="col-md-4">
        <!-- M2 Competition -->
        <a href="m2_competition.php">
          <img class="img-fluid" src="../img/analisis/bmw_m2_competition.jpg">
          <div class="letrero">M2 Competition</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- M3 -->
        <a href="m3.php">
          <img class="img-fluid" src="../img/marcas/bmw-m3-01.jpg">
          <div class="letrero">M3</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- M5 -->
        <a href="m5.php">
          <img class="img-fluid" src="../img/marcas/bmw-m5-01.jpg">
          <div class="letrero">M5</div>
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