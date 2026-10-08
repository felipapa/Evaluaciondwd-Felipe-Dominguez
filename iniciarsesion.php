<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "conexion.php";

$email = $_POST["email"];
$password = $_POST["password"];

$consulta = $conexion->prepare(
    "SELECT * FROM usuarios WHERE email = :email"
);

$consulta->execute([
    ":email" => $email
]);


$usuarios = $consulta->fetch(PDO::FETCH_ASSOC);

if ($usuarios && password_verify($password, $usuarios["password"])) {

    session_start();

    session_regenerate_id(true);

    $_SESSION["id"] = $usuarios["id"];
    $_SESSION["email"] = $usuarios["email"];
    $_SESSION["rol"] = $usuarios["rol"];

    echo "sesion iniciada correctamente";
    
 } else {

    echo "error";
}
    

?>

<a href="index.php">volver</a>