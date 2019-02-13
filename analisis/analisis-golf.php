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
}
$con->close();

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Script para inicializar la valoracion-->
  <script src="../js/rating-stars.js"></script>

  <!--Hoja de estilos de Quill-->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- Include the Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  
  <!--Estilos para la sección de comentarios-->
  <link rel="stylesheet" href="../css/comentario.css">
  <!--Script para la sección de comentarios-->
  <script src="../js/comentario.js"></script>

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
  <section id="scroll" class="projects-section bg-light reducirMargenSuperior" style="margin-bottom:-130px">
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
      <hr class="my-4 w-100">
      <div class="col-lg-4">
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
          <span class="h5">Autor:&nbsp;</span><span><?php echo $u->nombre ?></span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
          <div class="col-lg-12">
            <h5>Tu nota</h5>
          </div>
        </div>
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
          <div class="col-lg-12">
            <?php if(!isset($_SESSION['rolUser']) || $_SESSION['rolUser'] == "0"){ ?>
            <p class="text-muted">Asegúrate de haber iniciado sesión con una cuenta con un rol superior.</p>
            <?php }else{ ?>
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
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
          <div class="col-lg-12">
            <h5>Nota media</h5>
          </div>
        </div>
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
          <div class="col-lg-12">
            <!--Valoración media-->
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
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-center">
      <div class="col-lg-4">
        
      </div>
      <div class="col-lg-4">
        
        
      </div>
      <!--Valoración media-->
      <div class="col-lg-4">
        
      </div>
      <div class="col-lg-12">
        <div class='success-box' style="display:none">
          <div class='clearfix'></div>
          <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
          <div class='text-message'></div>
          <div class='clearfix'></div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-justify">
      <div class="col-lg-3">
      </div>
      <div class="col-lg-6">
        <div id="editor"></div>
        <div class="text-center">
          <button style="margin-top: 5px" class="btn btn-primary text-center" id="btnEnviar">Comentar</button>
        </div>
      </div>
      <div class="col-lg-3">
      </div>
    </div>
    <div class="row justify-content no-gutters mb-5 mb-lg-0 text-justify" style="margin-top: 150px; margin-bottom: 150px;">
      <hr class="my-4 w-100">
      <div class="col-lg-12" style="margin-bottom: 30px;">
        <span class="h3" style="margin-right: 25px;">Comentarios</span><span><a href="#cajaComentarios" id="enlaceMostrar" data-toggle="collapse">Mostrar</a></span>
      </div>
    </div>
    <div class="row justify-content-center no-gutters mb-5 mb-lg-0 text-justify">
      <div class="col-lg-12">
        <div id="cajaComentarios" class="collapse">
          <?php
          require_once("../db/Comentario.php");

          $con = new Conexion();
          $con->set_charset("utf8"); //Establecemos la codificacion adecuada
          $sql = "SELECT usuario.nombre, usuario.rol, valoracion.nota, valoracion.comentario
                  FROM valoracion,usuario
                  WHERE usuario.id=valoracion.id_usuario && valoracion.id_contenido=$c->id"; //PRODUCCION modificar con variable de sesion con el id del usuario 
          $resultado = $con->query($sql);
          if($con->affected_rows){ //Devuelve 0 o un numero
            while($fila = $resultado->fetch_object()){
              $comment = new Comentario($fila->nombre, $fila->rol, $fila->nota, $fila->comentario); //Nombre de las columnas de la tabla
              $comentarios[] = clone($comment); //Array de objetos de la clase Comentario
            }
          }
          
          //print_r($comentarios);
          if($con->affected_rows){
            $con->close();
            foreach ($comentarios as $key => $comentario) {
              if($comentario->rol_usuario == "1"){
                $rol = "Administrador";
              }
              else if($comentario->rol_usuario == "2"){
                $rol = "Editor";
              }
              else if($comentario->rol_usuario == "3"){
                $rol = "Valorador";
              }
              else{
                $rol = "Visitante";
              }
              echo "<div class='panel panel-white post panel-shadow'>";
              echo "<div class='post-heading'>";
              echo "<div class='pull-left meta'>";
              echo "<div class='title h5'>";
              echo "<b>$comentario->nombre_usuario</b> publicó un comentario.";
              echo "</div>";
              echo "<h6 class='text-muted time'>$rol</h6>";
              echo "</div>";
              echo "</div>";
              echo "<div style='padding: 0px 15px'>";
              //echo "<p>";
              
              for($i=1;$i<=(int)$comentario->nota_contenido;$i++){ //Imprimo la cantidad de estrellas coloreadas segun la nota
                echo "<span style='color:#FF912C;' class='fa fa-star'></span>";
              }
              for($i;$i<=5;$i++){ //Imprimo la cantidad de estrellas restantes por colorear
                echo "<span class='fa fa-star'></span>";
              }
  
              //echo "</p>";
              echo "</div>";
              echo "<div class='post-description'>";
              echo "<span>$comentario->comentario_contenido</span>";
              echo "</div>";
              echo "</div>";
            }
          }
          
          ?>
          <!--<div class="panel panel-white post panel-shadow">
            <div class="post-heading">
              <div class="pull-left meta">
                <div class="title h5">
                  <b>Ryan Haywood</b> publicó un comentario.
                </div>
                  <h6 class="text-muted time">Rol del usuario. Modificar clase Comentario</h6>
              </div>
              <div style="padding: 0px 15px">
                Estrellas
              </div>
            </div> 
            <div class="post-description">
              <p>Texto del comentario</p>
            </div>
          </div>-->
            
        </div>
      </div>
    </div>
    <!--Enlaces de prueba
    <a href="../db/guardarValoracion.php?id=1&nota=5">guardarValoracionPrueba</a>
    <br>
    <a href="../db/guardarComentario.php?id=1&comentario=Comentario%20de%20prueba%20en%20la%20URL">guardarComentarioPrueba</a>
    <br>
    <a href="../db/obtenerValoracion.php">obtenerValoracionPrueba</a>
    <br>
    <a href="../db/obtenerValoracionMedia.php">obtenerValoracionMediaPrueba</a>
    <br>-->
  </section>
  <section id="scroll" class="projects-section bg-light" style="margin-top: -200px;"></section>
</div>





  <!-- The Modal -->
  <div class="modal fade" id="modalComentario">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal body -->
        <div class="modal-body text-center">
          <span id="modalComentarioMensaje" class="h6"></span>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>



<!--Resto de scripts-->
<?php include("../includes/navigation.php"); ?>

<?php include("../includes/gallery-script.php");?>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>
</html>

