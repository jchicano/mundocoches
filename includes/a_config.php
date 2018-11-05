<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/plantilla.php":
			$CURRENT_PAGE = "Plantilla"; 
			$PAGE_TITLE = "Plantilla de prueba";
			break;
		case "/noticias/index.php":
			$CURRENT_PAGE = "Noticias"; 
			$PAGE_TITLE = "Noticias de coches";
			break;
		case "/marcas/index.php":
			$CURRENT_PAGE = "Marcas"; 
			$PAGE_TITLE = "Marcas de coches";
			break;
		case "/analisis/index.php":
			$CURRENT_PAGE = "Analisis"; 
			$PAGE_TITLE = "Análisis de coches";
			break;
		case "/accesorios/index.php":
			$CURRENT_PAGE = "Accesorios"; 
			$PAGE_TITLE = "Accesorios de coches";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "MundoCoches";
	}
?>