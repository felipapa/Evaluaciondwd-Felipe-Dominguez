<?php
session_start();
$_SESSION = [];
session_destroy();
echo("sesion cerrada correctamente");


?>

<a href="index.php">volver</a>