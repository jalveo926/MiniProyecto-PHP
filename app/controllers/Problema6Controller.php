<?php

use App\Utils\Validador;
use App\Utils\Sanitizador;
use App\Utils\Navigation;

/**
 * Controlador del Problema 6
 * Genera los N primeros múltiplos de 4,
 * donde N es un valor ingresado por el usuario.
 */

$resultado = null;
$error     = null;
$n         = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nInput = Sanitizador::sanitizarNumero($_POST['n'] ?? '');

    if (!Validador::esNumeroPositivo($nInput)) {
        $error = 'El valor de N debe ser un número positivo.';
        error_log($error, 3, __DIR__ . '/../logs/errores.log');
    } else {
        $n        = (int)$nInput;
        $multiplos = [];

        for ($i = 1; $i <= $n; $i++) {
            $multiplos[] = [
                'indice' => $i,
                'valor'  => 4 * $i,
            ];
        }

        $resultado = [
            'n'         => $n,
            'multiplos' => $multiplos,
            'suma'      => array_sum(array_column($multiplos, 'valor')),
        ];
    }
}

include __DIR__ . '/../views/problema6.php';
?>