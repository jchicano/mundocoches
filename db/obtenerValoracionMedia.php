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
        WHERE id_contenido=$idArticuloActual"; 
$resultado = $con->query($sql);
$total = 0;
$contador = 0;
if($con->affected_rows){ //Devuelve 0 o un numero
    while($fila = $resultado->fetch_object()){
        $contador++;
        $total += $fila->nota;
    }
    $notaMedia = $total / $contador; //Calculamos la media
    echo round($notaMedia); //Devolvemos la nota media redondeada
}
else{
    echo 0;
}

$con->close();
