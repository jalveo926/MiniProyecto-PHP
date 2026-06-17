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
if (isset($_SESSION['personas_data'])) { // Si ya hay datos de personas en la sesión, crear una instancia de Persona y cargar esos datos
    $persona = new Persona(); // Crear una nueva instancia de Persona
    // Restaurar personas previas
    foreach ($_SESSION['personas_data'] as $edad) { // Agregar cada edad almacenada en la sesión a la instancia de Persona
        $persona->agregarPersona($edad); // Agregar la edad a la instancia de Persona
    }
    $cantidadPersonas = count($_SESSION['personas_data']); // Contar cuántas personas hay actualmente en la sesión
} else {
    $persona = new Persona(); 
    $_SESSION['personas_data'] = []; // Inicializar el array de personas en la sesión si no existe
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verificar si se envió el formulario
    $edadInput = $_POST['edad'] ?? ''; // Obtener el valor de la edad ingresada, o una cadena vacía si no se proporcionó
    $accion = $_POST['accion'] ?? ''; // Obtener la acción seleccionada o una cadena vacía si no se proporcionó
    
    // Validar edad solo si se intenta agregar persona
    if ($accion === 'agregar') {
        if (empty($edadInput)) { // Validar que se ingresó una edad
            $error = "Por favor ingresa una edad."; 
        } elseif (!is_numeric($edadInput) || $edadInput < 0 || $edadInput > 120) {
            $error = "Por favor ingresa una edad válida entre 0 y 120."; 
        } else {
            $edad = (int)$edadInput; 
            // Agregar edad a la persona
            $persona->agregarPersona($edad); // Agregar la edad a la instancia de Persona
            $_SESSION['personas_data'][] = $edad; // Guardar la edad en la sesión para persistencia
            $cantidadPersonas = count($_SESSION['personas_data']); // Actualizar la cantidad de personas después de agregar
            // Mostrar mensaje de éxito con la edad agregada y el total de personas actuales
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
        session_unset(); // Limpiar todos los datos de la sesión
        $_SESSION['personas_data'] = []; // Reiniciar el array de personas en la sesión
        $resultado = "Datos limpiados. Sistema reiniciado.";
        $cantidadPersonas = 0;
    }
}

// Renderizar la vista del Problema 5
include __DIR__ . '/../views/problema5.php';
?>
