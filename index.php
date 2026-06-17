<?php
require_once __DIR__ . '/vendor/autoload.php';

$action = $_GET['action'] ?? 'menu'; // Obtener la acción desde la URL, por defecto 'menu'

// Validar que la acción solicitada esté permitida para evitar incluir archivos no deseados
$allowed = ['menu', 'problema1', 'problema2', 'problema3', 'problema4', 'problema5', 'problema6', 'problema7', 'problema8', 'problema9'];

// Si la acción no está en la lista de permitidas, redirigir a 'menu'
if (!in_array($action, $allowed)) { 
    $action = 'menu';
}
include __DIR__ . "/app/controllers/" . ucfirst($action) . "Controller.php";
?>