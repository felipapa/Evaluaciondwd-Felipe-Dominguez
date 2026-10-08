<?php
session_start(); 

require "conexion.php";

$consulta = $conexion->prepare(
    "SELECT * FROM vehiculos"
);

$consulta->execute();

$vehiculos = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <a href="Registroform.html">Registrar</a>
    <a href="iniciarsesion.html">Iniciar sesionn</a>
    <a href="logout.php">cerrar sesion</a>

    <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "admin"): ?>
        <p>
            <a href="vehiculoform.html">Agregar vehiculo</a>
        </p>
    <?php endif; ?>

    <?php foreach($vehiculos as $vehiculo): ?>

        <p>
            <?= htmlspecialchars($vehiculo["marca"]) ?>
            <?= htmlspecialchars($vehiculo["modelo"]) ?>
            <?= htmlspecialchars($vehiculo["anio"]) ?>
            <?= htmlspecialchars($vehiculo["precio"]) ?>
            <?= htmlspecialchars($vehiculo["descripcion"]) ?>
            <img src="descarga.jpeg" <?= htmlspecialchars($vehiculo["imagen"]) ?>>
        </p>

        <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "admin"): ?>
            <p>
                <a href="editarform.php?id=<?= $vehiculo["id"] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $vehiculo["id"] ?>">Eliminar</a>
            </p>
        <?php endif; ?>

    <?php endforeach; ?>
      
</body>
</html>