<?php

require_once("../db/Conexion.php");
require_once("../db/Contenido.php");

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


$str = substr($url, -16); //eliminamos la primera parte de la ruta
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

<!--Resto de scripts-->
<?php include("../includes/navigation.php"); ?>

<?php include("../includes/gallery-script.php");?>

<?php include("../includes/footer.php");?>

<?php include("../includes/body-tag-contents.php");?>

</body>
</html>

