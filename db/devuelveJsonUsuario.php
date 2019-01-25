<?php
require_once("Conexion.php");
require_once("Usuario.php");

//recogemos el id que hemos introducido en el formulario
$id=isset($_GET['id'])?$_GET['id']:$_POST['id'];

//crear conexión a la bd
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada
$sql = "SELECT * FROM usuario WHERE id=".$id;
$resultado = $con->query($sql);


if($con->affected_rows){ //Devuelve 0 o un numero
    $fila = $resultado->fetch_object();
    $usuario = new Usuario($fila->id, $fila->email, $fila->pass, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->fecha_nac, $fila->pais, $fila->cod_postal, $fila->telefono, $fila->rol); //Nombre de las columnas de la tabla

    $json = json_encode((array)$usuario);

    
    $jsonFalso = '{"id": "'.$usuario->id.'",
                    "email": "'.$usuario->email.'",
                    "pass": "'.$usuario->pass.'",
                    "nombre": "'.$usuario->nombre.'",
                    "apellido1": "'.$usuario->apellido1.'",
                    "apellido2": "'.$usuario->apellido2.'",
                    "fecha_nac": "'.$usuario->fecha_nac.'",
                    "pais": "'.$usuario->pais.'",
                    "cod_postal": "'.$usuario->cod_postal.'",
                    "telefono": "'.$usuario->telefono.'",
                    "rol": "'.$usuario->rol.'"}';

    //echo get_object_vars($json);
    
    echo $jsonFalso;
    //echo $usuario->nombre;
}
$con->close();

