<?php

declare(strict_types=1);

$titulo = $titulo ?? "Catálogo";

require_once "datos.php";
require_once "funciones.php";
require __DIR__ . "/inc/cabecera.php";


?>
<section class="catalogo">
    <?php foreach ($productos as $producto) : ?>
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