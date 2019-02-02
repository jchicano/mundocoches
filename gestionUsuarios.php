<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head-tag-contents.php");?>
    <link rel="stylesheet" href="css/gestionUsuarios.css">
    <script src="js/gestionUsuarios.js"></script>
</head>

<?php include("includes/navigation.php");?>
<!-- CONTENIDO -->

<body class="" id="page-top">
    <div class="container">
        <section id="projects" class="projects-section ">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2><b>Gestión</b> de usuarios</h2>
                        </div>
                        <div class="col-lg-8">
                            <button href="#" id="btnAnadirUsuario" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Añadir un usuario a la lista"><i class="fas fa-plus-circle"></i> <span>Añadir un usuario</span></button>
                            <!--<button href="#" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Refrescar la lista de usuarios"><i class="fas fa-sync-alt"></i> <span>Refrescar</span></button>-->
                        </div>
                    </div>
                </div>
                <!--Filtro-->
                <div class="table-filter">
                    <div class="row">
                        <!--<div class="col-lg-3">
                            <div class="show-entries">
                                <span>Mostrar</span>
                                <select class="form-control">
                                    <option>5</option>
                                    <option>10</option>
                                    <option>15</option>
                                    <option>20</option>
                                </select>
                                <span>filas</span>
                            </div>
                        </div>-->
                        <div class="col-lg-12">
                            <!--button type="button" class="btn btn-light"><i class="fa fa-search"></i></button>-->
                            <div class="filter-group">
                                <i class="fa fa-filter filter-icon"></i>
                                <label>Filtro global</label>
                                <input id="filtroNombre" type="search" class="form-control">
                            </div>
                            <!--<div class="filter-group">
                                <label>Rol</label>
                                <select class="form-control">
                                    <option>Cualquiera</option>
                                    <option>Admin</option>
                                    <option>Editor</option>
                                    <option>Valorador</option>
                                    <option>Visitante</option>
                                </select>
                            </div>
                            <div class="filter-group">
                                
                                <label>País</label>
                                <select id="filtroPais" class="form-control">
                                    <option value="[España,Francia,Portual,Otro]">Todos</option>
                                    <option value="España">España</option>
                                    <option value="Francia">Francia</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>-->
                        </div>
                    </div>
                </div>
                <!--Tabla-->
                <table id="mainTable" class="table table-striped table-hover table-responsive-xl">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Nombre</th>
                            <th>1<sup>er</sup> Apellido</th>					
                            <th>País</th>
                            <th>Rol</th>					
                            <th>Acción</th>	
                        </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                        <!--Inserción dinámica de usuarios-->
                    </tbody>
                </table>
                <!--Paginas-->
                <div class="clearfix">
                    <div class="hint-text">Mostrando <b id="cantidadResultados">0</b> resultados</div>
                    <!--<ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">6</a></li>
                        <li class="page-item"><a href="#" class="page-link">7</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>-->
                </div>
            </div>
        </section>
        
        <!--Edición del usuario seleccionado-->
        <section id="projects" class="projects-section reducirMargenSuperior segundaSeccion">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2 id="cabeceraSegundaTabla"></h2>
                        </div>
                        <div class="col-lg-4">
                            <!--Botón para cerrar-->
                            <button href="#" id="btnCerrarSegundaSeccion" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Cerrar esta pantalla"><i style="margin-right: 0;" class="fas fa-times-circle"></i></button>
                        </div>
                    </div>
                </div>
                <!--Fin cabecera-->
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#" method="POST"> <!-- //TODO Cambiar a que archivo se envia segun si esta editando o añadiendo. Comprobar a la hora de pulsar en editar si contraseña no tiene contenido, no actualizo todos los compos, pero si tiene relleno el valor inserto en todos los campos-->
                            <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Email*</label> 
                                <div class="col-8">
                                    <input id="email" name="email" placeholder="Email" required="required" class="form-control here" type="email" max="50">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contrasena" class="col-4 col-form-label">Contraseña*</label> 
                                <div class="col-8">
                                    <input id="contrasena" name="contrasena" placeholder="Contraseña" required="required" class="form-control here" type="password" max="50">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombre" class="col-4 col-form-label">Nombre*</label> 
                                <div class="col-8">
                                    <input id="nombre" name="nombre" placeholder="Nombre" required="required" class="form-control here" type="text" max="50">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="primerApellido" class="col-4 col-form-label">Primer Apellido*</label> 
                                <div class="col-8">
                                    <input id="primerApellido" name="primerApellido" placeholder="Primer Apellido" required="required" class="form-control here" type="text" max="50">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="segundoApellido" class="col-4 col-form-label">Segundo Apellido</label> 
                                <div class="col-8">
                                    <input id="segundoApellido" name="segundoApellido" placeholder="Segundo Apellido" class="form-control here" type="text" max="50">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fechaNacimiento" class="col-4 col-form-label">Fecha de nacimiento*</label> 
                                <div class="col-8">
                                    <input id="fechaNacimiento" name="Fecha de nacimiento" placeholder="Nombre" required="required" class="form-control here" type="date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pais" class="col-4 col-form-label">País*</label>
                                <div class="col-8">
                                    <select  id="pais" name="pais" class="custom-select">
                                        <option value="España">España</option>
                                        <option value="Francia">Francia</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="codigoPostal" class="col-4 col-form-label">Código Postal*</label> 
                                <div class="col-8">
                                    <input id="codigoPostal" name="codigoPostal" placeholder="Código Postal" required="required" class="form-control here" type="text" max="5">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telefono" class="col-4 col-form-label">Teléfono*</label> 
                                <div class="col-8">
                                    <input id="telefono" name="telefono" placeholder="Teléfono" required="required" class="form-control here" type="text" max="12">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rol" class="col-4 col-form-label">Rol*</label> 
                                <div class="col-8">
                                    <select id="rol" name="role" class="custom-select">
                                        <option value="0">Visitante</option>
                                        <option value="3">Valorador</option>
                                        <option value="2">Editor</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                <button id="btnInsertarUsuario" name="btnInsertarUsuario" type="button" class="btn btn-light">Añadir usuario</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <a href="db/obtenerUsuariosJSON.php?idUsuario=5">obtenerUsuariosJSON</a>
        <br>
        <a href="db/comprobarEmailUsuario.php?email=mundocoches@mail.com">comprobarEmailUsuario</a>
        <br>
        <a href='db/editarUsuario.php?jsonDatos={"id":50}'>editarUsuario</a>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="modalComentario">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
        
            <!-- Modal body -->
            <div class="modal-body text-center">
            <span id="modalComentarioMensaje" class="h6"></span>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
        </div>
    </div>

<?php include("includes/body-tag-contents.php");?>

</body>

</body>
</html>