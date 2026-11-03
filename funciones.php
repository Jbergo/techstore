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
