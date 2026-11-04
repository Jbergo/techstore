<?php

declare(strict_types=1);

function escapar(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}

function formatearPrecio(int $centimos): string
{
    return number_format($centimos / 100, 2, ",", ".") . " €";
}

function obtenerClaseEstado(int $stock): string
{
    if ($stock < 0) {
        return "error";
    }
    if ($stock === 0) {
        return "agotado";
    }
    if ($stock <= STOCK_BAJO) {
        return "aviso";
    }
    return "disponible";
}

function obtenerEstadoStock(int $stock): string
{
    return match (obtenerClaseEstado($stock)) {
        "agotado"    => "Agotado",
        "aviso"      => "Últimas unidades",
        "disponible" => "Disponible",
        default      => "Stock no válido",
    };
}

function leerCadena(array $origen, string $clave): string
{
    $cadena = $origen[$clave] ?? "";

    if (!is_string($cadena)) {
        return "";
    }

    return trim($cadena);
}

function ordenarProductos(array $productos, string $orden): array
{
    $comparador = match ($orden) {
        "nombre" => fn(array $a, array $b): int => $a["nombre"] <=> $b["nombre"],
        "precio_asc" => fn(array $a, array $b): int => $a["precio_centimos"] <=> $b["precio_centimos"],
        "precio_desc" => fn(array $a, array $b): int => $b["precio_centimos"] <=> $a["precio_centimos"],
        default => fn(array $a, array $b): int => $a["id"] <=> $b["id"],
    };

    usort($productos, $comparador);

    return $productos;
}
