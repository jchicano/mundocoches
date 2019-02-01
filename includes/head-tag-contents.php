<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php print $PAGE_TITLE;?></title>

<?php if ($CURRENT_PAGE == "Index") { ?>
	<meta name="description" content="Esta es la web de MundoCoches" />
	<meta name="keywords" content="coches" /> 
<?php } ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- De Boilerplate -->
<meta name="description" content="Esta es la página web de MundoCoches">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php if ($CURRENT_PAGE == "Index") { ?>
	<link rel="manifest" href="site.webmanifest">
	<link rel="icon" href="img/favicon.png">
<?php }
	else { ?>
	<link rel="manifest" href="../site.webmanifest">
	<link rel="icon" href="../img/favicon.png">
<?php
	}
?>


<!-- Bootstrap core CSS -->
<?php if ($CURRENT_PAGE == "Index") { ?>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php }
	else { ?>
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php
	}
?>


<!-- Custom fonts for this template -->
<?php if ($CURRENT_PAGE == "Index") { ?>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<?php }
	else { ?>
		<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<?php
	}
?>
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<?php if ($CURRENT_PAGE == "Index") { ?>
	<link href="css/grayscale.css" rel="stylesheet">
<?php }
	else { ?>
		<link href="../css/grayscale.css" rel="stylesheet">
<?php
	}
?>

<!-- Para cargar CSS y JS de Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Estilos CSS propios -->
<?php if ($CURRENT_PAGE == "Index") { ?>
	<link href="css/estilos.css" rel="stylesheet">
<?php }
	else { ?>
		<link href="../css/estilos.css" rel="stylesheet">
<?php
	}
?>

<!-- Desplegable Login-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/css/registro.css">