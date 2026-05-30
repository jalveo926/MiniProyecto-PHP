<?php

use App\Utils\Validador;
use App\Utils\Matematica;
use App\Utils\Sanitizador;
use App\Utils\Navigation;

$resultado = null;
$error = null;
$numeros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    for ($i = 1; $i <= 5; $i++) {
        $valor = $_POST["num$i"] ?? '';
        if (!Validador::esNumeroPositivo($valor)) {
            $error = "El número $i no es válido. Debe ser un número positivo.";
            error_log($error, 3, __DIR__ . '/../logs/errores.log');
            break;
        }
        $numeros[] = (float)$valor;
    }

    if (!$error && count($numeros) === 5) {
        $resultado = [
            'media'      => Matematica::media($numeros),
            'desviacion' => Matematica::desviacionEstandar($numeros),
            'min'        => min($numeros),
            'max'        => max($numeros)
        ];
    }
}
include __DIR__ . '/../views/problema1.php';
?>