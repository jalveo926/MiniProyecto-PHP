<?php

use App\Utils\Validador;
use App\Utils\Navigation;

$resultado = null;
$error = null;
$estacion = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'] ?? '';
    
    if (empty($fecha)) {
        $error = "Por favor ingresa una fecha.";
    } else {
        try {
            // Crear objeto DateTime de la fecha ingresada
            $fechaObj = DateTime::createFromFormat('Y-m-d', $fecha);
            
            if ($fechaObj === false) {
                $error = "El formato de fecha no es válido. Usa YYYY-MM-DD.";
            } else {
                // Extraer mes y día
                $mes = (int)$fechaObj->format('m');
                $dia = (int)$fechaObj->format('d');
                
                // Determinar estación según mes y día
                // Hemisferio Norte
                if (($mes === 3 && $dia >= 21) || ($mes > 3 && $mes < 6) || ($mes === 6 && $dia <= 20)) {
                    $estacion = 'Primavera';
                } elseif (($mes === 6 && $dia >= 21) || ($mes > 6 && $mes < 9) || ($mes === 9 && $dia <= 20)) {
                    $estacion = 'Verano';
                } elseif (($mes === 9 && $dia >= 21) || ($mes > 9 && $mes < 12) || ($mes === 12 && $dia <= 20)) {
                    $estacion = 'Otoño';
                } else {
                    $estacion = 'Invierno';
                }
                
                $resultado = [
                    'fecha' => $fechaObj->format('d/m/Y'),
                    'estacion' => $estacion,
                    'fecha_formato' => $fechaObj->format('l, j \d\e F \d\e Y'),
                    'mes_nombre' => $fechaObj->format('F')
                ];
            }
        } catch (Exception $e) {
            $error = "Error al procesar la fecha: " . $e->getMessage();
        }
    }
}

include __DIR__ . '/../views/problema8.php';
?>
