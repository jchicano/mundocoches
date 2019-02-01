<?php
require_once("Conexion.php");
require_once("Usuario.php");

//recogemos el id que hemos introducido en el formulario
//$id=isset($_GET['id'])?$_GET['id']:$_POST['id'];
//$id=1;

//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

$sql = "SELECT * FROM usuario";
$resultado = $con->query($sql);


if($con->affected_rows){ //Devuelve 0 o un numero
    while($fila = $resultado->fetch_assoc()){
        $usuarios[] = $fila; //Nombre de las columnas de la tabla
    }
    //print_r($usuarios);
    $jsondata['usuarios'] = $usuarios;
    echo json_encode($jsondata);
    //echo json_decode($json_encode($jsondata));


    $con->close();
}
else $con->close();

