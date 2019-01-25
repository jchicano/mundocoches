<?php
require_once("Conexion.php");
require_once("Contenido.php");

//Guardamos el id de usuario logueado
//$idUsuario = isset($_GET['id'])?$_GET['id']:$_POST['id'];
$idUsuario = 1; //PRODUCCION esta puesto id usuario fijo

//Guardamos la URL de la pagina anterior, para saber a que analisis nos referimos
$urlPaginaAnteriorIncorrecta = $_SERVER['HTTP_REFERER'];
$stringInicial = "http://localhost:8080"; //String que queremos eliminar de la URL //PRODUCCION cambiar esta URL por la del dominio
if(substr($urlPaginaAnteriorIncorrecta, 0, strlen($stringInicial)) === $stringInicial) //Calculamos la longitud de ese string y lo restamos
    $urlPaginaAnteriorCorrecta = substr($urlPaginaAnteriorIncorrecta, strlen($stringInicial));

//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada
$sql = "SELECT * FROM contenido where url='$urlPaginaAnteriorCorrecta'"; //Selecciono el id del articulo actual
$resultado = $con->query($sql);
if($con->affected_rows){ //Devuelve 0 o un numero
    $resultado = $con->query($sql);
    $fila = $resultado->fetch_object();
    $c = new Contenido($fila->id, $fila->url, $fila->titulo, $fila->fecha_publicacion, $fila->id_usuario_autor, $fila->texto); //Nombre de las columnas de la tabla
    $idArticuloActual = $c->id;
}
$sql = "SELECT nota
        FROM valoracion
        WHERE id_usuario=$idUsuario && id_contenido=$idArticuloActual"; 
$resultado = $con->query($sql);
$fila = $resultado->fetch_object();
$notaDelUsuario = $fila->nota;

if($con->affected_rows && $con->errno == 0){
    echo $notaDelUsuario;
    //echo '{"notaDelUsuario": "'.$notaDelUsuario.'"}';
}
else{
    echo 0;
}
$con->close();
