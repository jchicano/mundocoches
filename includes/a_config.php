<?php

//if(isset($_REQUEST["loginCorrecto"])){
//	if($_REQUEST["loginCorrecto"]){
//		session_start();
//	}
//}



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
		case "/registro.php":
			$CURRENT_PAGE = "Registro"; 
			$PAGE_TITLE = "Registrarse";
			break;
		case "/politica.php":
			$CURRENT_PAGE = "Política de privacidad"; 
			$PAGE_TITLE = "Política de privacidad";
			break;
		case "/terminos.php":
			$CURRENT_PAGE = "Términos legales"; 
			$PAGE_TITLE = "Términos legales";
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