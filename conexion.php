<?php

$hostt    = getenv('DB_HOST') ?: "127.0.0.1";
$db       = getenv('DB_NAME') ?: "RodadosDelSudeste";
$user     = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASS') ?: "1234";
$port     = getenv('DB_PORT') ?: "3306";

try {
    $conexion = new PDO("mysql:host=$hostt;port=$port;dbname=$db;charset=utf8", $user, $password);

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    die("error de conexion: " . $e->getMessage());
}
