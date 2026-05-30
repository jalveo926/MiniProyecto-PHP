<?php

use App\Utils\Validador;
use App\Utils\Sanitizador;
use App\Utils\Navigation;

$resultados = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $presupuesto = $_POST['presupuesto'] ?? '';
    if (Validador::esNumeroPositivo($presupuesto)) {
        $total = (float)$presupuesto;
        $areas = [
            'Ginecología'   => 0.40,
            'Traumatología' => 0.35,
            'Pediatría'     => 0.25
        ];
        foreach ($areas as $nombre => $porcentaje) {
            $resultados[$nombre] = $total * $porcentaje;
        }
    } else {
        $error = "El presupuesto debe ser un número positivo.";
        error_log($error, 3, __DIR__ . '/../logs/errores.log');
    }
}
include __DIR__ . '/../views/problema3.php';
?>