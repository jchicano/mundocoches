<?php include("../includes/a_config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../includes/head-tag-contents.php");?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!----------------SCRIPTS PARA SUMMERNOTE CON BOOTSTRAP (NO BORRAR LOS DE BOOTSTRAP PORQUE PETA)--------------------->
    <!-- Stuff necessary for summernote -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>
    <script src="summernote-es-ES.js"></script>

    <!--Script para inicializar Summernote-->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [ //Personalizamos la barra de herramientas
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['Segoe UI']],
                    //['fontsize', ['fontsize',16]],
                    ['color', ['color']],
                    ['para', ['ul', 'ol']],
                    ['history', ['undo', 'redo']]
                ],
                    lang: 'es-ES', // Traducimos el hover de la barra de herramientas
                    fontname: 'Segoe UI', // Establecemos la fuente de la guia de estilos
                    disableDragAndDrop: true, // Deshabilitamos el Drag & Drop
                    placeholder: 'Comienza a escribir...' // Custom placeholder
            });
            //$('#summernote').summernote('justifyFull'); // Justificamos todo por defecto


            function limpiar(){
                $('#summernote').summernote('code','');
            }

            //Para obtener el codigo HTML
            //$('#summernote').summernote('code');
            

            function obtenerCodigo(){
                let codigo = $('#summernote').summernote('code');
                alert(codigo);
            }

            $('#boton').on("click",limpiar);
            $('#boton2').on("click",obtenerCodigo);

        });
    </script>

    <!--Para la valoracion-->
    <link rel="stylesheet" href="rating-stars.css">
    <link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'>
    <!--Script para inicializar la valoracion-->
    <script src="rating-stars.js"></script>
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

<div class="container">
<div class="row">
<div class="col-lg-12">
<form method="post">
  <textarea id="summernote" name="editordata" cols="30" rows="100"></textarea>
</form>
</div>
</div>
</div>
<button class="btn btn-primary" id="boton">Limpiar</button>
<button class="btn btn-primary" id="boton2">Obtener HTML</button>
<br><br><br>

<br><br><br><br><br>

<section class='rating-widget'>
  <!-- Rating Stars Box -->
  <div class='rating-stars text-center'>
    <ul id='stars'>
      <li class='star' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
    </ul>
  </div>
  
  <div class='success-box' style="display:none">
    <div class='clearfix'></div>
    <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
    <div class='text-message'></div>
    <div class='clearfix'></div>
  </div>
</section>


    

</body>
</html>
