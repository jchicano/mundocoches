// Jquery wrapper for drupal to avoid conflicts between libraries.
(function ($) {
    // Jquery onload function.
    $(document).ready(function(){
      // Your JS code.

      $.ajax({
        // En data puedes utilizar un objeto JSON, un array o un query string
        data: null,
        //Cambiar a type: POST si necesario
        type: "GET",
        // Formato de datos que se espera en la respuesta
        dataType: "json",
        // URL a la que se enviará la solicitud Ajax
        url: "../db/obtenerUsuariosJSON.php",
    })
    .done(function(data) {
        $.each(data.usuarios, function (key, value) {
            var idEditar = "editar"+value.id;
            var idBorrar = "borrar"+value.id;
            
            let cuerpoTabla = $("#cuerpoTabla");
            cuerpoTabla.append("<tr>");
            cuerpoTabla.append("<th scope='row'>"+value.id+"</th>");
            cuerpoTabla.append("<td>"+value.email+"</td>");
            cuerpoTabla.append("<td>"+value.nombre+"</td>");
            cuerpoTabla.append("<td>"+value.apellido1+"</td>");
            cuerpoTabla.append("<td>"+value.pais+"</td>");

            if(value.rol == "1"){
                var rol = "<span class='status text-danger'>&bull;</span> Admin";
            }
            else if(value.rol == "2"){
                var rol = "<span class='status text-warning'>&bull;</span> Editor";
            }
            else if(value.rol == "3"){
                var rol = "<span class='status text-success'>&bull;</span> Valorador";
            }
            else var rol = "<span class='status text-muted'>&bull;</span> Visitante";

            cuerpoTabla.append("<td>"+rol+"</td>");
            cuerpoTabla.append("<td><span id='"+idEditar+"' class='view' title='Editar usuario' data-toggle='tooltip'><i class='fas fa-user-edit'></i></span>&nbsp;<span id='"+idBorrar+"'  class='view' title='Borrar usuario' data-toggle='tooltip'><i class='fas fa-trash'></i></span></td>");
            cuerpoTabla.append("</tr>");
            //alert(value.id);

            //Inicializamos el tooltip en los nuevos elementos dinamicos
            $("#"+idEditar).tooltip();
            $("#"+idBorrar).tooltip();

            //Añado un listener de click a cada icono para saber a que usuario nos referimos
            $("#"+idEditar).on("click",function(){
                console.log("click en editar: "+idEditar)
            });
            $("#"+idBorrar).on("click",function(){
                console.log("click en borrar: "+idBorrar)
            });
        });
        $("#cantidadResultados").text(data.cantidadResultados);
        
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown);
    });

    //Inicializamos el tooltip
    $('[data-toggle="tooltip"]').tooltip();
    });
})(jQuery); 