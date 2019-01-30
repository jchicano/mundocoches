<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head-tag-contents.php");?>
    <link rel="stylesheet" href="css/video.css">
    <link rel="stylesheet" href="css/cookies.css"/>
    <link rel="stylesheet" href="css/gestionUsuarios.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php include("includes/navigation.php");?>
<!-- CONTENIDO -->

<body class="bg-light" id="page-top">
    <div class="container">
        <section id="projects" class="projects-section bg-light">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-lg-4">
                            <h2><b>Gestión</b> de usuarios</h2>
                        </div>
                        <div class="col-lg-8">						
                            <a href="#" class="btn btn-info"><i class="fas fa-plus-circle"></i> <span>Añadir un usuario</span></a>
                            <a href="#" class="btn btn-info"><i class="fas fa-sync-alt"></i> <span>Refrescar</span></a>
                        </div>
                    </div>
                </div>
                <!--Filtro-->
                <div class="table-filter">
                    <div class="row">
                        <div class="col-lg-3">
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
                        </div>
                        <div class="col-lg-9">
                            <button type="button" class="btn btn-info"><i class="fa fa-search"></i></button>
                            <div class="filter-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="filter-group">
                                <label>País</label>
                                <select class="form-control">
                                    <option>Todos</option>
                                    <option>España</option>
                                    <option>Portugal</option>
                                    <option>Francia</option>
                                    <option>Italia</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                            <div class="filter-group">
                                <label>Status</label>
                                <select class="form-control">
                                    <option>Any</option>
                                    <option>Delivered</option>
                                    <option>Shipped</option>
                                    <option>Pending</option>
                                    <option>Cancelled</option>
                                </select>
                            </div>
                            <i class="fa fa-filter filter-icon"></i>
                        </div>
                    </div>
                </div>
                <!--Tabla-->
                <table class="table-responsive table table-striped table-hover">
                    <thead  class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Location</th>
                            <th>Order Date</th>						
                            <th>Status</th>						
                            <th>Net Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Michael Holz</td>
                            <td>London</td>
                            <td>Jun 15, 2017</td>                        
                            <td><span class="status text-success">&bull;</span> Delivered</td>
                            <td>$254</td>
                            <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Paula Wilson</td>
                            <td>Madrid</td>                       
                            <td>Jun 21, 2017</td>
                            <td><span class="status text-info">&bull;</span> Shipped</td>
                            <td>$1,260</td>
                            <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Anto Bon</td>
                            <td>Berlin</td>
                            <td>Jul 04, 2017</td>
                            <td><span class="status text-danger">&bull;</span> Cancelled</td>
                            <td>$350</td>
                            <td><a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="material-icons">&#xE5C8;</i></a></td>                        
                        </tr>
                    </tbody>
                </table>
                <!--Pagina-->
            </div>
        </section>
    </div> 


<?php include("includes/body-tag-contents.php");?>

</body>

</body>
</html>