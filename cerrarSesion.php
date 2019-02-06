<?php

session_start();

session_unset();

session_destroy();

setcookie("PHPSESSID", " ", time()-1, "/");

/*
unset($_SESSION["idUser"]);
unset($_SESSION["nombreUser"]);
unset($_SESSION["rolUser"]);*/

header("Location: index.php");

echo "<p>Redirigiendo a la página de <a href='index.php'>inicio de MundoCoches</a></p>";




?>

<a href="../index.php">Inicio Web</a>

