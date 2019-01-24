<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<!------------------------------------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
  </head>


<body>
    <?php
    
require_once ('Conexion.php');
require_once ('Usuario.php');

$con = new Conexion();
$con->set_charset("utf8"); //Establecemos la codificacion adecuada
$sql = "SELECT * FROM usuario";
$resultado = $con->query($sql);
if($con->affected_rows){ //Devuelve 0 o un numero
    while($fila = $resultado->fetch_object()){
        $u = new Usuario($fila->id, $fila->email, $fila->pass, $fila->nombre, $fila->apellido1, $fila->apellido2, $fila->fecha_nac, $fila->pais, $fila->cod_postal, $fila->telefono, $fila->rol); //Nombre de las columnas de la tabla
        $usuarios[] = clone($u); //Array de objetos de la clase Usuario
    }
    $con->close();
    //return $usuarios;
}
//$con->close();
//return FALSE;

foreach ($usuarios as $usuario) {
    echo $usuario->id . "<br>";
    echo $usuario->email . "<br>";
    echo $usuario->pass . "<br>";
    echo $usuario->nombre . "<br>";
    echo $usuario->apellido1 . "<br>";
    echo $usuario->apellido1 . "<br>";
    echo $usuario->fecha_nac . "<br>";
    echo $usuario->pais . "<br>";
    echo $usuario->cod_postal . "<br>";
    echo $usuario->telefono . "<br>";
    echo $usuario->rol . "<br>";
}

    ?>

<div class="row">
<div class="col-lg-12">
<form method="post">
  <textarea id="summernote" name="editordata"></textarea>
</form>
</div>
</div>
<button onclick="mostrar()">Mostrar</button>
<br><br><br>
<div id="cuadro" style="height:120px; width:210px; background-color: lightblue;"></div>




    <script>
    $('#summernote').summernote({
        toolbar: [ //Personalizamos la barra de herramientas
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['Segoe UI']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
        ]
    });
      $('#summernote').summernote('fontName', 'Segoe UI');

    function mostrar(){
        alert($('#summernote').summernote('code'));
    }

    </script>

</body>
</html>
