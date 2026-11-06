<?php

declare(strict_types=1);

require_once "datos.php";
require_once "funciones.php";

$error = "";
$producto = null;

$idProducto = filter_var(leerCadena($_GET, "id"), FILTER_VALIDATE_INT);

if ($idProducto === false || $idProducto < 1) {
    http_response_code(400);
    $error = "El identificador del producto no es válido";
    $titulo = "Producto no encontrado";
} else {
    $producto = buscarProductoPorId($productos, $idProducto);

    if ($producto === null) {
        http_response_code(404);
        $error = "Producto no encontrado";
        $titulo = "Producto no encontrado";
    } else {
        $titulo = $producto["nombre"];
    }
}


require __DIR__ . "/inc/cabecera.php";
?>
<?php if ($error !== ""): ?>
    <p class="mensaje-error">
        <?= escapar($error) ?>
    </p>
    <a href="index.php" class="enlace-accion">Volver al catálogo</a>
<?php else: ?>
    <article class="detalle">
        <p class="categoria">
            Categoría:
            <?= escapar($producto["categoria"]) ?>
        </p>

        <p>
            <?= escapar($producto["descripcion"]) ?>
        </p>

        <p class="precio">
            <?= formatearPrecio($producto["precio_centimos"]) ?>
        </p>

        <p>
            <?= $producto["stock"] ?> en stock -
            <span class="estado <?= obtenerClaseEstado($producto["stock"]) ?>"><?= obtenerEstadoStock($producto["stock"]) ?></span>
        </p>

        <a href="index.php" class="enlace-accion">Volver al catálogo</a>
    </article>
<?php endif; ?>
<?php require __DIR__ . "/inc/pie.php"; ?>