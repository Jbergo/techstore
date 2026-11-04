<?php

declare(strict_types=1);

$titulo = $titulo ?? "Catálogo";

require_once "datos.php";
require_once "funciones.php";

$orden = leerCadena($_GET, "orden");

$variables_orden = [
    "id" => "Por Defecto",
    "nombre" => "Nombre",
    "precio_asc" => "Precio Ascendente",
    "precio_desc" => "Precio Descendente",
];

if (!array_key_exists($orden, $variables_orden)) {
    $orden = "id";
}

$productos_ordenados = ordenarProductos($productos, $orden);


require __DIR__ . "/inc/cabecera.php";

?>
<nav class="orden">
    <?php foreach ($variables_orden as $clave => $valor): ?>
        <a
            href="index.php?orden=<?= escapar($clave) ?>"
            <?php if ($clave === $orden): ?>
            aria-current="true"
            class="activo"
            <?php endif; ?>>
            <?= escapar($valor) ?>
        </a>
    <?php endforeach; ?>
</nav>

<section class="catalogo">
    <?php foreach ($productos_ordenados as $producto) : ?>
        <article class="producto">
            <h2><?= escapar($producto["nombre"]) ?></h2>

            <p class="categoria">Categoría: <?= escapar($producto["categoria"]) ?></p>

            <p><?= escapar($producto["descripcion"]) ?></p>

            <p class="precio"><?= formatearPrecio($producto["precio_centimos"]) ?></p>

            <p>
                <?= $producto["stock"] ?> en stock -
                <span class="estado <?= obtenerClaseEstado($producto["stock"]) ?>"><?= obtenerEstadoStock($producto["stock"]) ?></span>
            </p>

            <a href="producto.php?id=<?= (int)$producto["id"] ?>">Ver producto</a>

        </article>
    <?php endforeach; ?>
</section>
<?php require "inc/pie.php" ?>