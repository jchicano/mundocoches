<?php
require_once("Conexion.php");
require_once("Usuario.php");

//Recogemos los datos del JSON que nos han pasado
if(isset($_GET['contrasena']) || isset($_POST['contrasena'])){
    $contrasenaIntroducida = true;
}
else $contrasenaIntroducida = false;

$id=isset($_GET['id'])?$_GET['id']:$_POST['id'];
$email=isset($_GET['email'])?$_GET['email']:$_POST['email'];
$nombre=isset($_GET['nombre'])?$_GET['nombre']:$_POST['nombre'];
$primerApellido=isset($_GET['primerApellido'])?$_GET['primerApellido']:$_POST['primerApellido'];
$segundoApellido=isset($_GET['segundoApellido'])?$_GET['segundoApellido']:$_POST['segundoApellido'];
$fechaNacimiento=isset($_GET['fechaNacimiento'])?$_GET['fechaNacimiento']:$_POST['fechaNacimiento'];
$pais=isset($_GET['pais'])?$_GET['pais']:$_POST['pais'];
$codigoPostal=isset($_GET['codigoPostal'])?$_GET['codigoPostal']:$_POST['codigoPostal'];
$telefono=isset($_GET['telefono'])?$_GET['telefono']:$_POST['telefono'];
$rol=isset($_GET['rol'])?$_GET['rol']:$_POST['rol'];
if($contrasenaIntroducida)
$contrasena=isset($_GET['contrasena'])?$_GET['contrasena']:$_POST['contrasena'];


//$datosUsuario = json_decode($datosUsuario);

/*$jsondata['id'] = $id;
$jsondata['email'] = $email;
$jsondata['nombre'] = $nombre;
$jsondata['primerApellido'] = $primerApellido;
$jsondata['segundoApellido'] = $segundoApellido;
$jsondata['fechaNacimiento'] = $fechaNacimiento;
$jsondata['codigoPostal'] = $codigoPostal;
$jsondata['rol'] = $rol;
if($contrasenaIntroducida)
    $jsondata['contrasena'] = $contrasena;

echo json_encode($jsondata);*/

//Creamos la conexión a la BD
$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada

if($contrasenaIntroducida){
    $contrasena = md5($contrasena);
    $sql = "UPDATE usuario
            SET email='$email', pass='$contrasena', nombre='$nombre', apellido1='$primerApellido', apellido2='$segundoApellido', fecha_nac='$fechaNacimiento', pais='$pais', cod_postal='$codigoPostal', telefono='$telefono', rol='$rol'
            WHERE id=$id";
}
else{
    $sql = "UPDATE usuario
            SET email='$email', nombre='$nombre', apellido1='$primerApellido', apellido2='$segundoApellido', fecha_nac='$fechaNacimiento', pais='$pais', cod_postal='$codigoPostal', telefono='$telefono', rol='$rol'
            WHERE id=$id";
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