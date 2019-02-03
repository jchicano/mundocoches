<?php
require_once("Conexion.php");
require_once("Usuario.php");

//Recogemos el email que nos han pasado
$email=isset($_GET['email'])?$_GET['email']:$_POST['email'];

//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

$sql = "SELECT * FROM usuario
        WHERE email='$email'";
$resultado = $con->query($sql);

if($con->affected_rows){ //Devuelve 0 o un numero
    $fila = $resultado->fetch_object();
    $jsondata['existe'] = true;
    $jsondata['idUsuario'] = $fila->id;
    echo json_encode($jsondata);
    $con->close();
}
else{
    $jsondata['existe'] = false;
    echo json_encode($jsondata);
    $con->close();
}