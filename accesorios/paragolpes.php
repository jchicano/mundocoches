<?php $CURRENT_PAGE = "Paragolpes Delantero"; ?>
<?php $PAGE_TITLE = "Accesorios | Paragolpes Delantero"; ?>

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
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("../../img/accesorios/pd.jpg");
    background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("../../img/accesorios/pd.jpg");
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
        <h1 class="mx-auto my-0">Paragolpes Delantero</h1>
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
            <a href="https://www.google.es/search?q=paragolpes+delantero+mercedes&oq=paragolpes+delantero+mercedes&aqs=chrome..69i57j0l5.8351j0j7&sourceid=chrome&ie=UTF-8"
             title=""><img width="230" height="190" alt="" src="../img/accesorios/mercedes.jpg" /><span style="text-decoration:none;">MERCEDES-BENZ</span></a>
          </li>

          <li>
            <a href="https://www.google.es/search?q=volkswagen+paragolpes+delantero&oq=volkswagen+paragolpes+delantero&aqs=chrome..69i57j0l5.7150j0j7&sourceid=chrome&ie=UTF-8" 
            title=""><img width="230" height="190" alt="" src="../img/accesorios/vol.jpg" /><span style="text-decoration:none;">VOLKSWAGEN</span></a>
          </li>
          
          <li>
            <a href="https://www.google.es/search?q=seat+paragolpes+delantero&oq=seat+paragolpes+delantero&aqs=chrome..69i57j0l5.6687j0j9&sourceid=chrome&ie=UTF-8"
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