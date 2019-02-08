// Jquery wrapper for drupal to avoid conflicts between libraries.
(function ($) {
    // Jquery onload function.
    $(document).ready(function(){
      // Your JS code.
        $("#botonLogin").on("click", function(){
            var jsonDatos = `{
                                "email" : "`+$("#emailInput").val()+`",
                                "password" : "`+$("#passwordInput").val()+`"
                            }`;
            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
                data: JSON.parse(jsonDatos),
                //Cambiar a type: POST si necesario
                type: "POST",
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: "../db/loginUsuarioJSON.php",
            })
            .done(function(data) {
                //alert("Correcto: "+data.correcto);
                //console.log(data);
                if(data.correcto){
                    $("#loginCorrecto").attr("value", true);
                    //$("#modalComentarioMensaje").text("Usuario actualizado correctamente.");
                    //$("#modalComentario").modal();
                    $("#loginError").text(" "); // Elimina el mensaje de error si lo hubiera
                    //console.log(data.id);
                    $("#idUserLogin").text(data.id);
                    //console.log(data.nombre);
                    $("#nombreUserLogin").text(data.nombre);
                    //alert("Sesion ID: " + data.sesionid);
                    $("#rolUserLogin").text(data.rol);
                    //window.location.replace(window.location.href);
                }
                else{
                    $("#loginCorrecto").attr("value", false);
                    $("#loginError").text("Email o contraseña incorrecto");
                    console.log("ELSE - Email o contraseña incorrecto");
                }
                console.log(data); //undefined
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
        });
    });
})(jQuery); 