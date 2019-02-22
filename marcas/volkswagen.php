<?php $CURRENT_PAGE = "Marcas principales"; ?>
<?php $PAGE_TITLE = "Marcas | Volkswagen"; ?>
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
    <!-- WOLKSWAGEN  -->
    <div class="row">
      <div class="col-md-12">
        <div class="bg-black text-center h-100 project">
          <div class="d-flex h-100">
            <div class="project-text w-100 my-auto text-center text-lg-left">
              <h4 class="text-white text-center">VOLKSWAGEN</h4>
              <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
      <div class="col-md-4">
        <!-- Golf -->
        <a href="golf.php">
          <img class="img-fluid" src="../img/marcas/volkswagen-golf-01.jpg" alt="Golf">
          <div class="letrero">Golf</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- Passat -->
        <a href="passat.php">
          <img class="img-fluid" src="../img/marcas/volkswagen-passat-01.jpg" alt="Passat">
          <div class="letrero">Passat</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- Polo -->
        <a href="polo.php">
          <img class="img-fluid" src="../img/marcas/volkswagen-polo-01.jpg" alt="Polo">
          <div class="letrero">Polo</div>
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