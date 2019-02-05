<?php
require_once("Conexion.php");
require_once("Usuario.php");

//recogemos el email y el password que nos han pasado como data en Ajax
$email=isset($_GET['email'])?$_GET['email']:$_POST['email'];
$password=isset($_GET['password'])?$_GET['password']:$_POST['password'];

//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

$sql = "SELECT id, nombre, rol FROM usuario
        WHERE email='$email' && pass='$password'";
$resultado = $con->query($sql);

if($con->affected_rows){ //Devuelve 0 o un numero
    $fila = $resultado->fetch_object();

    $jsondata['correcto'] = true;
    $jsondata['id'] = $fila->id;
    $jsondata['nombre'] = $fila->nombre;
    $jsondata['rol'] = $fila->rol;
    session_start();
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