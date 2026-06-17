<?php

use App\Utils\Validador;
use App\Utils\Matematica;
use App\Utils\Sanitizador;
use App\Utils\Navigation;

$resultado = null;
$error = null;
$numeros = [];

// Validar y procesar los números ingresados por el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verificar si se envió el formulario
    for ($i = 1; $i <= 5; $i++) { 
        $valor = $_POST["num$i"] ?? ''; // Obtener el valor del número ingresado, o una cadena vacía si no se proporcionó
        $valor = Sanitizador::sanitizarNumero($valor); // Sanitizar el valor para evitar inyecciones o caracteres no deseados        
        if (!Validador::esNumeroPositivo($valor)) { 
            $error = "El número $i no es válido. Debe ser un número positivo."; // Registrar el error en el archivo de log
            error_log($error, 3, __DIR__ . '/../logs/errores.log'); // Registrar el error en el archivo de log
            break; 
        }
        $numeros[] = (float)$valor;
    }

    if (!$error && count($numeros) === 5) { // Si no hay errores y se ingresaron 5 números, calcular los resultados
        $resultado = [
            'media'      => Matematica::media($numeros),
            'desviacion' => Matematica::desviacionEstandar($numeros),
            'min'        => min($numeros),
            'max'        => max($numeros)
        ];
    }
}

// Renderizar la vista del Problema 1
include __DIR__ . '/../views/problema1.php'; 
?>