<?php
require_once("Conexion.php");
require_once("Usuario.php");
require_once("Contenido.php");

session_start();

//Guardamos el id de usuario logueado
$idUsuario = isset($_GET['id'])?$_GET['id']:$_POST['id'];
if(!isset($_SESSION['idUser'])){
    echo 0;
    die;
}
else $idUsuario = $_SESSION['idUser']; //PRODUCCION_OLD esta puesto id usuario fijo

//Guardamos la URL de la pagina anterior, para saber a que analisis nos referimos
$urlPaginaAnteriorIncorrecta = $_SERVER['HTTP_REFERER'];
$stringInicial = "http://localhost:8080"; //String que queremos eliminar de la URL //PRODUCCION cambiar esta URL por la del dominio
if(substr($urlPaginaAnteriorIncorrecta, 0, strlen($stringInicial)) === $stringInicial) //Calculamos la longitud de ese string y lo restamos
    $urlPaginaAnteriorCorrecta = substr($urlPaginaAnteriorIncorrecta, strlen($stringInicial));

//Guardamos la nota que ha puesto el usuario
$nota = isset($_GET['nota'])?$_GET['nota']:$_POST['nota'];

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
$sql = "INSERT INTO valoracion (id_usuario, id_contenido, nota, comentario)
        VALUES ($idUsuario, $idArticuloActual, $nota, 'Prueba1')"; 
$resultado = $con->query($sql);

if($con->affected_rows && $con->errno == 0){
    echo 1;
}
else { //Entraría aquí si se produce el error 1602 para las claves duplicadas porque ya hay un registro con el id de usuario y de articulo
    $sql = "UPDATE valoracion
    SET nota = $nota
    WHERE id_usuario=$idUsuario && id_contenido=$idArticuloActual";
    $resultado = $con->query($sql);
    if($con->affected_rows && $con->errno == 0){ //Devuelve 0 o un numero
        echo 1;
    }
    else{
        echo 0;
    }
}
$con->close();
