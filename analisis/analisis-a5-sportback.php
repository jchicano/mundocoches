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
      <div class="col-lg-12">
        <h5>Autor: <?php echo $u->nombre ?></h5>
      </div>
    </div>
  </section>
</div>


<!--Resto de scripts-->
<?php include("../includes/navigation.php"); ?>

<?php include("../includes/gallery-script.php");?>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>
</html>

