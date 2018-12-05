<?php $CURRENT_PAGE = "Faros"; ?>
<?php $PAGE_TITLE = "Accesorios | Faros"; ?>

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
      background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("../../img/accesorios/faro.jpg");
      background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("../../img/accesorios/faro.jpg");
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
        <h1 class="mx-auto my-0 bajar-tamano-movil">Faros</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
        <a href="#scroll" class="js-scroll-trigger">
          <i class="fa fa-chevron-circle-down" style="font-size:48px;color:gainsboro"></i>
        </a>
      </div>
    </div>
  </header>
  <div class="container bg-light align-items-center justify-content-center ">
    <section id="scroll" class="projects-section bg-light">
      <ul id="galeriaacc">
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
          <li>
            <a href="https://www.google.es/search?ei=8oruW5GGCIuQlwT6m7XIBQ&q=faros+mercedes&oq=faros+mercedes&gs_l=psy-ab.3.0.0l10.2723.4303..4417...0.0..0.86.240.3......0....1..gws-wiz.......0i71j0i8i7i30j0i13.XdkK2aJOXQ4"
             title=""><img width="230" height="190" alt="" src="../img/accesorios/mercedes.jpg" /><span style="text-decoration:none;">MERCEDES-BENZ</span></a>
          </li>

          <li>
            <a href="https://www.google.es/search?ei=94ruW8P3IcmOlwSC7qz4Dw&q=faros+volkswagen&oq=faros+volkswagen&gs_l=psy-ab.3..0l10.12687.15581..15839...0.0..0.77.730.10......0....1..gws-wiz.T6qlQJxbabc" 
            title=""><img width="230" height="190" alt="" src="../img/accesorios/vol.jpg" /><span style="text-decoration:none;">VOLKSWAGEN</span></a>
          </li>
          
          <li>
            <a href="https://www.google.es/search?ei=CIvuW8i-Cc-IlwSb96-wDQ&q=faros+seat&oq=faros+seat&gs_l=psy-ab.3..0l10.13072.13723..14126...0.0..0.80.300.4......0....1..gws-wiz.......0i71.CO9JeLHebSA"
             title=""><img width="230" height="190" alt="" src="../img/accesorios/seat.jpg" /><span style="text-decoration:none;">SEAT</span></a> 
          </li>
        </div>  
      </ul>
    </section>
  </div>
</body>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>

</body>
</html>