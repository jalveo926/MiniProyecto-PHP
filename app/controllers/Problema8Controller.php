<?php

use App\Utils\Validador;
use App\Utils\Navigation;

$resultado = null;
$error = null;
$estacion = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verificar si se ha enviado el formulario
    $fecha = $_POST['fecha'] ?? ''; // Obtener la fecha ingresada por el usuario
    
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
                
            // Determinar estación según la tabla proporcionada
            if (($mes === 12 && $dia >= 21) || ($mes === 1) || ($mes === 2) || ($mes === 3 && $dia <= 20)) {
                $estacion = 'Verano';
            } elseif (($mes === 3 && $dia >= 21) || ($mes === 4) || ($mes === 5) || ($mes === 6 && $dia <= 21)) {
                $estacion = 'Otoño';
            } elseif (($mes === 6 && $dia >= 22) || ($mes === 7) || ($mes === 8) || ($mes === 9 && $dia <= 22)) {
                $estacion = 'Invierno';
            } else {
                // Del 23 septiembre al 20 diciembre
                $estacion = 'Primavera';
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

// Renderizar la vista
include __DIR__ . '/../views/problema8.php';
?>
