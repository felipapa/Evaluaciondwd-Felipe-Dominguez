<?php

$password = "";
$user = "root";
$db = "RodadosDelSudeste";
$hostt = "localhost";

try{
    $conexion = New PDO("mysql:host=$hostt;dbname=$db;charset=utf8", $user, $password);

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION

    );
} catch(PDOException $e){

        die("error de conexion" . $e->getMessage());

}




?>