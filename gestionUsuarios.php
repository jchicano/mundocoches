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
                            <button href="#" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Añadir un usuario a la lista"><i class="fas fa-plus-circle"></i> <span>Añadir un usuario</span></button>
                            <button href="#" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Refrescar la lista de usuarios"><i class="fas fa-sync-alt"></i> <span>Refrescar</span></button>
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
                                <input id="filtroNombre" type="text" class="form-control">
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
        <section id="projects" class="projects-section reducirMargenSuperior">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2><b>Edición</b> del usuario ID: <span id="idUsuarioSeleccionado">1</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a href="db/obtenerUsuariosJSON.php">obtenerUsuariosJSON</a>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

<?php include("includes/body-tag-contents.php");?>

</body>

</body>
</html>