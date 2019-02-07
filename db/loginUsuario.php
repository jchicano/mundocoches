<?php

require_once("Conexion.php");
require_once("Usuario.php");

// Cuando el usuario le de al botón de 'Iniciar sesión'
if(isset($_REQUEST["botonLogin"])){
    
    // Recogemos los datos del formulario
    $email = $_POST["emailInput"];
    $password = $_POST["passwordInput"];
    $password = md5($password);

    //Creamos la conexión a la BD
    $con = new Conexion();
    $con->set_charset("utf8"); //Establecemos la codificacion adecuada

    // Ejecutamos la consulta
    $sql = "SELECT id, nombre, rol FROM usuario
        WHERE email='$email' && pass='$password'";
    $resultado = $con->query($sql);


    if($con->affected_rows){ //Devuelve 0 o un numeros
        $fila = $resultado->fetch_object();

        // Creación de variables de sesión
        $_SESSION["idUser"] = $fila->id;
        $_SESSION["nombreUser"] = $fila->nombre;
        $_SESSION["rolUser"] = $fila->rol;
        
        $con->close();
    }
    else{
        //$message = "Email o contraseña errónea";
        //echo "<script type='text/javascript'>alert('$message');</script>";

        $show_modal = true; // Activamos el modal
        $con->close();
    }

}

?>