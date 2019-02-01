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
                
                if(value.rol == "1"){
                    var rol = "<span style='white-space: nowrap;'><span class='status text-danger'>&bull;</span> Admin</span>";
                }
                else if(value.rol == "2"){
                    var rol = "<span style='white-space: nowrap;'><span class='status text-warning'>&bull;</span> Editor</span>";
                }
                else if(value.rol == "3"){
                    var rol = "<span style='white-space: nowrap;'><span class='status text-success'>&bull;</span> Valorador</span>";
                }
                else var rol = "<span style='white-space: nowrap;'><span class='status text-muted'>&bull;</span> Visitante</span>";

                let cuerpoTabla = $("#cuerpoTabla");
                cuerpoTabla.append("<tr>"+
                "<th scope='col'>"+value.id+"</th>"+
                "<td>"+value.email+"</td>"+
                "<td>"+value.nombre+"</td>"+
                "<td>"+value.apellido1+"</td>"+
                "<td>"+value.pais+"</td>"+
                "<td>"+rol+"</td>"+
                "<td><span id='"+idEditar+"' class='view' title='Editar usuario' data-toggle='tooltip'><i class='fas fa-user-edit'></i></span>&nbsp;<span id='"+idBorrar+"'  class='view delete' title='Borrar usuario' data-toggle='tooltip'><i class='fas fa-trash'></i></span></td>"+
                "</tr>");
                //alert(value.id);

                //Inicializamos el tooltip en los nuevos elementos dinamicos
                $("#"+idEditar).tooltip();
                $("#"+idBorrar).tooltip();

                //Añado un listener de click a cada icono para saber a que usuario nos referimos
                $("#"+idEditar).on("click",function(){
                    //console.log("click en editar: "+idEditar);
                    $(".segundaSeccion").show();
                    $("#cabeceraSegundaTabla").html('<b>Edición</b> del usuario ID: <span id="idUsuarioSeleccionado">'+idEditar.replace('editar','')+'</span>');
                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data: {idUsuario: idEditar.replace('editar','')},//Le paso un string con el id de usuario, he tenido que borrar el comienzo del id del elemento HTML
                        //Cambiar a type: POST si necesario
                        type: "POST",
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: "../db/obtenerUsuariosJSON.php",
                    })
                    .done(function(data) {
                        //TODO
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown);
                    });
                });
                ////////////////////////////////////////////////
                $("#"+idBorrar).on("click",function(){
                    //console.log("click en borrar: "+idBorrar);

                    //Elimino el globo del tooltip para que no se bugee
                    $(".tooltip-inner").remove();
                    $(".arrow").remove();
                    //Elminiamos el elemento HTML para que el usuario vea que se ha eliminado
                    $(this).parents("tr").remove();
                    
                    $.ajax({
                        // En data puedes utilizar un objeto JSON, un array o un query string
                        data: {idUsuario: idBorrar.replace('borrar','')}, //Le paso un string con el id de usuario, he tenido que borrar el comienzo del id del elemento HTML
                        //Cambiar a type: POST si necesario
                        type: "POST",
                        // Formato de datos que se espera en la respuesta
                        dataType: "json",
                        // URL a la que se enviará la solicitud Ajax
                        url: "../db/borrarUsuario.php",
                    })
                    .done(function(data) {
                        //alert("Correcto: "+data.correcto);
                        //Poner modal?
                        if(data.correcto){
                            console.log("Usuario borrado");
                            $("#cantidadResultados").text(parseInt($("#cantidadResultados").text())-1);
                            
                            //location.reload(true);
                        }
                        else{
                            console.log("Se ha producido un error al borrar el usuario");
                        }
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown);
                    });
                });
            });
            $("#cantidadResultados").text($('#mainTable >tbody >tr').length); //Contamos las filas de la tabla y actualizamos el numero
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        });

        $("#btnAnadirUsuario").on("click",function(){
            //console.log("click en Añadir Usuario");
            $(".segundaSeccion").show();
            $("#cabeceraSegundaTabla").html('<b>Añadir</b> un usuario');
        });

        //Inicializamos el tooltip
        $('[data-toggle="tooltip"]').tooltip();

        //Filtro para todas las columnas
        $("#filtroNombre").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#mainTable >tbody >tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                let contadorColumnasVisibles = 0;
                $("#mainTable >tbody >tr:not(:hidden)").each(function(){contadorColumnasVisibles++});
                $("#cantidadResultados").text(contadorColumnasVisibles);
            });
            
        });

        //Cuando carga la página escondo segunda tabla
        $(".segundaSeccion").hide();

        //Añado listener al boton de cerrar la segunda seccion
        $("#btnCerrarSegundaSeccion").on("click", function() {
            $(".segundaSeccion").hide();
        });

        //Compruebo que el correo no exista en la BD al quitar el foco del input
        $("#email").on("blur",function(){
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
                //Poner modal?
                if(data.existe){
                    //Señalar que email ya existe
                    $("#btnInsertarUsuario").attr("disabled", "disabled");
                    $("#email").addClass("red-border");
                }
                else{
                    $("#btnInsertarUsuario").removeAttr("disabled");
                    $("#email").removeClass("red-border");
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
        });


        //Función para filtrar los resultados de la tabla al levantar una tecla, no usada
        /*$("#filtroNombre").keyup(function() {
            $("#filtroPais").val("[España,Francia,Portual,Otro]").attr("selected");
            //$("#filtroPais select").val("[España,Francia,Portual,Otro]");
            var rex = new RegExp($(this).val(), 'i'); //Creamos una expresion regular
            // var $t = $(this).children(":eq(4))");
            $("#mainTable >tbody >tr").hide(); //Escondemos todas las filas

            //Recusively filter the jquery object to get results.
            $("#mainTable >tbody >tr").filter(function(i, v) {
                //Get the 3rd column object here which is userNamecolumn
                var $t = $(this).children(":eq(" + "1" + ")"); //Escogemos el número de columna por el que queremos ordenar, es la 2 porque queremos filtrar por Nombre. Comienza desde 0
                console.log($('#mainTable >tbody >tr').length);
                return rex.test($t.text());
            }).show(); //Mostramos las filas que cumplan el filtro
        });*/
    });
})(jQuery); 