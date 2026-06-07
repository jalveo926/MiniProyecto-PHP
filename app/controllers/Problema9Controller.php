<?php

use App\Utils\Validador;
use App\Utils\Sanitizador;
use App\Utils\Matematica;
use App\Utils\Navigation;

/**
 * Controlador del Problema 9
 * Solicita un número base del 1 al 9 y genera
 * sus 15 primeras potencias.
 */

$resultado = null;
$error     = null;
$base      = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $baseInput = Sanitizador::sanitizarNumero($_POST['base'] ?? '');

    if (!Validador::esNumeroEnRango($baseInput, 1, 9)) {
        $error = 'El número base debe ser un valor entero entre 1 y 9.';
        error_log($error, 3, __DIR__ . '/../logs/errores.log');
    } else {
        $base     = (int)$baseInput;
        $potencias = [];

        for ($exp = 1; $exp <= 15; $exp++) {
            $potencias[] = [
                'exponente' => $exp,
                'valor'     => Matematica::potencia($base, $exp),
            ];
        }

        $resultado = [
            'base'      => $base,
            'potencias' => $potencias,
        ];
    }
}

include __DIR__ . '/../views/problema9.php';
?>