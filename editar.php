<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require "conexion.php";


$id = $_POST["id"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$anio = $_POST["anio"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];

$consulta = $conexion->prepare(
        "UPDATE vehiculos
         SET marca = :marca,
             modelo = :modelo,
             anio = :anio,
             precio = :precio,
             descripcion = :descripcion
         WHERE id = :id"
    );

$consulta->execute([
    ":marca" => $marca,
    ":modelo" => $modelo,
    ":anio" => $anio,
    ":precio" => $precio,
    ":descripcion" => $descripcion,
    ":id" => $id
    ]);

header("Location: index.php");
exit();

?>