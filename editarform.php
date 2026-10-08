<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "conexion.php";


$consulta = $conexion->prepare("SELECT * FROM vehiculos WHERE id = :id");
$consulta->execute([":id" => $_GET["id"]]);
$vehiculos = $consulta->fetch(PDO::FETCH_ASSOC);
?>

<form action="editar.php" method="POST">

    <input type="hidden" name="id" value="<?= $vehiculos['id'] ?>">

    <label>marca</label>
    <input type="text" name="marca">

    <label>modelo</label>
    <input type="text" name="modelo">

    <label>anio</label>
    <input type="number" name="anio">

    <label>precio</label>
    <input type="number" name="precio">

    <label>descripcion</label>
    <input type="text" name="descripcion">

    <button type="submit">enviar</button>

</form>