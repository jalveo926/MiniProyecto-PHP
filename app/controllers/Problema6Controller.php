<?php

use App\Utils\Validador;
use App\Utils\Sanitizador;
use App\Utils\Navigation;

/**
 * Controlador del Problema 6
 * Genera los N primeros múltiplos de 4,
 * donde N es un valor ingresado por el usuario.
 */

// Inicializar variables para resultados y errores
$resultado = null;
$error     = null;
$n         = null;

// Procesar el formulario enviado por el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $nInput = Sanitizador::sanitizarNumero($_POST['n'] ?? ''); // Obtener y sanitizar el valor de N ingresado por el usuario

    if (!Validador::esNumeroPositivo($nInput)) { 
        $error = 'El valor de N debe ser un número positivo.';
        error_log($error, 3, __DIR__ . '/../logs/errores.log');
    } else {
        $n        = (int)$nInput; // Convertir el valor de N a entero
        $multiplos = []; // Inicializar un array para almacenar los múltiplos de 4

        for ($i = 1; $i <= $n; $i++) {
            $multiplos[] = [ // Agregar cada múltiplo de 4 al array con su índice y valor
                'indice' => $i, 
                'valor'  => 4 * $i,
            ];
        }

        $resultado = [ // Guardar los resultados para la vista
            'n'         => $n,
            'multiplos' => $multiplos,
            'suma'      => array_sum(array_column($multiplos, 'valor')),
        ];
    }
}

// Renderizar la vista del Problema 6
include __DIR__ . '/../views/problema6.php';
?>