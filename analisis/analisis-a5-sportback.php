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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <?php include("../includes/head-tag-contents.php"); ?>
  <link rel="stylesheet" href="../css/analisis/<?php echo $str ?>.css">

  <link rel="stylesheet" href="../css/analisis/galeria-imagenes.css">

  <!--Para la valoracion-->
  <link rel="stylesheet" href="../css/rating-stars.css">
  <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
  <!--Script para inicializar la valoracion-->
  <script src="../js/rating-stars.js"></script>

  <!--Hoja de estilos de Quill-->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  

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
<!--Autor y valoracion del articulo-->
<div class="container">
  <section id="scroll" class="projects-section bg-light reducirMargenSuperior">
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
      <hr class="my-4 w-100">
      <div class="col-lg-4">
      </div>
      <div class="col-lg-4">
        <h5>Tu nota</h5>
      </div>
      <div class="col-lg-4">
        <h5>Nota media</h5>
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
      <div class="col-lg-4">
        <span class="h5">Autor: </span><span id="test" class="h6"><?php echo $u->nombre ?></span>
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
      <!--Valoración media-->
      <div class="col-lg-4">
        <div class='rating-stars text-center'>
          <ul id='starsMedia'>
            <li id="media1" class='star' data-value='1'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li id="media2" class='star' data-value='2'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li id="media3" class='star' data-value='3'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li id="media4" class='star' data-value='4'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li id="media5" class='star' data-value='5'>
              <i class='fa fa-star fa-fw'></i>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-justify">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-6">
        <div id="editor"></div>
        <div class="text-center">
          <button style="margin-top: 5px" class="btn btn-primary text-center" id="btnEnviar">Enviar</button>
        </div>
      </div>
      <div class="col-lg-3">
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
    
    <div class="row justify-content-left no-gutters mb-5 mb-lg-0 text-justify">
      <h5>Comentarios:</h5>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-justify">
      <div class="col-lg-12">
        <!--//TODO añadir lista de comentarios con PHP, el que envie el usuario se mostrara en la siguiente recarga-->
        <!--
        Para la valoracion:
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span> 3 Estrellas

        -->
      </div>
    </div>
    Enlaces de prueba
    <a href="../db/guardarValoracion.php?id=1&nota=5">guardarValoracionPrueba</a>
    <br>
    <a href="../db/guardarComentario.php?id=1&comentario=Comentario%20de%20prueba%20en%20la%20URL">guardarComentarioPrueba</a>
    <br>
    <a href="../db/obtenerValoracion.php">obtenerValoracionPrueba</a>
    <br>
    <a href="../db/obtenerValoracionMedia.php">obtenerValoracionMediaPrueba</a>
    <br>
  </section>
</div>


<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  //Modificamos la barra de tareas
  var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  [{ 'align': [] }],
  ['blockquote', /*'code-block'*/],

  //[{ 'header': 1 }, { 'header': 2 }],               // custom button values
  ['clean'],                                         // remove formatting button
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  //[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  //[{ 'direction': 'rtl' }],                         // text direction

  //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  //[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }]          // dropdown with defaults from theme
  //[{ 'font': [] }],
];

var quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});



function quillGetHTML(inputDelta) {
    var tempCont = document.createElement("div");
    (new Quill(tempCont)).setContents(inputDelta);
    return tempCont.getElementsByClassName("ql-editor")[0].innerHTML;
}

$("#btnEnviar").on("click", function(){
  var deltaContent = quill.getContents();
  var htmlText = quillGetHTML(deltaContent);
  alert(htmlText);
});


</script>


<!--Resto de scripts-->
<?php include("../includes/navigation.php"); ?>

<?php include("../includes/gallery-script.php");?>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>
</html>

