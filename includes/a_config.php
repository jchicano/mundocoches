<?php

session_start();

	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/noticias/index.php":
			$CURRENT_PAGE = "Noticias"; 
			$PAGE_TITLE = "MundoCoches | Noticias";
			break;
		case "/marcas/index.php":
			$CURRENT_PAGE = "Marcas"; 
			$PAGE_TITLE = "MundoCoches | Marcas";
			break;
		case "/analisis/index.php":
			$CURRENT_PAGE = "Analisis"; 
			$PAGE_TITLE = "MundoCoches | Análisis";
			break;
		case "/accesorios/index.php":
			$CURRENT_PAGE = "Accesorios"; 
			$PAGE_TITLE = "MundoCoches | Accesorios";
			break;
		case "/gestionUsuarios.php":
			$CURRENT_PAGE = "Gestion"; 
			$PAGE_TITLE = "Gestión de usuarios";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "MundoCoches";
	}
	/*
	if(preg_match("/\/analisis/analisis-+/",$_SERVER["SCRIPT_NAME"])){
		echo "SI FUNCIONA";
	}
	substr();
	*/
?>