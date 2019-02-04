// Jquery wrapper for drupal to avoid conflicts between libraries.
(function ($) {
    // Jquery onload function.
    $(document).ready(function(){
      // Your JS code.
        $("#botonLogin").on("click", function(){
            var jsonDatos = `{
                                "email" : "`+$("#email").val()+`",
                                "contrasena" : "`+$("#contrasena").val()+`"
                            }`;
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: JSON.parse(jsonDatos),
                //Cambiar a type: POST si necesario
                type: "POST",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "../db/editarUsuario.php",
            })
            .done(function(data) {
                //alert("Correcto: "+data.correcto);
                //console.log(data);
                if(data.correcto){
                    $("#modalComentarioMensaje").text("Usuario actualizado correctamente.");
                    $("#modalComentario").modal();
                }
                else{
                    $("#modalComentarioMensaje").text("Se ha producido un error al actualizar el usuario.");
                    $("#modalComentario").modal();
                }
                console.log(data.existe); //undefined
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
        });
    });
})(jQuery); 