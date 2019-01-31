<?php
require_once("Conexion.php");
require_once("Usuario.php");

//recogemos el id que nos han pasado como data en Ajax
$id=isset($_GET['idUsuario'])?$_GET['idUsuario']:$_POST['idUsuario'];

//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

$sql = "DELETE FROM usuario
        WHERE id=$id";
$resultado = $con->query($sql);

if($con->affected_rows){ //Devuelve 0 o un numero
    $jsondata['correcto'] = true;
    echo json_encode($jsondata);
    $con->close();
}
else{
    $jsondata['correcto'] = false;
    echo json_encode($jsondata);
    $con->close();
}
//$jsondata['id'] = $id;
//echo json_encode($jsondata);