<?php

declare(strict_types=1);

// CONSTANTES / VARIABLES
const IVA_GENERAL = 0.21;
const UNIDADES_MIN_DESCUENTO = 5;
const DESCUENTO_CANTIDAD = 0.10;
const MAX_UNIDADES_LINEA = 10;

$productos = [
    1 => [
        "id" => 1,
        "nombre" => "Teclado mecánico",
        "categoria" => "Periféricos",
        "descripcion" => "Teclado con switches rojos y retroiluminación RGB.",
        "precio_centimos" => 7990,
        "stock" => 7
    ],
    2 => [
        "id" => 2,
        "nombre" => "Ratón gaming",
        "categoria" => "Periféricos",
        "descripcion" => "Ratón óptico de 16.000 DPI con 6 botones programables.",
        "precio_centimos" => 3990,
        "stock" => 3
    ],
    3 => [
        "id" => 3,
        "nombre" => 'Monitor 24" Full HD',
        "categoria" => "Monitores",
        "descripcion" => "Panel IPS de 24 pulgadas a 75 Hz con conexión HDMI.",
        "precio_centimos" => 14990,
        "stock" => 12
    ],
    4 => [
        "id" => 4,
        "nombre" => "Auriculares inalámbricos",
        "categoria" => "Audio",
        "descripcion" => "Auriculares Bluetooth con cancelación de ruido y 30 h de batería.",
        "precio_centimos" => 8990,
        "stock" => 0
    ],
    5 => [
        "id" => 5,
        "nombre" => "Webcam Full HD",
        "categoria" => "Periféricos",
        "descripcion" => "Webcam 1080p con micrófono integrado para videollamadas.",
        "precio_centimos" => 5990,
        "stock" => 5
    ],
    6 => [
        "id" => 6,
        "nombre" => "Disco SSD 1 TB",
        "categoria" => "Almacenamiento",
        "descripcion" => "SSD NVMe M.2 con velocidades de lectura de hasta 3.500 MB/s.",
        "precio_centimos" => 9490,
        "stock" => 20
    ]

];