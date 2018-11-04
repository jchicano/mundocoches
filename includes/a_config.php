<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/plantilla.php":
			$CURRENT_PAGE = "Plantilla"; 
			$PAGE_TITLE = "Plantilla de prueba";
			break;
		case "/marcas.php":
			$CURRENT_PAGE = "Marcas"; 
			$PAGE_TITLE = "Marcas de coches";
			break;
		case "/analisis/index.php":
			$CURRENT_PAGE = "Analisis"; 
			$PAGE_TITLE = "Análisis de coches";
			break;
		case "/accesoris/index.php":
			$CURRENT_PAGE = "Accesorios"; 
			$PAGE_TITLE = "Accesorios de coches";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "MundoCoches";
	}
?>