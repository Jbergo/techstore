<?php

$titulo = $titulo ?? "TechStore";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= escapar($titulo) ?></title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo">TechStore</a>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Catálogo</a>
                </li>
                <li>
                    <a href="buscar.php">Buscar</a>
                </li>
                <li>
                    <a href="carrito.php">Carrito</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1><?= escapar($titulo) ?></h1>