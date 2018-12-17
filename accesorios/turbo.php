<?php $CURRENT_PAGE = "Kit Turbo"; ?>
<?php $PAGE_TITLE = "Accesorios | Kit Turbo"; ?>

<!DOCTYPE html>
<html>
<head>

  <style>
    .masthead-pd {
      position: relative;
      width: 100%;
      height: auto;
      min-height: 35rem;
      padding: 15rem 0;
      background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("../../img/accesorios/turbo.jpg");
      background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("../../img/accesorios/turbo.jpg");
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
  <header class="masthead-pd">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 bajar-tamano-movil">Kit Turbo</h1>
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
              <a href="https://www.google.es/search?ei=F4vuW-rYBIiPlwShnImAAQ&q=kit+turbo+mercedes&oq=kit+turbo+mercedes&gs_l=psy-ab.3..0l2j0i22i30l8.153533.158152..158346...0.0..0.92.1422.18......0....1..gws-wiz.......0i71j0i131j0i67.25sPJnd82_k"
              title=""><img width="230" height="190" alt="" src="../img/accesorios/mercedes.jpg" /><span style="text-decoration:none;">MERCEDES-BENZ</span></a>
            </li>

            <li class="m-3"><!--SEPARACION ENTRE IMÁGENES -->
              <a href="https://www.google.es/search?biw=1366&bih=480&ei=SYzuW9DtGIama6jHjYgG&q=kit+turbo+bmw&oq=kit+turbo+bmw&gs_l=psy-ab.3..0l10.1361.5228..5775...0.0..0.87.1018.13......0....1..gws-wiz.......0i131j0i67j0i131i67.eL76jhP1h7E" 
              title=""><img width="230" height="190" alt="" src="../img/accesorios/bmw.jpg" /><span style="text-decoration:none;">BMW</span></a>
            </li>
            
            <li class="m-3"><!--SEPARACION ENTRE IMÁGENES -->
              <a href="https://www.google.es/search?q=kit+turbo+audi&oq=kit+turbo+audi&aqs=chrome..69i57j0l5.4159j0j4&sourceid=chrome&ie=UTF-8"
              title=""><img width="230" height="190" alt="" src="../img/accesorios/audi.svg" /><span style="text-decoration:none;">AUDI</span></a> 
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