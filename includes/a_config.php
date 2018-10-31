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
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "MundoCoches";
	}
?>