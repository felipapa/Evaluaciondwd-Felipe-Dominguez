<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "conexion.php";

$email = $_POST["email"];
$password = $_POST["password"];
$rol = $_POST["rol"];

$hash = password_hash($password, PASSWORD_DEFAULT);

$consulta = $conexion->prepare(
    "INSERT INTO usuarios (email, password, rol) VALUES (:email, :password, :rol)"
);

$consulta->execute([
    ":email" => $email,
    ":password" => $hash,
    ":rol" => $rol
]);

header("Location: index.php");
?>