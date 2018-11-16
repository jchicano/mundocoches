<?php $CURRENT_PAGE = "Llantas"; ?>
<?php $PAGE_TITLE = "Accesorios | Llantas"; ?>

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
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("../../img/accesorios/tire.jpg");
    background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("../../img/accesorios/tire.jpg");
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
        <h1 class="mx-auto my-0">Llantas</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>
        <a href="#scroll" class="js-scroll-trigger">
          <i class="fa fa-chevron-circle-down" style="font-size:48px;color:gainsboro"></i>
        </a>
      </div>
    </div>
  </header>
  <div class="container bg-light align-items-center justify-content-center ">
    <section id="scroll" class="projects-section bg-light">
      <div class="row no-gutters mb-5 mb-lg-0">
        <ul id="galeriaacc">
          <li>
            <a href="https://www.mercedes-benz.es/vans/es/marco-polo/marco-polo-activity/equipment"
             title=""><img width="230" height="190" alt="" src="../img/accesorios/mercedes.jpg" /><span style="text-decoration:none;">MERCEDES-BENZ</span></a>
          </li>

          <li>
            <a href="https://store.volkswagen.es/accesorios-volkswagen?utm_source=Adwords&utm_medium=cpc&utm_campaign=Volkswagen%20Store&gclid=EAIaIQobChMI3IjU1s3Y3gIViRrTCh2qcwcHEAAYASAAEgLVN_D_BwE" 
            title=""><img width="230" height="190" alt="" src="../img/accesorios/vol.jpg" /><span style="text-decoration:none;">VOLKSWAGEN</span></a>
          </li>
          
          <li>
            <a href="https://www.bmw.es/es/topics/accesorios-servicios/accesorios/buscador-de-accesorios/llantas-de-aleaci%C3%B3n-ligera.html?bmw=sea:BMW%20//%20PV%20//%20ACCESORIOS:brand:google:ad:NA:c:bmw%20PV:BMW%20//%20PV%20//%20ACCESORIOS%20//%20LLANTAS%20//%20BR:%2Bllantas%20%2Bbmw:NA:NA&scp=true"
             title=""><img width="230" height="190" alt="" src="../img/accesorios/bmw.jpg" /><span style="text-decoration:none;">BMW</span></a> 
          </li>
        </ul>
      </div>
    </section>
  </div>
</body>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>

</body>
</html>