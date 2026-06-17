<?php

use App\Utils\Validador;
use App\Utils\Sanitizador;
use App\Utils\Navigation;

$resultados = null;
$error = null;

// Validar y procesar el presupuesto ingresado por el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verificar si se envió el formulario
    $presupuesto = $_POST['presupuesto'] ?? ''; // Obtener el valor del presupuesto ingresado, o una cadena vacía si no se proporcionó
    if (Validador::esNumeroPositivo($presupuesto)) {
        $total = (float)$presupuesto;
        $areas = [
            'Ginecología'   => 0.40,
            'Traumatología' => 0.35,
            'Pediatría'     => 0.25
        ];
        foreach ($areas as $nombre => $porcentaje) { // Calcular el monto correspondiente a cada área
            $resultados[$nombre] = $total * $porcentaje; // Guardar el resultado en el array de resultados
        }
    } else { // Registrar el error si el presupuesto no es un número positivo
        $error = "El presupuesto debe ser un número positivo.";
        error_log($error, 3, __DIR__ . '/../logs/errores.log');
    }
}

// Renderizar la vista del Problema 3
include __DIR__ . '/../views/problema3.php';
?>