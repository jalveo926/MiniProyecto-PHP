<?php

use App\Utils\Validador;
use App\models\Persona;
use App\Utils\Navigation;

// Inicializar sesión para persistir datos
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$resultado = null;
$error = null;
$cantidadPersonas = 0;

// Recuperar datos de la sesión o crear nueva instancia
if (isset($_SESSION['personas_data'])) {
    $persona = new Persona();
    // Restaurar personas previas
    foreach ($_SESSION['personas_data'] as $edad) {
        $persona->agregarPersona($edad);
    }
    $cantidadPersonas = count($_SESSION['personas_data']);
} else {
    $persona = new Persona();
    $_SESSION['personas_data'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edadInput = $_POST['edad'] ?? '';
    $accion = $_POST['accion'] ?? '';
    
    // Validar edad solo si se intenta agregar persona
    if ($accion === 'agregar') {
        if (empty($edadInput)) {
            $error = "Por favor ingresa una edad.";
        } elseif (!is_numeric($edadInput) || $edadInput < 0 || $edadInput > 120) {
            $error = "Por favor ingresa una edad válida entre 0 y 120.";
        } else {
            $edad = (int)$edadInput;
            // Agregar edad a la persona
            $persona->agregarPersona($edad);
            $_SESSION['personas_data'][] = $edad;
            $cantidadPersonas = count($_SESSION['personas_data']);
            $resultado = "Persona agregada con éxito. Edad: $edad años. (Total: $cantidadPersonas personas)";
        }
    } elseif ($accion === 'clasificar') {
        if ($cantidadPersonas < 5) {
            $error = "Se necesitan mínimo 5 personas para clasificar. Actualmente hay: $cantidadPersonas.";
        } else {
            // Clasificar personas y obtener resultados
            $persona->clasificarPersonas();
            $resultado = $persona->getPersonasXCategoria();
        }
    } elseif ($accion === 'limpiar') {
        session_unset();
        $_SESSION['personas_data'] = [];
        $resultado = "Datos limpiados. Sistema reiniciado.";
        $cantidadPersonas = 0;
    }
}

include __DIR__ . '/../views/problema5.php';
?>
