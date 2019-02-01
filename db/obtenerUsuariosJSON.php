<?php
require_once("Conexion.php");
require_once("Usuario.php");

//Si hay parametro, recogemos el id que nos han pasado
//$id=isset($_GET['id'])?$_GET['id']:$_POST['id'];
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
else if(isset($_POST['id'])){
    $id=$_POST['id'];
}
else $id=null;


//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

if($id==null){
    $sql = "SELECT * FROM usuario";
    $resultado = $con->query($sql);
}
else{
    $sql = "SELECT * FROM usuario
            WHERE id=$id";
    $resultado = $con->query($sql);
}

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

