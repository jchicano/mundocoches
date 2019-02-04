<?php

require_once("db/Conexion.php");

// Booleano para mostrar el modal cuando se registra el usuario
$show_modal = false;

// Conexión a la BBDD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

if(isset($_REQUEST["registrarse"])){
    // Guardamos los datos del registro en variables
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];
    $password = md5($password);
    $name = $_POST["inputName"];
    $surname1 = $_POST["inputSurname1"];
    $surname2 = $_POST["inputSurname2"];
    $date = $_POST["inputDate"];
    $country = $_POST["inputCountry"];
    $zipcode = $_POST["inputZipcode"];
    $mobile = $_POST["inputMobile"];

    $sql = "INSERT INTO usuario (email, pass, nombre, apellido1, apellido2, fecha_nac, pais, cod_postal, telefono, rol)
    VALUES ('$email', '$password', '$name', '$surname1', '$surname2', '$date', '$country', '$zipcode', '$mobile', 0)";
    $con->query($sql);
    
    // Comprobación de que el insert se ha ejecutado correctamente y muestre el modal para 
    // informarle al usuario de que se ha registrado correctamente
    if($con->errno == 0){
        $show_modal = true;

    } else {
        $show_modal = false;
    }

    $con->close();

}

?>