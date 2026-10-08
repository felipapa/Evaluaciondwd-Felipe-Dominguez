<?php

require "conexion.php";
require "auth.php";


$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$año = $_POST["anio"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
$imagen = $_POST["imagen"];

$consulta = $conexion->prepare(
    "INSERT INTO vehiculos (marca, modelo, anio, precio, descripcion, imagen) VALUES (:marca, :modelo, :anio, :precio, :descripcion, :imagen)"
);

$consulta ->execute([
    ":marca" => $marca,
    ":modelo" => $modelo,
    ":anio" => $año,
    ":precio" => $precio,
    ":descripcion" => $descripcion,
    ":imagen" => $imagen




]);

    header("location: index.php")

?>