(function($) {
    $(document).ready(function(){

        

        

    //INICIALIZAMOS EL EDITOR WYSIWYG
    //Modificamos la barra de tareas
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        [{ 'align': [] }],
        ['blockquote', /*'code-block'*/],

        //[{ 'header': 1 }, { 'header': 2 }],               // custom button values
        ['clean'],                                         // remove formatting button
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        //[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        //[{ 'direction': 'rtl' }],                         // text direction

        //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        //[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

        [{ 'color': [] }, { 'background': [] }]          // dropdown with defaults from theme
        //[{ 'font': [] }],
    ];

    var quill = new Quill('#editor', {
        modules: {
        toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    function quillGetHTML(inputDelta) {
        var tempCont = document.createElement("div");
        (new Quill(tempCont)).setContents(inputDelta);
        return tempCont.getElementsByClassName("ql-editor")[0].innerHTML;
    }

    function mostrarCuadro(datos){
        alert(datos);
    }

    function procesarDatosComentario(datosRespuesta){ //MEOLLO
        console.log("datos: "+datosRespuesta);
        if(datosRespuesta == 0){ //Si no ha habido inserción en la BD
            console.log("mal");
            msg = "Primero debes valorar el artículo."
            responseMessage(msg)
        }
        else{
            console.log("bien");
            msg = "Comentario agregado correctamente."
            responseMessage(msg)
        }
        //alert();
    }


    //Funcion para guardar el comentario introducido por el usuario
        $('#btnEnviar').on("click", function(){
        
        var deltaContent = quill.getContents();
        var htmlText = quillGetHTML(deltaContent);
        
        console.log("dentro");
        var datos={comentario : htmlText};
        $.getJSON('../db/guardarComentario.php',datos,procesarDatosComentario);
        
        //
        //mostrarCuadro();
        });
    });
})(jQuery);