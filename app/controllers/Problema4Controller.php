<?php

use App\Utils\Matematica;
use App\Utils\Navigation;

/**
 * Controlador del Problema 4
 * Calcula independientemente la suma de números pares
 * e impares comprendidos entre 1 y 200.
 * Utiliza switch para seleccionar el tipo de visualización.
 */

$LIMITE = 200;
$sumaPares   = 0;
$sumaImpares = 0;
$pares       = [];
$impares     = [];

// Recorrer del 1 al 200 y clasificar cada número
for ($i = 1; $i <= $LIMITE; $i++) {
    switch ($i % 2) {
        case 0: // Es par
            $sumaPares += $i;
            $pares[]    = $i;
            break;
        default: // Es impar
            $sumaImpares += $i;
            $impares[]    = $i;
            break;
    }
}

$resultado = [
    'sumaPares'    => $sumaPares,
    'sumaImpares'  => $sumaImpares,
    'totalPares'   => count($pares),
    'totalImpares' => count($impares),
    'sumaTotal'    => $sumaPares + $sumaImpares,
    'pares'        => $pares,
    'impares'      => $impares,
];

include __DIR__ . '/../views/problema4.php';
?>