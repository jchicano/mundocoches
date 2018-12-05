<?php $CURRENT_PAGE = "Soportes para móviles"; ?>
<?php $PAGE_TITLE = "Accesorios | Soportes para móviles"; ?>

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
      background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("../../img/accesorios/sm.jpg");
      background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("../../img/accesorios/sm.jpg");
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
        <h1 class="mx-auto my-0 bajar-tamano-movil">Soportes para móviles</h1>
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
            <a href="https://www.amazon.es/Tel%C3%A9fono-Universal-Pulgadas-Salpicadero-Smartphones/dp/B0798FNZT4/ref=sr_1_6?ie=UTF8&qid=1542964542&sr=8-6&keywords=soporte+movil+al+coche"
             title=""><img width="230" height="190" alt="" src="../img/accesorios/sp1.jpg" /><span style="text-decoration:none;">SOPORTE UNIVERSAL</span></a>
          </li>

          <li>
            <a href="https://www.amazon.es/Ventilaci%C3%B3n-Universal-Rotaci%C3%B3n-Smartphone-Dispositivo/dp/B01MR4L962/ref=sr_1_1_sspa?ie=UTF8&qid=1542963920&sr=8-1-spons&keywords=soporte+para+movil+coche&psc=1" 
            title=""><img width="230" height="190" alt="" src="../img/accesorios/sp2.jpg" /><span style="text-decoration:none;">IZUKU</span></a>
          </li>
          
          <li>
            <a href="https://www.amazon.es/POOPHUNS-Magn%C3%A9tico-Ajustables-Compatible-Dispositivos/dp/B07CC4QGK5/ref=sr_1_2_sspa?ie=UTF8&qid=1542963923&sr=8-2-spons&keywords=soporte+movil+coche&psc=1"
             title=""><img width="230" height="190" alt="" src="../img/accesorios/sp3.jpg" /><span style="text-decoration:none;">POOPHUNS</span></a> 
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