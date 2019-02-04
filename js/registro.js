(function ($) {

    $(document).ready(function(){
        // === Comprobación de la contraseña ===
        document
            .getElementById('inputPassword')
            .addEventListener('input', function(evt) {
                const campo = evt.target,
                    valido = document.getElementById('campoOKpass'),
                    
                    // Expresión regular que debe de cumplir la contraseña
                    regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[$%&€@!]/;

                //Se muestra un texto válido/no válido a modo de ejemplo
                if (regex.test(campo.value) && campo.value.length >= 6) {
                    $("#btnregistrarse").removeAttr("disabled");
                    $('#inputPassword').removeClass("red-border");
                    $("#inputPassword").addClass("green-border");
                    valido.innerText = "Contraseña válida";
                    //console.log("Estoy en el if");
                } else {
                    $("#btnregistrarse").attr("disabled", "disabled");
                    $('#inputPassword').removeClass("green-border");
                    $("#inputPassword").addClass("red-border");
                    valido.innerText = "Contraseña no válida";
                    //console.log("Estoy en el else");
                }
            });

            // === Comprobación del email ===

            //Compruebo que el correo no exista en la BD al quitar el foco del input
            $("#inputEmail").on("blur change",function(){
                //console.log("Quitado el foco en email"+$(this).val());
                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                    data: {email: $(this).val()}, //Le paso el contenido del input
                    //Cambiar a type: POST si necesario
                    type: "POST",
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: "../db/comprobarEmailUsuario.php",
                })
                .done(function(data) {
                    //alert("Correcto: "+data.correcto);
                    if(data.existe){
                        //Señalar que email ya existe
                        $("#btnregistrarse").attr("disabled", "disabled");
                        $("#inputEmail").addClass("red-border");
                        $("campoOKemail").html("Ya hay un usuario con este email");
                        console.log("Estoy despues de lo que ya sabes");
                    }
                    else{
                        $("#btnregistrarse").removeAttr("disabled");
                        $("#inputEmail").removeClass("red-border");
                    }
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                });
            });


    });

    


})(jQuery); 


