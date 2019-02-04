<?php
require_once("Conexion.php");
require_once("Usuario.php");

//Recogemos los datos del JSON que nos han pasado
if(isset($_GET['segundoApellido']) || isset($_POST['segundoApellido'])){
    $segundoApellidoIntroducido = true;
}
else $segundoApellidoIntroducido = false;

$email=isset($_GET['email'])?$_GET['email']:$_POST['email'];
$contrasena=isset($_GET['contrasena'])?$_GET['contrasena']:$_POST['contrasena'];
$nombre=isset($_GET['nombre'])?$_GET['nombre']:$_POST['nombre'];
$primerApellido=isset($_GET['primerApellido'])?$_GET['primerApellido']:$_POST['primerApellido'];
$fechaNacimiento=isset($_GET['fechaNacimiento'])?$_GET['fechaNacimiento']:$_POST['fechaNacimiento'];
$pais=isset($_GET['pais'])?$_GET['pais']:$_POST['pais'];
$codigoPostal=isset($_GET['codigoPostal'])?$_GET['codigoPostal']:$_POST['codigoPostal'];
$telefono=isset($_GET['telefono'])?$_GET['telefono']:$_POST['telefono'];
$rol=isset($_GET['rol'])?$_GET['rol']:$_POST['rol'];
if($segundoApellidoIntroducido)
    $segundoApellido=isset($_GET['segundoApellido'])?$_GET['segundoApellido']:$_POST['segundoApellido'];


//$json = isset($_GET['email'])?$_GET['email']:$_POST['email'];
/*$contrasena = "123";
$nombre = "123";
$primerApellido = "123";
$segundoApellido = "123";
$fechaNacimiento = "123";
$pais = "123";
$codigoPostal = "123";
$telefono = "123";
$rol=0;*/

//echo json_decode($json);

$contrasena = md5($contrasena);

//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

if($segundoApellidoIntroducido){
    $sql = "INSERT INTO usuario (email, pass, nombre, apellido1, apellido2, fecha_nac, pais, cod_postal, telefono, rol)
            VALUES ('$email', '$contrasena', '$nombre', '$primerApellido', '$segundoApellido', '$fechaNacimiento', '$pais', '$codigoPostal', '$telefono', '$rol')";
}
else{
    $sql = "INSERT INTO usuario (email, pass, nombre, apellido1, fecha_nac, pais, cod_postal, telefono, rol)
            VALUES ('$email', '$contrasena', '$nombre', '$primerApellido', '$fechaNacimiento', '$pais', '$codigoPostal', '$telefono', '$rol')";
}

$resultado = $con->query($sql);
if($con->errno == 0){ //Si no han habido errores al ejecutar la consulta
    $jsondata['correcto'] = true;
    echo json_encode($jsondata);
    $con->close();
}
else{
    $jsondata['correcto'] = false;
    echo json_encode($jsondata);
    $con->close();
}