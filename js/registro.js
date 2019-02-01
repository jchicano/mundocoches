(function ($) {

    $(document).ready(function(){
        document
            .getElementById('inputPassword')
            .addEventListener('input', function(evt) {
                const campo = evt.target,
                    valido = document.getElementById('campoOK'),
                    
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
    });


})(jQuery); 


