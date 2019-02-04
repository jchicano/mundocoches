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
                    $("#btnInsertarUsuario").removeAttr("disabled");
                    $("#email").removeClass("red-border");
                    $("#contrasena").val("");
                    $("#email").removeClass("red-border");
                    $("#email").removeClass("green-border");
                    $(".segundaSeccion").show();
                    $("#cabeceraSegundaTabla").html('<b>Edición</b> del usuario ID: <span id="idUsuarioSeleccionado">'+idEditar.replace('editar','')+'</span>');
                    ventanaActual = $("#cabeceraSegundaTabla").text();

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
                        //TODO problema: al insertarlo hacer un append tambien en la tabla?
                        //console.log(data.usuarios[0]); //Muestro el JSON
                        let usuario = data.usuarios[0];
                        $("#email[type=email]").val(usuario.email);
                        $("#contrasena").removeAttr("required");
                        $("#nombre").val(usuario.nombre);
                        $("#primerApellido").val(usuario.apellido1);
                        $("#segundoApellido").val(usuario.apellido2);
                        $("#fechaNacimiento").val(usuario.fecha_nac);
                        $("#pais").val(usuario.pais);
                        $("#codigoPostal").val(usuario.cod_postal);
                        $("#telefono").val(usuario.telefono);
                        $("#rol").val(usuario.rol);
                        $("#btnInsertarUsuario").text("actualizar usuario");

                        //Cuando se haga click en el boton de actualizar usuario
                        $("#btnInsertarUsuario").on("click",function(){
                            //TODO problema: al insertar hace un update del ultimo usuario, hay que meter todo lo de abajo en un IF
                            //TODO comprobar si el campo de la contraseña esta lleno o no y poner alguna bandera o algo
                            //Compruebo si el campo contraseña esta vacio y creo el objeto JSON dependiendo si tiene contenido o no
                            console.log("click en boton de abajo dentro de editar");
                            if($(this).text() == "actualizar usuario"){
                                console.log("actualizando usuario...");
                                if($("#contrasena").val() == ""){ // && ventanaActual == "Edición del Usuario ID: "+idEditar.replace('editar','') //TODO ultimo argumento añadido nuevo y no he comprobado que funcione correctamente
                                    var jsonDatos = `{
                                        "id" : "`+idEditar.replace('editar','')+`",
                                        "email" : "`+$("#email").val()+`",
                                        "nombre" : "`+$("#nombre").val()+`",
                                        "primerApellido": "`+$("#primerApellido").val()+`",
                                        "segundoApellido": "`+$("#segundoApellido").val()+`",
                                        "fechaNacimiento": "`+$("#fechaNacimiento").val()+`",
                                        "pais": "`+$("#pais").val()+`",
                                        "codigoPostal": "`+$("#codigoPostal").val()+`",
                                        "telefono": "`+$("#telefono").val()+`",
                                        "rol": "`+$("#rol").val()+`"
                                        }`;
                                }
                                else{
                                    var jsonDatos = `{
                                        "id" : "`+idEditar.replace('editar','')+`",
                                        "email" : "`+$("#email").val()+`",
                                        "contrasena" : "`+$("#contrasena").val()+`",
                                        "nombre" : "`+$("#nombre").val()+`",
                                        "primerApellido": "`+$("#primerApellido").val()+`",
                                        "segundoApellido": "`+$("#segundoApellido").val()+`",
                                        "fechaNacimiento": "`+$("#fechaNacimiento").val()+`",
                                        "pais": "`+$("#pais").val()+`",
                                        "codigoPostal": "`+$("#codigoPostal").val()+`",
                                        "telefono": "`+$("#telefono").val()+`",
                                        "rol": "`+$("#rol").val()+`"
                                        }`;
                                }
                                //console.log("JSON:");
                                //console.log(JSON.parse(jsonDatos));
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
                                })
                                .fail(function(jqXHR, textStatus, errorThrown) {
                                    console.log(errorThrown);
                                });
                            }
                            else if($(this).text() == "añadir usuario"){
                                console.log("añadiendo usuario...");
                                $('#formulario *').not("#segundoApellido").filter(':input').each(function(){ //Recorro todos los inputs del formulario excepto el segundo apellido
                                    //console.log($(this).attr("id"));
                                    if($(this).val() == ""){
                                        camposRellenos = false;
                                    }
                                    else{
                                        camposRellenos = true;
                                    }
                                    if($("#segundoApellido").val() == ""){ //Ignoro si esta relleno o no el segundo apellido
                                        camposRellenos = true;
                                    }
                                });
                                /*if($("#email").val()=="" || $("#contrasena").val()=="" || $("#nombre").val()=="" || $("#primerApellido").val()=="" || $("#fechaNacimiento").val()=="" || $("#pais").val()=="" || $("#codigoPostal").val()=="" || $("#telefono").val()=="" || $("#rol").val()=="" ){
                                    $("#btnInsertarUsuario").attr("disabled", "disabled");
                                }
                                else{
                                    $("#btnInsertarUsuario").removeAttr("disabled");
                                }*/
                                if(camposRellenos){
                                    console.log("campos rellenos y listos para insertar");
                                    $("#btnInsertarUsuario").removeAttr("disabled");
                                    if($("#segundoApellido").val() == ""){
                                        var jsonDatos = `{
                                            "id" : "`+idEditar.replace('editar','')+`",
                                            "email" : "`+$("#email").val()+`",
                                            "contrasena" : "`+$("#contrasena").val()+`",
                                            "nombre" : "`+$("#nombre").val()+`",
                                            "primerApellido": "`+$("#primerApellido").val()+`",
                                            "fechaNacimiento": "`+$("#fechaNacimiento").val()+`",
                                            "pais": "`+$("#pais").val()+`",
                                            "codigoPostal": "`+$("#codigoPostal").val()+`",
                                            "telefono": "`+$("#telefono").val()+`",
                                            "rol": "`+$("#rol").val()+`"
                                            }`;
                                    }
                                    else{
                                        var jsonDatos = `{
                                            "id" : "`+idEditar.replace('editar','')+`",
                                            "email" : "`+$("#email").val()+`",
                                            "contrasena" : "`+$("#contrasena").val()+`",
                                            "nombre" : "`+$("#nombre").val()+`",
                                            "primerApellido": "`+$("#primerApellido").val()+`",
                                            "segundoApellido": "`+$("#segundoApellido").val()+`",
                                            "fechaNacimiento": "`+$("#fechaNacimiento").val()+`",
                                            "pais": "`+$("#pais").val()+`",
                                            "codigoPostal": "`+$("#codigoPostal").val()+`",
                                            "telefono": "`+$("#telefono").val()+`",
                                            "rol": "`+$("#rol").val()+`"
                                            }`;
                                    }
                                    console.log("camposRellenos: "+camposRellenos);
                                    console.log("JSON de añadir:");
                                    console.log(JSON.parse(jsonDatos));
                                    $.ajax({
                                        // En data puedes utilizar un objeto JSON, un array o un query string
                                        data: JSON.parse(jsonDatos),
                                        //Cambiar a type: POST si necesario
                                        type: "POST",
                                        // Formato de datos que se espera en la respuesta
                                        dataType: "json",
                                        // URL a la que se enviará la solicitud Ajax
                                        url: "../db/insertarUsuario.php",
                                    })
                                    .done(function(data) {
                                        //alert("Correcto: "+data.correcto);
                                        //console.log(data);
                                        if(data.correcto){
                                            $("#modalComentarioMensaje").text("Usuario añadido correctamente.");
                                            $("#modalComentario").modal();
                                        }
                                        else{
                                            $("#modalComentarioMensaje").text("Se ha producido un error al añadir el usuario.");
                                            $("#modalComentario").modal();
                                        }
                                    })
                                    .fail(function(jqXHR, textStatus, errorThrown) {
                                        console.log(errorThrown);
                                    });
                                }
                                else{
                                    $("#btnInsertarUsuario").attr("disabled", "disabled");
                                    $("#modalComentarioMensaje").text("Rellena todos los campos correctamente.");
                                    $("#modalComentario").modal();
                                }
                                console.log("llega aqui");
                            }
                        });
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown);
                    });
                });
                ////////////////////////////////////////////////
                $("#"+idBorrar).on("click",function(){
                    //console.log("click en borrar: "+idBorrar);

                    //if(ventanaActual != "Añadir un usuario"){
                    $(".segundaSeccion").hide();
                    //}

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
                        if(data.correcto){
                            $("#modalComentarioMensaje").text("Usuario borrado correctamente.");
                            $("#modalComentario").modal();
                            $("#cantidadResultados").text(parseInt($("#cantidadResultados").text())-1);
                            
                            //location.reload(true);
                        }
                        else{
                            $("#modalComentarioMensaje").text("Se ha producido un error al borrar el usuario.");
                            $("#modalComentario").modal();
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

        //Cuando el usuario hace click en el boton de arriba de Añadir un usuario
        $("#btnAnadirUsuario").on("click",function(){
            //console.log("click en Añadir Usuario");
            $("#cabeceraSegundaTabla").html('<b>Añadir</b> un usuario');
            $("#email[type=email]").val("");
            $("#contrasena").attr("required", "required");
            $("#contrasena").val("");
            $("#nombre").val("");
            $("#primerApellido").val("");
            $("#segundoApellido").val("");
            $("#fechaNacimiento").val("");
            $("#pais").val("España");
            $("#codigoPostal").val("");
            $("#telefono").val("");
            $("#rol").val("0");
            $("#btnInsertarUsuario").text("añadir usuario");
            $("#btnInsertarUsuario").attr("disabled", "disabled");

            ventanaActual = $("#cabeceraSegundaTabla").text();

            $(".segundaSeccion").show();

            //Cuando se haga click en el boton de añadir usuario
            $("#btnInsertarUsuario").on("click",function(){
                //TODO problema: al insertar hace un update del ultimo usuario, hay que meter todo lo de abajo en un IF
                //TODO comprobar si el campo de la contraseña esta lleno o no y poner alguna bandera o algo
                //Compruebo si el campo contraseña esta vacio y creo el objeto JSON dependiendo si tiene contenido o no
                console.log("click en boton de abajo dentro de añadir");
                if($(this).text() == "añadir usuario"){ //CODIGO VIEJO MALO
                    console.log("añadiendo usuario...");
                    $('#formulario *').not("#segundoApellido, #btnInsertarUsuario").filter(':input').each(function(){ //Recorro todos los inputs del formulario excepto el segundo apellido y el propio boton de insertar
                        camposRellenos = true;
                        if($(this).val() == ""){
                            console.log($(this).attr("id")+ " esta vacio");
                            camposRellenos = false;
                        }
                    });
                    if(camposRellenos){
                        console.log("campos rellenos y listos para insertar");
                        $("#btnInsertarUsuario").removeAttr("disabled");
                        if($("#segundoApellido").val() == ""){
                            var jsonDatos = `{
                                "email" : "`+$("#email").val()+`",
                                "contrasena" : "`+$("#contrasena").val()+`",
                                "nombre" : "`+$("#nombre").val()+`",
                                "primerApellido": "`+$("#primerApellido").val()+`",
                                "fechaNacimiento": "`+$("#fechaNacimiento").val()+`",
                                "pais": "`+$("#pais").val()+`",
                                "codigoPostal": "`+$("#codigoPostal").val()+`",
                                "telefono": "`+$("#telefono").val()+`",
                                "rol": "`+$("#rol").val()+`"
                                }`;
                        }
                        else{
                            var jsonDatos = `{
                                "email" : "`+$("#email").val()+`",
                                "contrasena" : "`+$("#contrasena").val()+`",
                                "nombre" : "`+$("#nombre").val()+`",
                                "primerApellido": "`+$("#primerApellido").val()+`",
                                "segundoApellido": "`+$("#segundoApellido").val()+`",
                                "fechaNacimiento": "`+$("#fechaNacimiento").val()+`",
                                "pais": "`+$("#pais").val()+`",
                                "codigoPostal": "`+$("#codigoPostal").val()+`",
                                "telefono": "`+$("#telefono").val()+`",
                                "rol": "`+$("#rol").val()+`"
                                }`;
                        }
                        console.log("camposRellenos: "+camposRellenos);
                        console.log("JSON de añadir bueno:");
                        console.log(JSON.parse(jsonDatos));
                        $.ajax({ //TODO PETA AQUI
                            // En data puedes utilizar un objeto JSON, un array o un query string
                            data: JSON.parse(jsonDatos),
                            //data: {"email": "bonobo@mail.com"},
                            //Cambiar a type: POST si necesario
                            type: "POST",
                            // Formato de datos que se espera en la respuesta
                            dataType: "json",
                            // URL a la que se enviará la solicitud Ajax
                            url: "../db/insertarUsuario.php",
                        })
                        .done(function(data) {
                            //alert("Correcto: "+data.correcto);
                            //console.log(data);
                            if(data.correcto){
                                $("#modalComentarioMensaje").text("Usuario añadido correctamente.");
                                $("#modalComentario").modal();
                            }
                            else{
                                $("#modalComentarioMensaje").text("Se ha producido un error al añadir el usuario.");
                                $("#modalComentario").modal();
                            }
                            console.log(data);
                        })
                        .fail(function(jqXHR, textStatus, errorThrown) {
                            console.log(errorThrown);
                        });
                    }
                    else{
                        $("#btnInsertarUsuario").attr("disabled", "disabled");
                        $("#modalComentarioMensaje").text("Rellena todos los campos correctamente.");
                        $("#modalComentario").modal();
                    }
                }
            });
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
                /*$('input').blur(function(event) {
                    event.target.checkValidity();
                }).bind('invalid', function(event) {
                    setTimeout(function() { $(event.target).focus();}, 50);
                });
                if(data.existe && ventanaActual == "Añadir un usuario"){ //|| data.existe && 
                    //Señalar que email ya existe
                    $("#btnInsertarUsuario").attr("disabled", "disabled");
                    $("#email").addClass("red-border");
                }
                else{
                    $("#btnInsertarUsuario").removeAttr("disabled");
                    $("#email").removeClass("red-border");
                }
                */
                //console.log("data.existe: "+data.existe); //true si existe en la BD, por lo que no deja continuar
                //console.log("yaExisteElEmail: "+yaExisteElEmail);
                //console.log("data.idUsuario: "+data.idUsuario);
                //console.log("ventanaActual: "+ventanaActual.replace('Edición del usuario ID: ',''));
                if(data.existe && data.idUsuario != ventanaActual.replace('Edición del usuario ID: ','')){ //Compruebo si existe en la BD y no es del usuario que estamos editando
                    //console.log("existe en la BD y no es de este usuario");
                    $("#modalComentarioMensaje").text("Ya existe un usuario con ese email.");
                    $("#modalComentario").modal();
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
        })

        //Le pongo también que al quitar el foco del input del email compruebe la validez por HTML5
        $('#email').blur(function(event) {
            if(!event.target.checkValidity()){
                //console.log("email no valido");
                $("#modalComentarioMensaje").text("Introduce un email válido.");
                $("#modalComentario").modal();
                $("#btnInsertarUsuario").attr("disabled", "disabled");
                $("#email").addClass("red-border");
            }
        }).bind('invalid', function(event) { //Le volvemos a poner el foco al campo email
            //setTimeout(function() { $(event.target).focus();}, 50);
        });

        //Comprobación del campo contraseña
        $("#contrasena").on("keyup", function(event){
            // Expresión regular que debe de cumplir la contraseña
            var regex = /^(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ].*[$%&€@!]/;
            //Se muestra un texto válido/no válido a modo de ejemplo
            if (regex.test(event.target.value) && event.target.value.length >= 6) {
                $("#btnInsertarUsuario").removeAttr("disabled");
                $("#contrasena").removeClass("red-border");
                $("#contrasena").addClass("green-border");
                //console.log("Se cumple contraseña");
            }
            else {
                $("#btnInsertarUsuario").attr("disabled", "disabled");
                $('#contrasena').removeClass("green-border");
                $("#contrasena").addClass("red-border");
                //console.log("No se cumple contraseña");
            }
            //Si dejan el campo vacío significa que no van a cambiar la contraseña y por lo tanto no aplicamos ningun estilo
            if(event.target.value == ""){
                $("#btnInsertarUsuario").removeAttr("disabled");
                $("#contrasena").removeClass("red-border");
                $("#contrasena").removeClass("green-border");
            }
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