<?php

require_once ('Conexion.php');
require_once ('Usuario.php');

$con = new Conexion();
$sql = "SELECT * FROM usuario";
$resultado = $con->query($sql);
if($con->affected_rows){ //Devuelve 0 o un numero
    while($fila = $resultado->fetch_object()){
        $u = new Usuario($fila->id, $fila->email, $fila->pass, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->fecha_nac, $fila->pais, $fila->cod_postal, $fila->telefono, $fila->rol); //Nombre de las columnas de la tabla
        $usuarios[] = clone($u); //Array de objetos de la clase Juegos
    }
    $con->close();
    //return $usuarios;
}
//$con->close();
//return FALSE;

foreach ($usuarios as $usuario) {
    echo $usuario->id + "<br>";
    echo $usuario->email + "<br>";
    echo $usuario->pass + "<br>";
    echo $usuario->nombre + "<br>";
    echo $usuario->apellido1 + "<br>";
    echo $usuario->apellido1 + "<br>";
    echo $usuario->fecha_nac + "<br>";
    echo $usuario->pais + "<br>";
    echo $usuario->cod_postal + "<br>";
    echo $usuario->telefono + "<br>";
    echo $usuario->rol + "<br>";
}
