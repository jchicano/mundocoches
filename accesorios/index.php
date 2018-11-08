<?php include("../includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
  <?php include("../includes/head-tag-contents.php");?>

  <!-- IMAGENES EN MOSAICO  (GALERIA)-->

  <style>
    #galeria2{
      width:100%;
      margin:10px 5px;
      padding:0
    }

    #galeria2 li{
      height:160px; /*el mismo alto que la imagen*/
      width:200px;/*el mismo ancho que la imagen*/
      display:block;
      margin:0 20px 20px 0; /*separación de cada elemento*/
      padding:0;
      border:1px solid #ccc; /*el ancho, estilo y color de borde*/
      float:left;
      list-style:none;
      position:relative;
      overflow:hidden;
    }

    #galeria2 a{
      background:none;
      margin:0;
      padding:0;
      font-size:19px;
      color:#fff;
      text-align:center;
      white-space:nowrap
    }

    #galeria2 li img{
      width:200px;/*ancho de la imagen*/
      height:160px; /*alto de la imagen*/
      margin:0;
      padding:0;
      border:none
    }

    #galeria2 span{
      width:200px;
      left:1px; /*el mismo ancho que el borde*/
      margin:0;
      padding:3px 0 3px 0;
      background:#000;
      bottom:-8px;
      left:0px; filter:alpha(opacity=0);
      opacity:0;
      overflow:hidden;
      cursor:pointer; position:absolute;-webkit-transition:all .25s ease; -moz-transition:all .25s ease; -o-transition:all .25s ease; transition:all .25s ease;
    }

    #galeria2 a:hover span{
      left:0;bottom:0; opacity:.8;filter:alpha(opacity=80)
    }
    
    #galeria2 a span:hover{
      color:#5658BB /*color fuente al poner el puntero encima*/
    }
  </style>

  <!-- FIN IMAGENES EN MOSAICO  (GALERIA)-->
</head>
<body>

<?php include("../includes/navigation.php");?>

<!-- CONTENIDO -->

<body class="bg-light"><!--Modificado-->
  <div class="container bg-light">
    <section id="projects" class="projects-section bg-light">
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <ul id="galeria2">
          <!-- PRIMERA LÍNEA DE 5 IMÁGENES -->
          <li>
            <a href="#" title=""><img width="200" height="160" alt="" src="../img/accesorios/bmwacc.jpg" /><span style="text-decoration:none;">El título o leyenda</span></a>
          </li>
          
          <li>
            <a href="#" title=""><img width="200" height="160" alt="" src="../img/accesorios/bmwacc.jpg" /><span style="text-decoration:none;">El título o leyenda</span></a> 
          </li>

          <li>
            <a href="#" title=""><img width="200" height="160" alt="" src="../img/accesorios/bmwacc.jpg" /><span style="text-decoration:none;">El título o leyenda</span></a>
          </li>

          <li>
            <a href="#" title=""><img width="200" height="160" alt="" src="../img/accesorios/bmwacc.jpg" /><span style="text-decoration:none;">El título o leyenda</span></a>
          </li>

          <li>
            <a href="#" title=""><img width="200" height="160" alt="" src="../img/accesorios/bmwacc.jpg" /><span style="text-decoration:none;">El título o leyenda</span></a>
          </li>

          <!-- SEGUNDA LÍNEA DE 5 IMÁGENES -->
          <li>
            <a href="#" title=""><img width="200" height="160" alt="" src="../img/accesorios/audiacc.jpg" /><span style="text-decoration:none;">El título o leyenda</span></a>
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