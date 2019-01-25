<?php

require_once("../db/Conexion.php");
require_once("../db/Contenido.php");
require_once("../db/Usuario.php");

//Guardamos la URL de la página actual
$url = $_SERVER["REQUEST_URI"];

//Conexion y consulta
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada
$sql = "SELECT *
        FROM contenido
        WHERE url='$url'";
$resultado = $con->query($sql);
if($con->affected_rows){ //Devuelve 0 o un numero
  while($fila = $resultado->fetch_object()){
      $c = new Contenido($fila->id, $fila->url, $fila->titulo, $fila->fecha_publicacion, $fila->id_usuario_autor, $fila->texto); //Nombre de las columnas de la tabla
  }
  $con->close();
}

$CURRENT_PAGE = "Analisis extendido";
$PAGE_TITLE = $c->titulo; //Sacado de la bd el titulo


$stringInicial = "/analisis/analisis-"; //String que queremos eliminar de la URL

if(substr($url, 0, strlen($stringInicial)) === $stringInicial) //Calculamos la longitud de ese string y lo restamos
    $str = substr($url, strlen($stringInicial));

$str = basename($str, ".php"); //eliminamos la extension del archivo

?>


<!DOCTYPE html>
<html>
<head>
  <?php include("../includes/head-tag-contents.php"); ?>
  <link rel="stylesheet" href="../css/analisis/<?php echo $str ?>.css">

  <link rel="stylesheet" href="../css/analisis/galeria-imagenes.css">

  <!--Para la valoracion-->
  <link rel="stylesheet" href="../css/rating-stars.css">
  <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
  <!--Script para inicializar la valoracion-->
  <script src="../js/rating-stars.js"></script>

  <!--Script de AJAX para guardar la valoracion-->
  <script></script>

</head>
<body>


<!--Texto de la pagina-->
<?php echo $c->texto; ?>


<!--Incluyo el autor del contenido-->
<?php
//Conexion y consulta
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada
$sql = "SELECT *
        FROM usuario,contenido
        WHERE contenido.id_usuario_autor=usuario.id";
$resultado = $con->query($sql);
if($con->affected_rows){ //Devuelve 0 o un numero
  while($fila = $resultado->fetch_object()){
      $u = new Usuario($fila->id, $fila->email, $fila->pass, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->fecha_nac, $fila->pais, $fila->cod_postal, $fila->telefono, $fila->rol); //Nombre de las columnas de la tabla
    }
  $con->close();
}
?>
<div class="container">
  <section id="scroll" class="projects-section bg-light reducirMargenSuperior">
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-justify">
      <hr class="my-4 w-100">
      <div class="col-lg-4">
        <h5>Autor: <?php echo $u->nombre ?></h5>
      </div>
      <div class="col-lg-4">
      <!-- Rating Stars Box -->
      <div class='rating-stars text-center'>
        <ul id='stars'>
          <li id="1" class='star' data-value='1'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li id="2" class='star' data-value='2'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li id="3" class='star' data-value='3'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li id="4" class='star' data-value='4'>
            <i class='fa fa-star fa-fw'></i>
          </li>
          <li id="5" class='star' data-value='5'>
            <i class='fa fa-star fa-fw'></i>
          </li>
        </ul>
      </div>
      
      
    </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
      <div class="col-lg-12">
        <div class='success-box' style="display:none">
          <div class='clearfix'></div>
          <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
          <div class='text-message'></div>
          <div class='clearfix'></div>
        </div>
      </div>
    </div>
    <a href="../db/guardarValoracion.php?id=1&nota=5">guardarValoracionPrueba</a>
    <br>
    <a href="../db/obtenerValoracion.php">obtenerValoracionPrueba</a>
    <br>
    <h6>Contenedor que indica:</h6>
    <div id="contenedor"></div>
  </section>
</div>


<!--Resto de scripts-->
<?php include("../includes/navigation.php"); ?>

<?php include("../includes/gallery-script.php");?>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>
</html>

