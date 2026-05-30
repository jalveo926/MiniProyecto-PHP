<?php
require_once __DIR__ . '/vendor/autoload.php';

$action = $_GET['action'] ?? 'menu';
$allowed = ['menu', 'problema1', 'problema2', 'problema3', 'problema4', 'problema5', 'problema6', 'problema7', 'problema8', 'problema9'];
if (!in_array($action, $allowed)) {
    $action = 'menu';
}
include __DIR__ . "/app/controllers/" . ucfirst($action) . "Controller.php";
?>