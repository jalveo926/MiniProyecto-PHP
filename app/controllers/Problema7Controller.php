<?php

use App\Utils\Validador;
use App\Utils\Matematica;
use App\Utils\Navigation;

// Inicializar sesión para persistir datos
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$resultado = null;
$error = null;
$cantidadNotas = 0;
$notas = [];

// Recuperar datos de la sesión o crear nueva instancia
if (isset($_SESSION['notas_data'])) {
    $notas = $_SESSION['notas_data'];
    $cantidadNotas = count($notas);
} else {
    $_SESSION['notas_data'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    
    // Acción 1: Establecer cantidad de notas
    if ($accion === 'establecer_cantidad') {
        // Validar cantidad de notas o sino mostrar error
        $cantidadInput = $_POST['cantidad'] ?? '';
        
        if (empty($cantidadInput)) {
            $error = "Por favor ingresa una cantidad.";
        } elseif (!is_numeric($cantidadInput) || $cantidadInput < 1 || $cantidadInput > 100) {
            $error = "Por favor ingresa una cantidad válida entre 1 y 100.";
        } else {
            $cantidadNotas = (int)$cantidadInput;
            $_SESSION['cantidad_notas'] = $cantidadNotas;
        }
    } 
    // Acción 2: Agregar notas
    elseif ($accion === 'agregar_notas') {
        $cantidadNotas = $_SESSION['cantidad_notas'] ?? 0;
        
        if ($cantidadNotas === 0) {
            $error = "Por favor establece la cantidad de notas primero.";
        } else {
            $notas_ingresadas = [];
            $error_notas = false;
            
            // Recorrer todas las notas ingresadas
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'nota_') === 0) {
                    if (empty($value)) {
                        $error = "Todas las notas deben ser ingresadas.";
                        $error_notas = true;
                        break;
                    } elseif (!is_numeric($value) || $value < 0 || $value > 20) {
                        $error = "Las notas deben ser valores numéricos entre 0 y 20.";
                        $error_notas = true;
                        break;
                    } else {
                        $notas_ingresadas[] = (float)$value;
                    }
                }
            }
            
            if (!$error_notas && count($notas_ingresadas) === $cantidadNotas) {
                $_SESSION['notas_data'] = $notas_ingresadas;
                $notas = $notas_ingresadas;
                
                // Calcular estadísticas usando la clase Matematica
                $promedio = Matematica::media($notas);
                $desviacion = Matematica::desviacionEstandar($notas);
                $minima = min($notas);
                $maxima = max($notas);
                
                $resultado = [
                    'promedio' => $promedio,
                    'desviacion' => $desviacion,
                    'minima' => $minima,
                    'maxima' => $maxima,
                    'cantidad' => count($notas),
                    'notas' => $notas
                ];
                
                $resultado_mensaje = "Datos estadísticos calculados con éxito para " . count($notas) . " notas.";
            }
        }
    } 
    // Acción 3: Limpiar datos
    elseif ($accion === 'limpiar') {
        session_unset();
        $_SESSION['notas_data'] = [];
        $_SESSION['cantidad_notas'] = 0;
        $resultado = "Datos limpiados. Sistema reiniciado.";
        $cantidadNotas = 0;
        $notas = [];
    }
}

include __DIR__ . '/../views/problema7.php';
?>
