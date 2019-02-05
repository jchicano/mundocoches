<?php

session_start();

unset($_SESSION["idUser"]);
unset($_SESSION["nombreUser"]);
unset($_SESSION["rolUser"]);

session_destroy();



?>

<a href="../index.php">Inicio Web</a>

