<?php $CURRENT_PAGE = "Cambio de aceite"; ?>
<?php $PAGE_TITLE = "Accesorios | Cambio de aceite"; ?>

<!DOCTYPE html>
<html>
<head>

  <style>

    /*FONDO SCROLL ES IGUAL PARA LOS DEMÁS ACCESORIOS*/
    .masthead-pd {
      position: relative;
      width: 100%;
      height: auto;
      min-height: 35rem;
      padding: 15rem 0;
      background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("../../img/accesorios/aceites.jpg");
      background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("../../img/accesorios/aceites.jpg");
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: scroll;
      background-size: cover;
    }
  </style>

  <?php include("../includes/head-tag-contents.php");?>
  <link rel="stylesheet" href="../css/accesorios/imgMosaico.css">
  <link rel="stylesheet" href="../css/accesorios/scrollAcc.css">
</head>
<body>

<?php include("../includes/navigation.php");?>

<!-- CONTENIDO -->
<body class="bg-light"><!--Modificado-->
  <!--Movimiento scroll es igual para los demás accesorios-->
  <header class="masthead-pd">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0">Cambio de aceite</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
        <a href="#scroll" class="js-scroll-trigger">
          <i class="fa fa-chevron-circle-down" style="font-size:48px;color:gainsboro"></i>
        </a>
      </div>
    </div>
  </header>

  <div class="container bg-light align-items-center justify-content-center ">
    <div class="container bg-light"> 
      <section id="scroll" class="projects-section bg-light">
        <ul id="galeriaacc">
          <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            <li class="m-3"><!--SEPARACION ENTRE IMÁGENES -->
              <a href="https://www.repsol.com/es/productos-y-servicios/lubricantes/turismo/index.cshtml"
              title=""><img width="230" height="190" alt="" src="../img/accesorios/repsol.jpg" /><span style="text-decoration:none;">REPSOL</span></a>
            </li>

            <li class="m-3"><!--SEPARACION ENTRE IMÁGENES -->
              <a href="http://www.total.es/" 
              title=""><img width="230" height="190" alt="" src="../img/accesorios/castrol.jpg" /><span style="text-decoration:none;">CASTROL</span></a>
            </li>
            
            <li class="m-3"><!--SEPARACION ENTRE IMÁGENES -->
              <a href="https://www.castrol.com/es_es/spain.html"
              title=""><img width="230" height="190" alt="" src="../img/accesorios/total.jpg" /><span style="text-decoration:none;">TOTAL</span></a> 
            </li>
          </div>
        </ul>
      </section>
    </div>  
  </div>
</body>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>

</body>
</html>