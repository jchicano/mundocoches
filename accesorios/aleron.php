<?php $CURRENT_PAGE = "Alerones"; ?>
<?php $PAGE_TITLE = "Accesorios | Alerones"; ?>

<!DOCTYPE html>
<html>
<head>
  <?php include("../includes/head-tag-contents.php");?>
  <link rel="stylesheet" href="../css/accesorios/imgMosaico.css">
  <link rel="stylesheet" href="../css/accesorios/scrollAcc.css">
</head>
<body>

<style>
  .masthead-pd {
    position: relative;
    width: 100%;
    height: auto;
    min-height: 35rem;
    padding: 15rem 0;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("../../img/accesorios/ale.jpg");
    background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("../../img/accesorios/ale.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
  }
</style>

<?php include("../includes/navigation.php");?>

<!-- CONTENIDO -->
<body class="bg-light"><!--Modificado-->
  <header class="masthead-pd">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0">Alerones</h1>
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
            <a href="https://www.google.es/search?ei=NoXuW_qaNYPSgAb3u6nwCg&q=spoiler+mercedes&oq=spoiler+mercedes&gs_l=psy-ab.3..0l10.15800.17219..17508...0.0..0.78.598.8......0....1..gws-wiz.KepdnaruqcA"
             title=""><img width="230" height="190" alt="" src="../img/accesorios/mercedes.jpg" /><span style="text-decoration:none;">MERCEDES-BENZ</span></a>
          </li>

          <li>
            <a href="https://www.google.es/search?ei=GoXuW4_AH47IaNqHvZAP&q=spoiler+volkswagen&oq=spoiler+volkswagen&gs_l=psy-ab.3..0l6j0i22i30l4.23741.27126..27657...0.0..0.132.611.7j1......0....1..gws-wiz.......0i71.QTwMw4wtT7I" 
            title=""><img width="230" height="190" alt="" src="../img/accesorios/vol.jpg" /><span style="text-decoration:none;">VOLKSWAGEN</span></a>
          </li>
          
          <li>
            <a href="https://www.google.es/search?ei=BoTuW9OXKMiWa76Zh8AF&q=spoiler+seat&oq=spoiler+seat&gs_l=psy-ab.3..0j0i67j0l3j0i7i30j0l2j0i7i30j0.266631.273878..275034...4.0..0.84.847.11......0....1..gws-wiz.......0i71j0i7i30i19j0i7i10i30j0i8i7i30j0i8i7i10i30j0i13j0i10j0i10i30j0i5i10i30j0i8i10i30.lH2koPgE5iw"
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