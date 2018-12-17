<?php $CURRENT_PAGE = "Marcas principales"; ?>
<?php $PAGE_TITLE = "Marcas | Renault"; ?>
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
    <!-- RENAULT  -->
    <div class="row">
      <div class="col-md-12">
        <div class="bg-black text-center h-100 project">
          <div class="d-flex h-100">
            <div class="project-text w-100 my-auto text-center text-lg-left">
              <h4 class="text-white text-center">RENAULT</h4>
              <hr style="width:100%;" class="d-none d-lg-block mb-0 ml-0">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
      <div class="col-md-4">
        <!-- Megane -->
        <a href="megane.php">
          <img class="img-fluid" src="../img/marcas/renault-megane-01.jpg">
          <div class="letrero">Megane</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- Clio -->
        <a href="clio.php">
          <img class="img-fluid" src="../img/marcas/renault-clio-01.jpg">
          <div class="letrero">Clio</div>
        </a>
      </div>
      <div class="col-md-4">
        <!-- Talismán -->
        <a href="talisman.php">
          <img class="img-fluid" src="../img/marcas/renault-talisman-01.jpg">
          <div class="letrero">Talismán</div>
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