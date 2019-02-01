(function ($) {

    $(document).ready(function(){
        document
            .getElementById('inputPassword')
            .addEventListener('input', function(evt) {
                const campo = evt.target,
                    valido = document.getElementById('campoOK'),
                    
                    regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[$%&€@!]/;

                //Se muestra un texto válido/inválido a modo de ejemplo
                if (regex.test(campo.value)) {
                    $("#btnregistrarse").removeAttr("disabled");
                    $("#inputPassword").addClass("green-border");
                    valido.innerText = "Contraseña válida";
                    console.log("Estoy en el if");
                } else {
                    $("#btnregistrarse").attr("disabled", "disabled");
                    $("#inputPassword").addClass("red-border");
                    valido.innerText = "Contraseña no válida";
                    console.log("Estoy en el else");
                }
            });
    });


})(jQuery); 


